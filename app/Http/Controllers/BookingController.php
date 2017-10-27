<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Booking $booking)
    {
        return view('client.bookings.booking', compact('booking'));

    }
    public function delete(Request $request, Booking $booking)
    {
        $booking->delete();
        return redirect()->route('clientDashboard');
    }
}
