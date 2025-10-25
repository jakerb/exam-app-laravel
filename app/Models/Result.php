<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /** @use HasFactory<\Database\Factories\ResultFactory> */
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'score',
    ];

    public function booking() {
        return $this->belongsTo(Booking::class);
    }

    public function exam() {
        return $this->hasOneThrough(Exam::class, Booking::class, 'id', 'id', 'booking_id', 'exam_id');
    }

    public function hasPassed() {
        return $this->score >= $this->exam->minimum_score;
    }   

    public function hasFailed() {
        return $this->score < $this->exam->minimum_score;
    }
}
