<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Damage;
use App\Merk, Session;
use App\Order;
use App\Price;
use App\Typeraket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $merks = Merk::all();
        $types = Typeraket::all();
        $prices = Price::all();
        $damages = Damage::all();
        $customers = Customer::where('toko',null)->get();
        $tokos = Customer::where('toko','!=',null)->get();
        $datas = $request->session()->get('list');
        return view('order.form_order', compact('merks','types','prices','datas','damages','customers','tokos'));
    }

    public function store(Request $request)
    {
        // $image = $request->damage_image_draw;  // your base64 encoded
        // $image = str_replace('data:image/png;base64,', '', $image);
        // $imageName = str_random(10) . '.' . 'png';
        // $hasil = File::put(public_path() . '/' . $imageName, base64_decode($image));
        // dd($image);
        $data = [
            'date_of_entry' => $request->date_of_entry,
            'customer_name' => $request->customer_name,
            'tokos_name' => $request->tokos_name,
            'no_raket' => $request->no_raket,
            'nota' => $request->nota,
            'jenis_raket' => $request->jenis_raket,
            'damage_position' => $request->damage_position,
            'damage_image' => $request->damage_image,
            'damage_qty' => $request->damage_qty,
            'price' => $request->price,
            'date_of_send' => $request->date_of_send,
            'note' => $request->note,
        ];

        $request->session()->push('list', $data);
        return back();
    }

    public function delete(Request $request, $index)
    {
        $request->session()->forget('list.'. $index);
        return back();
    }

    public function save_order(Request $request)
    {
        dd($request->session()->get('list'));
        $order = new Order();
        $data = [];
        foreach ($request->session()->get('list') as $key) {
            array_push($data,[
                'date_of_entry' => $key['date_of_entry'],
            'customer_name' => $key['customer_name'],
            'tokos_name' => $key['tokos_name'],
            'no_raket' => $key['no_raket'],
            'nota' => $key['nota'],
            'jenis_raket' => $key['jenis_raket'],
            'damage_position' => $key['damage_position'],
            'damage_image' => $key['damage_image'],
            'damage_qty' => $key['damage_qty'],
            'price' => $key['price'],
            'date_of_send' => $key['date_of_send'],
            'note' => $key['note'],
            ]);
        }
        $order->create($data);

    }
}
