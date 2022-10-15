<?php

namespace App\Http\Controllers;

use App\Message;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
//        $credit = Transactions::whereUserId(\auth()->id())->select('amount')->where('debit', '=', 1)->where('status', '=', 1)->sum('amount');
        $credit = Transactions::whereUserId(\auth()->id())->select('amount')->where('acct_number', '=', Auth::user()->account->account_number)->where('status', '=', 1)->sum('amount');
        $debit = Transactions::whereUserId(\auth()->id())->select('amount')->where('from', '=', Auth::user()->account->account_number)->where('status', '=', 1)->sum('amount');

        $pending_debit = Transactions::whereUserId(\auth()->id())->select('amount')->where('debit', '=', 1)->where('status', '=', 0)->sum('amount');

        $transactions = Transactions::whereUserId(auth()->id())->paginate(4);
        $total_trans = Transactions::whereUserId(auth()->id())->get()->count();
        return view('dashboard.index', compact('debit', 'total_trans', 'transactions', 'pending_debit', 'credit'));
    }

    public function user_profile(User $user)
    {
        $user = Auth::user();
//        $user_prof = User::findOrFail($id);
        return view('dashboard.profile2', compact('user'));
    }



    public function update(User $user)
    {

        if (Auth::user()->email == request('email')) {

            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
//                'email' => 'required|email|unique:users',
                'phone' => 'nullable',
                'country' => 'nullable',
                'state' => 'nullable',
                'city' => 'nullable',
                'address' => 'nullable',
            ]);

            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
//            $user->email = request('email');
            $user->phone = request('phone');
            $user->country = request('country');
            $user->state = request('state');
            $user->city = request('city');
            $user->address = request('address');
            // $user->email = request('email');
//            $user->password = bcrypt(request('password'));

            $user->save();

            return back();

        } else {

            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'nullable',
                'country' => 'nullable',
                'state' => 'nullable',
                'city' => 'nullable',
                'address' => 'nullable',
            ]);

            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->country = request('country');
            $user->state = request('state');
            $user->city = request('city');
            $user->address = request('address');
            $user->save();

            return redirect()->back();
        }
    }

    public function kyc()
    {
        return view('dashboard.kyc');
    }

    public function kyc_store(Request $request)
    {
        if ($request->hasFile('id_picture')) {
            $fileNameWithExt = $request->file('id_picture')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('id_picture')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store the image
            $path = $request->file('id_picture')->storeAs('public/id_picture/', $fileNameToStore);
        }else {
            $fileNameToStore = ' Noimage';
        }

        $user_id_type = User::findOrFail(auth()->id());
        if($fileNameToStore){
            $user_id_type->update(['id_type' => $request->id_type, 'id_picture' => $fileNameToStore]);
        }
        return redirect()->back()->with('success', 'ID submitted successfully, wait for approval');
    }


    public function notifications()
    {
        $notify = Message::whereUserId(auth()->id())->where('read', '=', 0)->latest()->get();
        return view('dashboard.inbox', compact('notify'));
    }

    public function read()
    {
        $read = Message::whereUserId(auth()->id())->where('read', '=', 1)->latest()->get();
        return view('dashboard.read', compact('read'));
    }

    public function show_notify($slugString)
    {
        $msg_details = Message::findBySlugOrFail($slugString);
        if(!$msg_details->read){
            $msg_details->read = 1;
            $msg_details->save();
        }
        return view('dashboard.inbox-read', compact('msg_details'));
    }



}
