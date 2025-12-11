<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function admin(){
        $data = [
            'todayAppointments' => \App\Models\Booking::whereDate('date', today())->count(),
             'customerCount' => \App\Models\Booking::select('customer_email')
              ->distinct()
              ->whereNotNull('customer_email')
              ->count('customer_email'),
            'todayAppointment' => \App\Models\Booking::with(['service', 'barber'])
                ->whereDate('date', today())
                ->orderBy('time')
                ->get(),
            'servicePopularity' => \App\Models\Booking::select('service_id')
            ->selectRaw('count(*) as count')
            ->with('service')
            ->groupBy('service_id')
            ->orderByDesc('count')
            ->limit(3)
            ->get(),
        ];
        return view('admin.dashboard', $data);
    }
}
