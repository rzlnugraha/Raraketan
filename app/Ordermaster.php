<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordermaster extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'date_of_entry','date_of_send','nota','customer_name','tokos_name','note','grand_total','status'
    ];
}
