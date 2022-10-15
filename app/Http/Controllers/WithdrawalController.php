<?php

namespace App\Http\Controllers;

use App\Notifications\SwiftCode;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{

    public function transactions()
    {
        $trans = Withdrawal::whereUserId(auth()->id())->get();
        return view('dashboard.transactions', compact('trans'));
    }

    public function transfer()
    {

        return view('dashboard.transfer');
    }

    public function store(Request $request)
    {
        if($request->amount > Auth::user()->account->balance){
            return redirect()->back()->with('declined', "You do not have enough money in your account to make a transfer");
        }
        $data = $this->getData($request);
        $data['from'] = Auth::user()->account->account_number;
        $data['user_id'] = Auth::id();
        $with_id = Withdrawal::create($data);
        return redirect()->route('user.swift_code', $with_id->id);
    }

    protected function getData(Request $request)
    {
        $rules = [
            'id' => 'nullable',
            'from' => 'nullable',
            'user_id' => 'nullable',
            'amount' => 'required',
            'account_number' => 'required',
            'rep_name' => 'required',
            'account_type' => 'required',
            'bank_name' => 'required',
            'swift_code' => 'required',
            'note' => 'nullable',
        ];
        return $request->validate($rules);
    }

    public function atc_code($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        return view('dashboard.atc_code', compact('withdrawal'));
    }

    public function request_swift_code(Request $request)
    {
        $data = Withdrawal::findOrFail($request->withdrawal_id);
        $user = $data->user->email;
        $user->notify(new SwiftCode($data));
        return redirect()->back()->with('success', "Request sent successfully");
    }


    public function atc_code_store(Request $request)
    {

        $withdrawal = Withdrawal::findOrFail($request->withdrawal_id);
        if ($request->atc_code == $withdrawal->admin_atc_code){
            $withdrawal->atc_code = $request->get('atc_code');
//            $withdrawal->update(['swift_code' => $request->get('swift_code')]);
            $withdrawal->save();
            return redirect()->route('user.otp_code', $withdrawal->id);
        }
        return redirect()->back()->with('declined', "Invalid Code, Please enter the right digits.");
    }



    public function otp_code($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        return view('dashboard.otp_code', compact('withdrawal'));
    }
    public function otp_code_store(Request $request)
    {
        $withdrawal = Withdrawal::findOrFail($request->withdrawal_id);
        if ($request->swift_code == $withdrawal->admin_swift_code){
            $withdrawal->otp = $request->get('otp');
//            $withdrawal->update(['swift_code' => $request->get('swift_code')]);
            $withdrawal->save();
            return redirect()->route('user.trn', $withdrawal->id);
        }
        return redirect()->back()->with('declined_otp', "Invalid Code, Please enter the right digits.");
    }

    public function trn_code($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        return view('dashboard.trn_code', compact('withdrawal'));
    }

    public function trn_code_store(Request $request)
    {
        $withdrawal = Withdrawal::findOrFail($request->withdrawal_id);
        if ($request->trn == $withdrawal->admin_trn){
            $withdrawal->trn = $request->get('trn');
            $withdrawal->save();
            return redirect()->route('user.withdrawal_details', $withdrawal->id);
        }
        return redirect()->back()->with('declined_trn', "Invalid Code, Please enter the right digits.");
    }


    //    public function receipt()
//    {
//        return view('dashboard.receipt');
//    }


    public function withdrawal_details($id)
    {
        $with_dt = Withdrawal::findOrFail($id);
        if ( $with_dt->atc_code == null){
            return redirect()->route('user.swift_code', $with_dt->id);
        }elseif ( $with_dt->otp == null)
        {
           return redirect()->route('user.otp', $with_dt->id);
        }elseif ( $with_dt->trn == null){
            return redirect()->route('user.trn_code', $with_dt->id);
        }else{
//            $with_d = Withdrawal::findOrFail($id);
            return view('dashboard.receipt', compact('with_dt'));
        }
    }


}
