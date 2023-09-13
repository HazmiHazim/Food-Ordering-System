<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_name',
        'reservation_email',
        'reservation_contact',
        'reservation_attendees',
        'reservation_date',
        'reservation_time',
        'reservation_message',
        'dining_table_id',
        'reservation_status',
    ];

    public function diningTable() : BelongsTo
    {
        return $this->belongsTo(DiningTable::class, 'dining_table_id');
    }
}
