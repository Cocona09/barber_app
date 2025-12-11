<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['service', 'barber']);

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->has('date')) {
            $query->where('date', $request->date);
        }

        $bookings = $query->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->paginate(20);

        return view('admin.bookings.index', compact('bookings'));
    }
    public function edit($id)
    {
        $booking = Booking::with(['service', 'barber'])->findOrFail($id);
        return view('admin.bookings.edit', compact('booking'));
    }
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string'
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully');
    }
}
