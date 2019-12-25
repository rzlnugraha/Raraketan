<?php

namespace App\Http\Controllers;

use App\Customer, Alert;
use App\Damage;
use App\Merk;
use App\Order;
use App\Ordermaster;
use App\Price;
use App\Sendorder;
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
        $last_order_id = Ordermaster::latest()->first(['id']);
        return view('order.form_order', compact('merks','types','prices','datas','damages','customers','tokos','last_order_id'));
    }

    public function store(Request $request)
    {
        $jenis_raket = ucwords($request->jenis_raket);
        $merk_name = Merk::find($request->merk_id)->merk_name;
        $data = [
            'no_raket' => $request->no_raket,
            'merk_name' => $merk_name,
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
        // $unseri = @unserialize($request->date_of_entry);
        // dd($unseri);
        try {
            $master = Ordermaster::create([
                'date_of_entry' => $request->date_of_entry,
                'customer_name' => ucwords($request->customer_name),
                'tokos_name' => ucwords($request->tokos_name),
                'nota' => $request->nota,
                'note' => $request->note,
                'status' => 1, # 1 = dalam proses, 2 = selesai
                'grand_total' => $request->grand_total
            ]);
    
            $data = [];
            foreach ($request->session()->get('list') as $key) {
                $order = new Order();
                $data[] = [
                    $no_raket = $key['no_raket'],
                    $jenis_raket = ucwords($key['jenis_raket']),
                    $damage_position = serialize($key['damage_position']),
                    $damage_image = $key['damage_image'],
                    $damage_qty = $key['damage_qty'],
                    $price = $key['price'],
                    $merk_name = ucwords($key['merk_name']),
                    $ordermaster_id = $master->id,
                ];
                
    
                $order->no_raket = $no_raket;
                $order->jenis_raket = $jenis_raket;
                $order->damage_position = $damage_position;
                $order->damage_image = $damage_image;
                $order->damage_qty = $damage_qty;
                $order->price = $price;
                $order->merk_name = $merk_name;
                $order->ordermaster_id = $ordermaster_id;
                $order->save();
            }
    
            $request->session()->forget('list');
            $request->session()->flash('alert_message', 'Data Berhasil Disimpan');
            $request->session()->flash('alert_notif', 'success');
        } catch (\Throwable $th) {
            $request->session()->flash('alert_message', $th->getMessage());
            $request->session()->flash('alert_notif', 'danger');
            
        }
        return back();

    }

    public function historyOrder()
    {
        $ordermaster = Ordermaster::where('status',2)->orderBy('id','ASC')->get();
        return view('history_order.index', compact('ordermaster'));
    }

    public function hapusOrder($id)
    {
        try {
            $orderdetail = Order::where('ordermaster_id',$id)->delete();
            $ordermaster = Ordermaster::destroy($id);
            session()->flash('alert_message', 'Data Berhasil Disimpan');
            session()->flash('alert_notif', 'success');
            return back();
        } catch (\Throwable $th) {
            session()->flash('alert_message', $th->getMessage());
            session()->flash('alert_notif', 'danger');
            return back();
        }

    }

    public function detailOrder($id)
    {
        $detail = Ordermaster::join('orders','orders.ordermaster_id','ordermasters.id')
        ->leftjoin('sendorders','sendorders.ordermaster_id','ordermasters.id')
        ->where('ordermasters.id',$id)
        ->get([
            'ordermasters.id AS ordermaster_id',
            'ordermasters.created_at AS created_at',
            'ordermasters.nota AS nota',
            'ordermasters.note AS note',
            'ordermasters.customer_name AS customer_name',
            'ordermasters.tokos_name AS tokos_name',
            'ordermasters.grand_total AS grand_total',
            'ordermasters.date_of_entry AS date_of_entry',
            'ordermasters.date_of_send AS date_of_send',
            'orders.no_raket AS no_raket',
            'orders.jenis_raket AS jenis_raket',
            'orders.damage_position AS damage_position',
            'orders.damage_image AS damage_image',
            'orders.damage_qty AS damage_qty',
            'orders.price AS price',
            'orders.merk_name AS merk_name',
            'sendorders.service_name AS service_name',
            'sendorders.service_price AS service_price'
        ]);
        return view('history_order.detail_order', compact('detail'));
    }

    public function sendOrder()
    {
        $ordermaster = Ordermaster::where('status',1)->orderBy('id','ASC')->get();
        return view('order.send_order', compact('ordermaster'));
    }

    public function sendOrderForm($id)
    {
        $detail = Ordermaster::join('orders','orders.ordermaster_id','ordermasters.id')->where('ordermasters.id',$id)
        ->get([
            'ordermasters.id AS ordermaster_id',
            'ordermasters.created_at AS created_at',
            'ordermasters.nota AS nota',
            'ordermasters.note AS note',
            'ordermasters.customer_name AS customer_name',
            'ordermasters.tokos_name AS tokos_name',
            'ordermasters.grand_total AS grand_total',
            'ordermasters.date_of_entry AS date_of_entry',
            'ordermasters.date_of_send AS date_of_send',
            'orders.no_raket AS no_raket',
            'orders.jenis_raket AS jenis_raket',
            'orders.damage_position AS damage_position',
            'orders.damage_image AS damage_image',
            'orders.damage_qty AS damage_qty',
            'orders.price AS price',
            'orders.merk_name AS merk_name'
        ]);

        return view('order.form_send_order',compact('detail'));
    }

    public function saveSendOrder(Request $request)
    {
        try {
            $sendorder = Sendorder::create([
                'service_name' => strtoupper($request->service_name),
                'service_price' => $request->service_price,
                'ordermaster_id' => $request->ordermaster_id,
            ]);
    
            $ordermaster = Ordermaster::find($request->ordermaster_id);
            $ordermaster->date_of_send = $request->date_of_send;
            $ordermaster->status = 2; # status selesai
            $ordermaster->save();

            $request->session()->flash('alert_message', 'Data Berhasil Disimpan');
            $request->session()->flash('alert_notif', 'success');
            return redirect('send-order');
        } catch (\Throwable $th) {
            echo "terjadi kesalahan ".$th->getMessage();
        }
    }

    public function detailPrint($id)
    {
        $detail = Ordermaster::join('orders','orders.ordermaster_id','ordermasters.id')
        ->leftjoin('sendorders','sendorders.ordermaster_id','ordermasters.id')
        ->where('ordermasters.id',$id)
        ->get([
            'ordermasters.id AS ordermaster_id',
            'ordermasters.created_at AS created_at',
            'ordermasters.nota AS nota',
            'ordermasters.note AS note',
            'ordermasters.customer_name AS customer_name',
            'ordermasters.tokos_name AS tokos_name',
            'ordermasters.grand_total AS grand_total',
            'ordermasters.date_of_entry AS date_of_entry',
            'ordermasters.date_of_send AS date_of_send',
            'orders.no_raket AS no_raket',
            'orders.jenis_raket AS jenis_raket',
            'orders.damage_position AS damage_position',
            'orders.damage_image AS damage_image',
            'orders.damage_qty AS damage_qty',
            'orders.price AS price',
            'orders.merk_name AS merk_name',
            'sendorders.service_name AS service_name',
            'sendorders.service_price AS service_price'
        ]);

        return view('history_order.print_order',compact('detail'));
    }
}
