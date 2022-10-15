<?php

namespace App\Http\Controllers;

use App\Account;
use App\Mail\CreditAlert;
use App\Mail\SenderAlert;
use App\Notifications\ATCCODE;
use App\Notifications\RequestATCCode;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class TransactionsController extends Controller
{
    //


    public function transactions()
    {
//        $user_acct = Account::where('account_number', $account_number)->first();
//        $credit = Transactions::where('acct_number', "=", $user_acct);

//        $transactions = Transactions::whereUserId(auth()->id())->get();
        $transactions = Transactions::whereUserId(auth()->id())->paginate(4);
        $total_trans = Transactions::whereUserId(auth()->id())->get()->count();
        return view('dashboard.statement', compact('transactions', 'total_trans'));
    }

    public function transfer()
    {

        return view('dashboard.transfer2');
    }


    public function store(Request $request)
    {
        $data = $this->getData($request);
        if($request->trans_type == "Internal-Transaction"){
            $account_number = $request->input('acct_number');
            $user_acct = Account::where('account_number', $account_number)->first();

            if ($user_acct){
                if ($data['amount'] > Auth::user()->account->balance){
                    return redirect()->back()->with('declined', 'You do not have enough money in your account to make a transfer');
                }

                if ($account_number != auth()->user()->account->account_number){
                    $data['user_id'] = Auth::id();
                    $data['account_id'] = Auth::user()->account->id;
                    $data['from'] = Auth::user()->account->account_number;
                    $data = Transactions::create($data);

//                    $user_acct->balance += $data['amount'];
//
//                    $new_balance = Auth::user()->account->balance -= $data->amount;
//                    Auth::user()->account->update(['balance' => $new_balance]);
//
//                    $vat = $data->amount * 0.03 / 100;
//
//                    $data->update(['vat' => $vat, 'debit' => 1]);
//                    auth()->user()->account->balance -= $vat;
//                    auth()->user()->save();
////                    $data->status = 1;
//                    $data->save();
//                    $user_acct->save();
//
//
//                    $user = Auth::user();
//                    $mail_data = ['user' => $user, 'transaction' => $data];
//                    $credit_data = ['user' => $user, 'transaction' => $data];
//
//                    Mail::to($user_acct->user->email)->send(new CreditAlert($credit_data));
//                    Mail::to($user->email)->send(new SenderAlert($mail_data));
                }else{
                    return redirect()->back()->with('illicit', 'Illicit Transaction');
                }

            }else{
                return redirect()->back()->with('not_found', "Sorry! No Such Account Details");
            }

        }

        if($request->trans_type == "Local-Transaction"){
            if ($data['amount'] > Auth::user()->account->balance){
                return redirect()->back()->with('declined', 'You do not have enough money in your account to make a transfer');
            }
            $data['user_id'] = Auth::id();
            $data['from'] = Auth::user()->account->account_number;
            $data = Transactions::create($data);

            $new_balance = Auth::user()->account->balance -= $data->amount;
            Auth::user()->account->update(['balance' => $new_balance]);

            $vat = $data->amount * 0.06 / 100;
            $data->update(['vat' => $vat, 'debit' => 1, 'credit' => 1]);
            $data->update(['vat' => $vat]);
            auth()->user()->account->balance -= $vat;
            auth()->user()->save();
//            $data->status = 1;
            $data->save();

//            $user = Auth::user();
//            $mail_data = ['user' => $user, 'transaction' => $data];
//            Mail::to($user->email)->send(new SenderAlert($mail_data));

        }

        if($request->trans_type == "International-Transaction"){
            if ($data['amount'] > Auth::user()->account->balance){
                return redirect()->back()->with('declined', 'You do not have enough money in your account to make a transfer');
            }
            $data['user_id'] = Auth::id();
            $data['from'] = Auth::user()->account->account_number;
            $data = Transactions::create($data);

            $new_balance = Auth::user()->account->balance -= $data->amount;
            Auth::user()->account->update(['balance' => $new_balance]);

            $vat = $data->amount * 0.09 / 100;
            $data->update(['vat' => $vat, 'debit' => 1, 'credit' => 1]);
            $data->update(['vat' => $vat]);
            auth()->user()->account->balance -= $vat;
            auth()->user()->save();
//            $data->status = 1;
            $data->save();

//            $user = Auth::user();
//            $mail_data = ['user' => $user, 'transaction' => $data];
//            Mail::to($user->email)->send(new SenderAlert($mail_data));
        }


        return redirect()->route('user.atc_process', $data->id);
    }

    public function withdrawal_details($id)
    {
        $with_dt = Transactions::findOrFail($id);
        if ( $with_dt->atc_code == null){
            return redirect()->route('user.atc_code', $with_dt->id);
        }elseif($with_dt->otp == null){
            return redirect()->route('user.otp_code', $with_dt->id);
        }elseif($with_dt->trn == null){
            return redirect()->route('user.trn_code', $with_dt->id);
        }


        return view('dashboard.statement-details', compact('with_dt'));
    }

    protected function getData(Request $request)
    {
        $rules = [
            'id' => 'nullable',
            'from' => 'nullable',
            'user_id' => 'nullable',
            'amount' => 'required',
            'acct_number' => 'required',
            'rep_name' => 'required',
            'account_type' => 'required',
            'bank_name' => 'required',
            'swift_code' => 'nullable',
            'note' => 'nullable',
            'trans_type' => 'required',
            'credit_type' => 'nullable',
            'vat' => 'nullable',
        ];
        return $request->validate($rules);
    }



    public function atc_process($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.atc_process', compact('with_dt'));
    }

    public function atc_code($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.atc_code', compact('with_dt'));
    }

    public function atc_code_store(Request $request)
    {
        $withdrawal = Transactions::findOrFail($request->withdrawal_id);
        if ($request->atc_code == $withdrawal->admin_atc_code){
            $withdrawal->atc_code = $request->get('atc_code');
//
            $withdrawal->status = 1;
            $withdrawal->save();
            return redirect()->route('user.otp_process', $withdrawal->id);
        }
        return redirect()->back()->with('declined', "Invalid Code, Please enter the right digits.");
    }

    public function otp_process($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.otp-process', compact('with_dt'));
    }

    public function otp_code($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.otp', compact('with_dt'));

    }

    public function otp_code_store(Request $request)
    {
        $withdrawal = Transactions::findOrFail($request->withdrawal_id);
        if ($request->otp == $withdrawal->admin_otp)
        {
            $withdrawal->otp = $request->get('otp');
//            $withdrawal->update(['swift_code' => $request->get('swift_code')]);
            $withdrawal->status = 1;
            $withdrawal->save();
            return redirect()->route('user.trn_process', $withdrawal->id);
        }
        return redirect()->back()->with('declined', "Invalid Code, Please enter the right digits.");
    }

    public function trn_process($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.trn-process', compact('with_dt'));
    }

    public function trn_code($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.trn-code', compact('with_dt'));
    }

    public function trn_code_store(Request $request)
    {
        $withdrawal = Transactions::findOrFail($request->withdrawal_id);
        if ($request->trn == $withdrawal->admin_trn)
        {
            $withdrawal->trn = $request->get('trn');
            $withdrawal->status = 1;
            $withdrawal->save();

            $account_number = $request->input('acct_number');
            $user_acct = Account::where('account_number', $account_number)->first();

            if ($user_acct){

                $user_acct->balance += $withdrawal->amount;

                $new_balance = Auth::user()->account->balance -= $withdrawal->amount;
                Auth::user()->account->update(['balance' => $new_balance]);

                $vat = $withdrawal->amount * 0.03 / 100;

                $withdrawal->update(['vat' => $vat, 'debit' => 1]);
                auth()->user()->account->balance -= $vat;
                auth()->user()->save();
//                    $data->status = 1;
                $withdrawal->save();
                $user_acct->save();

                $user = Auth::user();
                $mail_data = ['user' => $user, 'transaction' => $withdrawal];
                $credit_data = ['user' => $user, 'transaction' => $withdrawal];

                Mail::to($user_acct->user->email)->send(new CreditAlert($credit_data));
                Mail::to($user->email)->send(new SenderAlert($mail_data));

            }

            return redirect()->route('user.with_process', $withdrawal->id);
        }
        return redirect()->back()->with('declined', "Invalid Code, Please enter the right digits.");
    }



    public function process($id)
    {
        $with_dt = Transactions::findOrFail($id);
        return view('dashboard.process', compact('with_dt'));
    }





}
