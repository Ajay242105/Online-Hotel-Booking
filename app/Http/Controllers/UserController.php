<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking; 
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id); 
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|min:10|max:15',
        'checkin_date' => 'required|date|after_or_equal:today',
        'checkout_date' => 'required|date|after:checkin_date',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Check if the room is booked in the given date range
    $startDate = $request->checkin_date;
    $endDate = $request->checkout_date;

    $isBooked = Booking::where('room_id', $id)
        ->where('checkout_date', '>=', $startDate) // Ensure the room is booked until after check-in
        ->where('checkin_date', '<=', $endDate) // Ensure the room is booked before check-out
        ->exists();

    if ($isBooked) {
        // Room is not available
        return redirect()->back()->with('error', 'Room is not available for the selected dates.');
    } else {
        // Create and save the booking
        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->checkin_date = $request->checkin_date;
        $booking->checkout_date = $request->checkout_date;
        $booking->room_id = $id; // Associate the booking with the room
        $booking->save();

        return redirect()->back()->with('success', 'Booking successful!');
    }
}

}