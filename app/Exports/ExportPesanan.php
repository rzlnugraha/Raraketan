<?php

namespace App\Exports;

use App\Ordermaster;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExportPesanan implements FromView, ShouldAutoSize
{
    use Exportable;
    
    public function __construct(string $awal, string $akhir)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }

    public function view() : View
    {
    	return view('data_export',[
    		'data' => Ordermaster::with('orders')->whereBetween('ordermasters.created_at',[$this->awal,$this->akhir])->get()
    	]);
    }
}
