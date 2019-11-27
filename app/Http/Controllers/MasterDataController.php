<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Price;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        $user = Customer::latest()->get();
        $harga = Price::latest()->get();
        return view('master_data.index', compact('user','harga'));
    }

    public function store(Request $request)
    {
        if ($request->tipe_store == 'customer') {
            Customer::create($request->all());
        } elseif ($request->tipe_store == 'price') {
            Price::create($request->all());
        } else {

        }
        return back();
    }

    public function edit_customer($id)
    {
        $customer = Customer::find($id);
        return view('master_data.edit_customer', compact('customer'));
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
