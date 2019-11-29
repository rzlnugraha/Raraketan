@extends('layouts.app')
@section('content')
<br>
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Form Input Barang Pesanan</h3>
            
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (!empty($imageName))
                <img src="{{ asset('assets/'.$imageName) }}" alt="">
            @endif
            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Detail</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Tanggal Masuk:</label>
            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" value="{{ date('Y-m-d') }}" disabled name="date_of_entry" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor Pesanan:</label>
            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    </div>
                                    <input type="text" name="customer_name" class="form-control" value="{{ 'SRKT'.strtoupper(str_random(5)) }}" readonly>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
            
                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Nomor Raket:</label>
            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="no_raket" class="form-control">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Tanggal Dikirim / Diambil:</label>
            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="date_of_send" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Raket</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date range -->
                            <div class="form-group">
                                <label>Merk Raket:</label>
            
                                <div class="input-group">
                                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="merk_raket">
                                        <option disabled selected="selected">Pilih</option>
                                        @foreach ($merks as $merk)
                                        <option value="{{ $merk->id }}">{{ $merk->merk_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Raket:</label>
            
                                <div class="input-group">
                                    <input name="jenis_raket" list="raket" class="form-control" autocomplete="off" placeholder="Harus pilih merk dulu">

                                    <datalist id="raket">
                                        
                                    </datalist>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
            
                            <!-- Date and time range -->
                            <div class="form-group">
                                <label>Jumlah Kerusakan:</label>
            
                                <div class="input-group">
                                    <input name="damage_qty" type="number" name="damage_qty" id="damage_qty" min="1" class="form-control" placeholder="Jumlah Kerusakan ada berapa">
                                </div>
                            </div>

                            <div class="form-group">
                                    <label>Harga:</label>
                
                                    <div class="input-group">
                                        <select name="price" class="form-control select2 select2-primary" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            <option disabled selected>Pilih</option>
                                            @foreach ($prices as $price)
                                            <option value="{{ $price->price }}">{{ 'Rp. '.number_format($price->price,0,',','.') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            <!-- /.form group -->
            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Raket</h3>
                            </div>
                            <div class="card-body">
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>List Kerusakan:</label>
                
                                    <div class="input-group">
                                        @forelse ($damages as $damage)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="damage_image" value="{{ $damage->damage_image }}">
                                            <label class="form-check-label"><img src="{{ asset('images/kerusakan/'.$damage->damage_image) }}" width="150px" height="100px"></label>
                                        </div>
                                        @empty
                                            
                                        @endforelse
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <h1>Gambar (Opsional)</h1>
                                {{-- <div id="signature" style="width:100%"></div>

                                <input type='button' id='click' value='click'>
                                <textarea id='output'></textarea><br/> --}}

                                <!-- Preview image -->
                                {{-- <img src='' id='sign_prev' style='display: none;' /> --}}
                                <!-- /.form group -->
                            </div>
                        </div>
                    </div>
            </div>
            <button type="submit" class="btn btn-danger btn-lg">Save</button>
            </form>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            
        </div>
    </div>

    <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">List Input Barang</h3>
                
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">List Input Barang</h3>
                                </div>
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Raket</th>
                                                <th>Kerusakan</th>
                                                <th style="width: 60px">Harga</th>
                                                <th style="width: 60px">Jumlah</th>
                                                <th style="width: 100px">Subtotal</th>
                                                <th style="width: 60px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($datas != null)
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($datas as $index => $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data['jenis_raket'] }}</td>
                                                <td><img src="{{ asset('images/kerusakan/'.$data['damage_image']) }}" width="150px" height="100px"></td>
                                                <td>{{ 'Rp. '.number_format($data['price'],0,',','.') }}</td>
                                                <td>{{ $data['damage_qty'] }}</td>
                                                <td>{{ 'Rp. '.number_format($data['price'] * $data['damage_qty'],0,',','.') }}</td>
                                                <td>
                                                    <a href="{{ route('delete_session',$index) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary col-md-4 mx-auto btn-lg"><i class="fa fa-save"></i> SIMPAN PESANAN</button>
                                <br>
                                <!-- /.card-body -->
                            </div>
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
    });
</script>

@endsection