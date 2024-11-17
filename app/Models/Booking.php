<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    //
    use  HasFactory;

   protected $fillable = [
    'room_id',
    'name',
    'email',
    'phone',
    'checkin_date',
    'checkout_date'
];
}
