<?php

namespace App\Http\Controllers;

use App\Customer, Alert;
use App\Damage;
use App\Merk, Session;
use App\Order;
use App\Ordermaster;
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
        $jenis_raket = ucwords($request->jenis_raket);
        $data = [
            'no_raket' => $request->no_raket,
            'merk_id' => $request->merk_id,
            'jenis_raket' => $jenis_raket,
            'damage_qty' => $request->damage_qty,
            'price' => $request->price,
            'damage_position' => $request->damage_position,
            'damage_image' => $request->damage_image,
        ];


        $typeraket = Typeraket::where('type_name',$jenis_raket)->first();
        if (is_null($typeraket)) {
            $inserttype = Typeraket::create([
                'type_name' => $jenis_raket,
                'merk_id' => $request->merk_id,
            ]);
        }

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
        
        $master = Ordermaster::create([
            'date_of_entry' => $request->date_of_entry,
            'customer_name' => $request->customer_name,
            'tokos_name' => $request->tokos_name,
            'nota' => $request->nota,
            'date_of_send' => $request->date_of_send,
            'note' => $request->note,
            'grand_total' => $request->grand_total
        ]);

        $data = [];
        foreach ($request->session()->get('list') as $key) {
            $order = new Order();
            $data[] = [
                $no_raket = $key['no_raket'],
                $jenis_raket = $key['jenis_raket'],
                $damage_position = $key['damage_position'],
                $damage_image = $key['damage_image'],
                $damage_qty = $key['damage_qty'],
                $price = $key['price'],
                $merk_id = $key['merk_id'],
                $ordermaster_id = $master->id,
            ];
            $order->no_raket = $no_raket;
            $order->jenis_raket = $jenis_raket;
            $order->damage_position = $damage_position;
            $order->damage_image = $damage_image;
            $order->damage_qty = $damage_qty;
            $order->price = $price;
            $order->merk_id = $merk_id;
            $order->ordermaster_id = $ordermaster_id;
            $order->save();
        }

        $request->session()->forget('list');
        Alert::success('Berhasil','Success');
        return back();
    }

    public function historyOrder()
    {
        return view('history_order.index');
    }
}
