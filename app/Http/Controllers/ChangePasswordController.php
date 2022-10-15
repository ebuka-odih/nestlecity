<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('dashboard.security');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
            'pass' => 'nullable',
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password), 'pass' => $request->password]);

        return redirect()->back()->with('success', "Password Changed Successfully!");
    }
}
