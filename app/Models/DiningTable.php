<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DiningTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'isOccupied',
    ];

    public function customerOrder() : HasOne
    {
        return $this->hasOne(CustomerOrder::class, 'dining_table_id');
    }

    public function reservation() : HasOne
    {
        return $this->hasOne(Reservation::class, 'dining_table_id');
    }
}
