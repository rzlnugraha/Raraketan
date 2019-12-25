@extends('layouts.app')
@section('content')
<br>
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Form Kirim Pesanan</h3>
            
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ url('send-order/save-send-order') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Pengiriman</h3>
                            </div>
                            <div class="card-body">
                                <!-- Date dd/mm/yyyy -->
                                
                                
                                <!-- /.form group -->
                                
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Tanggal Kirim:</label>
                                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input required type="date" name="date_of_send" class="form-control" value="{{ date('Y-m-d') }}" autocomplete="off">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                        <label>Jasa Pengiriman:</label>
                                        
                                        <div class="input-group">
                                            <input required name="service_name" type="text" id="service_name" min="1" class="form-control" placeholder="Nama Jasa Pengiriman" autocomplete="on">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Biaya Pengiriman:</label>
                                        
                                        <div class="input-group">
                                            <input type="number" min="0" value="0" autocomplete="on" name="service_price" class="form-control">
                                        </div>
                                        <input type="hidden" name="ordermaster_id" value="{{ $detail[0]->ordermaster_id }}">
                                        <!-- /.input group -->
                                    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Pengiriman</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Date dd/mm/yyyy -->
                                    
                                    
                                    <!-- /.form group -->
                                    
                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>No. Pesanan:</label>
                                        
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input required type="text" value="{{ $detail[0]->nota }}" disabled name="date_of_send" class="form-control" value="{{ date('Y-m-d') }}" autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                            <label>Customer/Toko:</label>
                                            
                                            <div class="input-group">
                                                <input required  type="text" id="service_name" class="form-control" placeholder="Nama Jasa Pengiriman" value="{{ !empty($detail[0]->customer_name) ? $detail[0]->customer_name : $detail[0]->tokos_name }}" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tanggal Masuk:</label>
                                            
                                            <div class="input-group">
                                                <input disabled type="text" value="{{ date('d F Y',strtotime($detail[0]->date_of_entry)) }}"  class="form-control">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pesanan</h3>
                            </div>
                            <div class="card-body">
                                <!-- Date range -->
                                <div class="form-group">
                                        <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
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
                                                        @forelse ($detail as $item)
                                                        <tr>
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
                                                            <td align="right" colspan="6"><strong>Grand Total</strong></td>
                                                            <td><strong>{{ number_format($detail[0]->grand_total) }}</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-truck"></i> Kirim Pesanan</button>
                </form>
                <!-- /.row -->
                
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                
            </div>
        </div>
        
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                
            </div>
        </div>
        
    </div>
    
    @endsection
    @section('script')
    
    <script src="{{ asset('assets') }}/libs/jSignature.min.js"></script>
    <script src="{{ asset('assets') }}/libs/modernizr.js"></script>
    
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()
            
            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
            )
            
            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
            
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()
            
            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()
            
            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
            
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
            
        })
    </script>
    
    <script>
        $(document).ready(function() {
            
            // Initialize jSignature
            var $sigdiv = $("#signature").jSignature({'UndoButton':true});
            
            $('#click').click(function(){
                // Get response of type image
                var data = $sigdiv.jSignature('getData', 'image');
                
                // Storing in textarea
                $('#output').val(data);
                
                // Alter image source 
                $('#sign_prev').attr('src',"data:"+data);
                $('#sign_prev').show();
                
            });
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('#merk_raket').on('change', function (e) {
                console.log(e);
                var merk_id = e.target.value;
                $.get('json_rakets?merk_id=' + merk_id, function (data) {
                    console.log(data);
                    
                    $('#raket').empty();
                    $('#raket').append('<option disabled selected>Pilih</option>');
                    
                    $.each(data, function (index, raketObj) {
                        $('#raket').append('<option value="'+ raketObj.type_name +'">'+ raketObj.type_name +'</option>');
                    });
                });
            });
            
            $('#customer').on('change', function () {
                var cust = $('#customer').val();
                var toko = $('#toko').val();
                if (cust.trim() != "") {
                    $('#toko').attr('disabled','disabled');
                } else if (cust.trim() == "") {
                    $('#toko').removeAttr('disabled');
                } else {
                }
            });
            
            $('#toko').on('change', function () {
                var cust = $('#customer').val();
                var toko = $('#toko').val();
                if (toko.trim() != "") {
                    $('#customer').attr('disabled','disabled');
                } else {
                    $('#customer').removeAttr('disabled');
                }
            });
        });
    </script>
    
    @endsection