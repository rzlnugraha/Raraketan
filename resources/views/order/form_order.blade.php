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
                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                    
                                    <!-- Date mm/dd/yyyy -->
                                    
                                    <!-- /.form group -->
                    
                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Nomor Pesanan:</label>
                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-list"></i></span>
                                            </div>
                                            <input type="text" class="form-control" >
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
                                            <input type="text" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group">
                                            <label>Tanggal Dikirim / Diambil:</label>
                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    <!-- /.form group -->
                    
                                    <!-- IP mask -->
                                    <!-- /.form group -->
                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                    
                    
                            <!-- /.card -->
                    
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
                                                <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                        <option selected="selected">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                    
                                    <!-- Date and time range -->
                                    <div class="form-group">
                                        <label>Jenis Raket:</label>
                    
                                        <div class="input-group">
                                                <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                        <option selected="selected">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                    
                                    <!-- Date and time range -->
                                    <div class="form-group">
                                        <label>Jumlah Kerusakan:</label>
                    
                                        <div class="input-group">
                                            <input type="number" name="damage_qty" id="damage_qty" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label>Harga:</label>
                        
                                            <div class="input-group">
                                                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                            <option selected="selected">Alabama</option>
                                                            <option>Alaska</option>
                                                            <option>California</option>
                                                            <option>Delaware</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Washington</option>
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
                                                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                            <option selected="selected">Alabama</option>
                                                            <option>Alaska</option>
                                                            <option>California</option>
                                                            <option>Delaware</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Washington</option>
                                                        </select>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <h1>ATAU NGA GAMBAR TEA GENING</h1>
                                        <!-- /.form group -->
                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                    </div>
                    
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
                                                <div class="card-body p-0">
                                                  <table class="table table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Raket</th>
                                                        <th>Kerusakan</th>
                                                        <th style="width: 60px">Harga</th>
                                                        <th style="width: 60px">Jumlah</th>
                                                        <th style="width: 60px">Subtotal</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td>1.</td>
                                                        <td>Update software</td>
                                                        <td>
                                                          <div class="progress progress-xs">
                                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                          </div>
                                                        </td>
                                                        <td><span class="badge bg-danger">55%</span></td>
                                                        <td><span class="badge bg-danger">55%</span></td>
                                                        <td><span class="badge bg-danger">55%</span></td>
                                                      </tr>
                                                      <tr>
                                                        <td>2.</td>
                                                        <td>Clean database</td>
                                                        <td>
                                                          <div class="progress progress-xs">
                                                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                                                          </div>
                                                        </td>
                                                        <td><span class="badge bg-warning">70%</span></td>
                                                        <td><span class="badge bg-warning">70%</span></td>
                                                        <td><span class="badge bg-warning">70%</span></td>
                                                      </tr>
                                                      <tr>
                                                        <td>3.</td>
                                                        <td>Cron job running</td>
                                                        <td>
                                                          <div class="progress progress-xs progress-striped active">
                                                            <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                          </div>
                                                        </td>
                                                        <td><span class="badge bg-primary">30%</span></td>
                                                        <td><span class="badge bg-primary">30%</span></td>
                                                        <td><span class="badge bg-primary">30%</span></td>
                                                      </tr>
                                                      <tr>
                                                        <td>4.</td>
                                                        <td>Fix and squish bugs</td>
                                                        <td>
                                                          <div class="progress progress-xs progress-striped active">
                                                            <div class="progress-bar bg-success" style="width: 90%"></div>
                                                          </div>
                                                        </td>
                                                        <td><span class="badge bg-success">90%</span></td>
                                                        <td><span class="badge bg-success">90%</span></td>
                                                        <td><span class="badge bg-success">90%</span></td>
                                                      </tr>
                                                      <tr>
                                                          <td align="right" colspan="5">Total Keseluruhan :</td>
                                                          <td>20.000</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </div>

                                                <!-- /.card-body -->
                                              </div>
                                              <br>
                                              <button class="btn btn-primary col-md-4 mx-auto btn-lg"><i class="fa fa-save"></i> SIMPAN PESANAN</button>
                                              <br>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                        </div>
                        
                <!-- /.row -->
                
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                
            </div>
        </div>
    
</div>

@endsection
@section('script')
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
@endsection