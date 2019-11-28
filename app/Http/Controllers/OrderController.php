<?php

namespace App\Http\Controllers;

use App\Merk, Session;
use App\Price;
use App\Typeraket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $merks = Merk::all();
        $types = Typeraket::all();
        $prices = Price::all();
        $datas = $request->session()->get('list');
        return view('order.form_order', compact('merks','types','prices','datas'));
    }

    public function store(Request $request)
    {
        $image = $request->damage_image;
        $merks = Merk::all();
        $types = Typeraket::all();
        $prices = Price::all();
        $datas = $request->session()->get('list');

        $image = $request->damage_image;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $imageName = str_random(10) . '.' . 'png';
        \File::put(public_path() . '/' . $imageName, base64_decode($image));
        // $data = [
        //     'date_of_entry' => $request->date_of_entry,
        //     'customer_name' => $request->customer_name,
        //     'no_raket' => $request->no_raket,
        //     'jenis_raket' => $request->jenis_raket,
        //     'damage_position' => $request->damage_position,
        //     'damage_image' => $request->damage_image,
        //     'damage_qty' => $request->damage_qty,
        //     'price' => $request->price,
        //     'date_of_send' => $request->date_of_send,
        //     'note' => $request->note,
        // ];

        // $request->session()->push('list', $data);
        return view('order.form_order', compact('merks','types','prices','datas','imageName'));
        // return back();
    }

    public function delete(Request $request, $index)
    {
        $request->session()->forget('list.'. $index);
        return back();
    }
}
