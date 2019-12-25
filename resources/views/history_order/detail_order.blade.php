@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Order</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    Raket Service
                                    <small class="float-right">Date: {{ date('d F Y',strtotime($detail[0]->created_at)) }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>No. Pesanan#</strong>{{ $detail[0]->nota }}<br>
                                    <span>Tanggal Masuk : {{ date('d F Y',strtotime($detail[0]->date_of_entry)) }}</span><br>
                                    <span>Tanggal Dikirim : {{ !empty($detail[0]->date_of_send) ? date('d F Y',strtotime($detail[0]->date_of_send)) : 'belum dikirim' }}</span>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Customer/Toko : {{ !empty($detail[0]->customer_name) ? $detail[0]->customer_name : $detail[0]->tokos_name }}</strong><br>
                                    <span>Jasa Pengiriman : {{ !empty($detail[0]->service_name) ? $detail[0]->service_name : '' }}</span><br>
                                    <span>Biaya Pengiriman : {{ !empty($detail[0]->service_price) ? number_format($detail[0]->service_price) : '' }}</span>
                                </address>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Raket</th>
                                            <th>Merk</th>
                                            <th>Jenis</th>
                                            <th>Posisi Kerusakan</th>
                                            <th>Jumlah Kerusakan</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @forelse ($detail as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->no_raket }}</td>
                                            <td>{{ $item->merk_name }}</td>
                                            <td>{{ $item->jenis_raket }}</td>
                                            <td>
                                                @php
                                                    $unseri = @unserialize($item->damage_position);
                                                @endphp
                                                @if ($unseri !== false)
                                                @foreach ($unseri as $dmg)
                                                <img src="{{ asset('images').'/kerusakan/' }}{{ !empty($dmg) ? $dmg : $item->damage_image }}" alt="gambar kerusakkan" width="100px" height="100px">
                                                @endforeach
                                                @else
                                                <img src="{{ asset('images').'/kerusakan/' }}{{ !empty($item->damage_position) ? $item->damage_position : $item->damage_image }}" alt="gambar kerusakkan" width="100px" height="100px">
                                                @endif
                                            </td>
                                            <td>{{ $item->damage_qty }}</td>
                                            <td>{{ number_format($item->price) }}</td>
                                            <td>{{ number_format($item->price*$item->damage_qty) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td align="right" colspan="7"><strong>Grand Total</strong></td>
                                            <td><strong>{{ number_format($detail[0]->grand_total) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                catatan : {{ $detail[0]->note }}
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a target="_blank" href="{{ url('detail-order/print').'/'.$detail[0]->ordermaster_id }}"><button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-print"></i> PRINT
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection 