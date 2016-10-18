<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('blog.contact');
    }

    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name','email');

        Mail::send('emails.contact', $data, function($message) use ($data){
           $message->subject('Blog Contact Form: '.$data['name'])
               ->to(config('blog.contact_email'))
               ->replyTo($data['email']);
        });

        return back();
    }
}
