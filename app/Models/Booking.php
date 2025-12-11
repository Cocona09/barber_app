<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'service_id',
        'barber_id',
        'date',
        'time',
        'status',
        'notes'
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function barber(){
        return $this->belongsTo(Barber::class);
    }
    // Scope for pending bookings
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope for upcoming bookings
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('time');
    }
}
