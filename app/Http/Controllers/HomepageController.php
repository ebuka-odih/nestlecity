<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function personal()
    {
        return view('front.personal');
    }

    public function business()
    {
        return view('front.business');
    }

}
