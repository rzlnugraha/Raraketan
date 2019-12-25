<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th width="150px">No Raket</th>
                                            <th>Merk</th>
                                            <th>Jenis</th>
                                            <th width="80px">Jumlah Kerusakan</th>
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
                                            <td align="right" colspan="6"><strong>Grand Total</strong></td>
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
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
                        <!-- this row will not appear when printing -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
