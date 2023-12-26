<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from demo.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('shoukat.bjr@gmail.com')->send(new DemoMail($mailData));

        dd("Email is sent successfully.");
    }
}
