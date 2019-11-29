<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id','date_of_entry','customer_name','no_raket','jenis_raket','damage_position','damage_image','damage_qty',
        'price','date_of_send','note'
    ];
}
