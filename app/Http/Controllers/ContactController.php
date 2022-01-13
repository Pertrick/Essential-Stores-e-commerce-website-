<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConatactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function createForm() {
        return view('user.contact');
    }

    // Store Contact Form data
    public function ContactUsForm(ConatactRequest $request) {

        // Form validation handlede by ContactRequest
        $request->validated();
        //  Store data in database
        Contact::create($request->all());

        //send mail
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('udohpertrick@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
