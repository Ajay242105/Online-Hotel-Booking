<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    //
    public function contact(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone_number=$request->phone_number;
        $contact->message=$request->message;

        $contact->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Your message has been sent successfully!'); 
       }

}
 