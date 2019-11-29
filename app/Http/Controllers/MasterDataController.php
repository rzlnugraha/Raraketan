<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Damage;
use App\Merk;
use App\Price;
use App\Typeraket;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        $user = Customer::where('toko',null)->latest()->get();
        $tokos = Customer::where('toko', '!=', null)->latest()->get();
        $harga = Price::latest()->get();
        $merks = Merk::latest()->get();
        $types = Typeraket::latest()->get();
        $damages = Damage::latest()->get();
        return view('master_data.index', compact('user','harga','merks','types','damages','tokos'));
    }

    public function store(Request $request)
    {
        if ($request->tipe_store == 'customer') {
            Customer::create($request->all());
        } elseif ($request->tipe_store == 'price') {
            Price::create($request->all());
        } elseif ($request->tipe_store == 'merk') {
            Merk::create($request->all());
        } elseif ($request->tipe_store == 'tipe_merk') {
            Typeraket::create($request->all());
        } elseif ($request->tipe_store == 'damage') {
            $damage = new Damage();
            $path = '/images/kerusakan/';
            $foto = 'damage-' . str_random(2) . time() . '.' . $request->file('damage_image')->getClientOriginalExtension();
            $request->damage_image->move(public_path($path), $foto);
            $damage->damage_image = $foto;
            $damage->save();
        }
        return back();
    }

    public function edit_customer($id)
    {
        $customer = Customer::find($id);
        return view('master_data.edit_customer', compact('customer'));
    }

    public function edit_toko($id)
    {
        $customer = Customer::find($id);
        return view('master_data.edit_toko', compact('customer'));
    }
    
    public function update(Request $request, $id)
    {
        if ($request->tipe_store == 'customer') {
            $customer = Customer::find($id);
            $customer->update($request->all());
        } elseif ($request->tipe_store == 'price') {
            $price = Price::find($id);
            $price->update($request->all());
        } else {

        }
        return redirect()->route('masterdata.index');
    }

    public function delete_customer($id)
    {
        Customer::destroy($id);
        return back();
    }

    // Tabel Harga

    public function edit_harga($id)
    {
        
    }

    public function delete_harga($id)
    {
        
    }
}
