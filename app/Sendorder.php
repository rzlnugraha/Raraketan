<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sendorder extends Model
{
    protected $fillable = ['service_name','service_price','ordermaster_id'];
    
}
