<?php

namespace App\Http\Controllers;

use App\Typeraket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{
    public function json_rakets()
    {
        $merk_id = Input::get('merk_id');
        $raket = Typeraket::where('merk_id',$merk_id)->get();
        return response()->json($raket);
    }
}
