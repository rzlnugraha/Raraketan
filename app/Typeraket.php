<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Merk;

class Typeraket extends Model
{
    protected $fillable = ['merk_id','type_name'];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }
}
