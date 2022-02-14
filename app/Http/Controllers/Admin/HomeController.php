<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendWelcomeEmail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index() {
        
        Mail::to(Auth::user()->email)->send(New SendWelcomeEmail(Auth::user()->name));


        return view('admin.home');
    }
}
