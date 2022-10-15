<?php

namespace App\Http\Controllers;

use App\NextOfKin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NextOfKinController extends Controller
{
    //
    public function index(){
        return view('pages.next-of-kin');
    }
    
    public function store(Request $request)
    {
//        $data = $request->session()->all();
//        return $data;

        $data = $this->getData($request);
        $data['user_id'] = session('user_id');

        $data['user_id'] = Auth::id();
        NextOfKin::create($data);
        return redirect()->route('user.dashboard');
    }


    protected function getData(Request $request){

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'm_status' => 'required',
        ];
        return $request->validate($rules);
    }
}
