<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{  public function contact(Request $request)
    {
        // Debugging: Check if the request data is received
        \Log::info('Contact form data:', $request->all());

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        // Create a new contact message
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

        // Save the contact message to the database
        if ($contact->save()) {
            return back()->with('success', 'Your message has been sent successfully!');
        } else {
            return back()->with('error', 'Failed to send your message. Please try again.');
        }
    }
}