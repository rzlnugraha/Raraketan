<?php

namespace App;
use App\Typeraket;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable = ['merk_name'];

    public function typerakets()
    {
        return $this->hasMany(Typeraket::class);
    }
}
