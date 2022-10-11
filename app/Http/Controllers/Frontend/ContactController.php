<?php

namespace App\Http\Controllers\Frontend;
use App\Mail\ContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function Contacts()
    {
        return view('Frontend.Contact.contact');
    }
    public function save(Request $request) 
    { 

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();


        \Mail::send('Frontend.Contact.contact_email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'phone_number' => $request->get('phone_number'),
            'user_message' => $request->get('message'),  
        ), function($message) use ($request)
          {
             $message->from($request->email);
             $message->to('madhavneupane922@gmail.com');
          });
      
        

        

        return redirect()->back()->with('success', 'Thank you for contact us!');
    }
}
