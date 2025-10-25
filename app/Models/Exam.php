<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model {

    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'minimum_score',
        'status',
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function results() {
        return $this->hasMany(Result::class);
    }

    public function bookingsCount() {
        return $this->hasMany(Booking::class)->count();
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function durationInMinutes() {
        return $this->start->diffInMinutes($this->end);
    }

    public function isActive() {
        return $this->status === 'active' && $this->end->isFuture();
    }

    public static function getUpcoming() {
        return self::where('start', '>', now())
            ->where('status', 'active')
            ->orderBy('start', 'asc');
    }
}