<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordermaster extends Model
{
    protected $fillable = [
        'date_of_entry','date_of_send','nota','customer_name','tokos_name','note','grand_total'
    ];
}
