<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Damage;
use App\Merk;
use App\Price;
use App\Typeraket;
use Illuminate\Http\Request;
use Alert;

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
        Alert::success('Berhasil menambah data','Success');
        return back();
    }

    public function editJenisMerk($id)
    {
        $merks = Merk::all();
        $tipe_merk = Typeraket::find($id);
        return view('master_data.edit_jenis_merk', compact('tipe_merk','merks'));
    }

    public function edit_damage($id)
    {
        $rusak = Damage::find($id);
        return view('master_data.edit_damage', compact('rusak'));
    }

    public function edit_customer($id)
    {
        $customer = Customer::find($id);
        return view('master_data.edit_customer', compact('customer'));
    }

    public function edit_merk($id)
    {
        $merk = Merk::find($id);
        return view('master_data.edit_merk', compact('merk'));
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
        } elseif ($request->tipe_store == 'damage') {
            $damage = Damage::find($id);
            $path = '/images/kerusakan/';
            if (file_exists($path.$damage->damage->image)) {
                unlink(public_path($path.$damage->damage_image));
            }

            $foto = 'damage-' . str_random(2) . time() . '.' . $request->file('damage_image')->getClientOriginalExtension();
            $request->damage_image->move(public_path($path), $foto);
            $damage->damage_image = $foto;
            $damage->save();
        } elseif ($request->tipe_store == 'merk') {
            $merk = Merk::find($id);
            $merk->update($request->all());
        }elseif ($request->tipe_store == 'tipe_merk') {
            $typeraket = Typeraket::find($id);
            $typeraket->update($request->all());
        }
        Alert::info('Berhasil merubah data','Success');
        return redirect()->route('masterdata.index');
    }

    public function Delete($id,$type)
    {
        if ($type == 'price') {
            $price = Price::destroy($id);
        }elseif ($type == 'damage') {
            $dmg = Damage::find($id);
            $path = '/images/kerusakan/';
            if (file_exists($path.$dmg->damage_image)) {
                unlink(public_path($path.$dmg->damage_image));
            }
            $damage = Damage::destroy($id);

        }elseif ($type == 'merk') {
            $merk = Merk::destroy($id);
            $typeraket = Typeraket::where('merk_id',$id)->delete();
        }elseif ($type == 'tipe-merk') {
            $typeraket = Typeraket::destroy($id);
        }
        return redirect('master-data');
    }

    public function delete_customer($id)
    {
        Customer::destroy($id);
        Alert::success('Berhasil menghapus data','Delete');
        return back();
    }

    // Tabel Harga

    public function edit_harga($id)
    {
        $price = Price::find($id);
        return view('master_data.edit_harga', ['price' => $price]);
    }

    public function delete_harga($id)
    {
        
    }
}
