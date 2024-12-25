<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'category',
        'date',
        'location',
        'price',
        'capacity',
        'user_id',
        'available_tickets',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsSoldOutAttribute()
    {
        return $this->available_tickets <= 0;
    }
}
