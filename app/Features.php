<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $fillable = ['bedroom', 'bathroom', 'living_room', 'kitchen', 'patio', 'garage', 'garden', 'swimming_pool', 'toilet', 'house_id'];
}
