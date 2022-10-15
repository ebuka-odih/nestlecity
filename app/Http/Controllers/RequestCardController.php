<?php

namespace App\Http\Controllers;

use App\Mail\CardRequest;
use App\RequestCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RequestCardController extends Controller
{
    //
//    public function card()
//    {
//        return view('dashboard.card');
//    }

    public function card()
    {
        $cards = RequestCard::all();
        $card_count = RequestCard::all()->count();
        return view('dashboard.card', compact('cards', 'card_count'));
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['first_name'] = Auth::user()->first_name;
        $data['last_name'] = Auth::user()->last_name;
        $card = RequestCard::create($data);

//        $data = ['card' => $card];
//        Mail::to('admin@shirecitybank.com')->send( new CardRequest($data));
        return redirect()->back()->with('success', 'Request Sent Successful, we will get back to you');
    }


    protected function getData(Request $request)
    {
        $rules = [
            'first_name' => "required",
            'last_name' => "required",
            'nickname' => "required",
            'card_type' => "required",
        ];
        return $request->validate($rules);
    }



}
