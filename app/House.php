<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class House extends Model
{
	use SoftDeletes, Searchable;

    protected $fillable = [ 'title', 'description', 
                            'address', 'price', 'width', 
                            'length', 'status', 'user_id',
                            'feature_id', 'sale_id', 'status', 
                            'image', 'image_two', 'image_three' ];

    protected $dates = ['deleted_at'];

    const UNAVAILABLE = 'Non-Active';
    const AVAILABLE = 'Active';

    public function searchableAs()
    {
        return 'title';
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function isAvailable(){
    	return $this->status = House::AVAILABLE;
    }
}
