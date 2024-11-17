<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user') {
                $rooms = Room::all(); // Retrieve all rooms from the database

                return view('home.index',compact('rooms'));
            } else if($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $rooms = Room::all(); // Retrieve all rooms from the database
        return view('home.index', compact('rooms')); // Pass the rooms to the view
    }

    public function create_room(){
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $request->validate([
            'room_title' => 'required|string|max:255', // Match input name
            'description' => 'required|string',
            'price' => 'required|numeric',
            'room_type' => 'required|string', // Match input name
            'wifi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $room = new Room();
        $room->room_title = $request->room_title;
        $room->image = $request->room_title; // Match input name
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->room_type; // Match input name
        $room->wifi = $request->wifi;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $room->image = $imageName;
        }

        $room->save();

        return redirect()->back()->with('success', 'Room added successfully!');
    }
    public function view_room()
    {
        $rooms = Room::all(); // Retrieve all rooms from the database
        return view('admin.view_room', compact('rooms')); // Pass the rooms to the view
    }

    public function delete_room($id)
    {
        $room = Room::find($id);//use App\Models\Room;

        
        $room->delete();
        return redirect()->back();
    }

    public function update_room($id)
    {
        $room = Room::find($id); 
        return view('admin.edit_room', compact('room'));
    }

    public function edit_room(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'room_title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'wifi' => 'required|string',
        'room_type' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the room by ID
    $room = Room::find($id);

    // Check if the room exists
    if (!$room) {
        return redirect()->back()->with('error', 'Room not found.');
    }

    // Update the room details
    $room->room_title = $request->room_title;
    $room->description = $request->description;
    $room->price = $request->price;
    $room->room_type = $request->room_type;
    $room->wifi = $request->wifi;

    // Handle image upload if a new one is provided
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($room->image) {
            $oldImagePath = public_path('images/' . $room->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image file
            }
        }

        // Store the new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $room->image = $imageName;
    }

    // Save the room
    $room->save();

    return redirect()->back()->with('success', 'Room updated successfully.');
}

    
}