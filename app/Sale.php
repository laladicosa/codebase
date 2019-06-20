<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['percentage', 'end_date', 'status', 'house_id'];

    const NOSALE = false;
    const SALE = true;

    public static function onSale(){
    	return $this->status = Sale::SALE;
    }
}
