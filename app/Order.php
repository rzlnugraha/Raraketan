<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ordermaster;

class Order extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'customer_id','date_of_entry','customer_name','no_raket','jenis_raket','damage_position','damage_image','damage_qty',
        'price','date_of_send','note'
    ];

    public function ordermaster()
    {
    	return $this->belongsTo(Ordermaster::class);
    }
}
