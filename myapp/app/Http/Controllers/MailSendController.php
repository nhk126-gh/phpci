<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\SendTestMail;

use Mail;
use App\User;

class MailSendController extends Controller
{
    //
    public function send(){

        $user = User::find(1);


        Mail::to($user)->send(new SendTestMail($user));
    }
}
