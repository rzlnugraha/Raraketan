@extends('layouts.app')
@section('content')
@include('modal.modal')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History Pesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Dikirim</th>
                  <th>Nota</th>
                  <th>Nama Toko/Customer</th>
                  <th>Grand Total</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @forelse ($data as $master)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ date('d F Y' , strtotime($master->date_of_entry)) }}</td>
                  <td>{{ date('d F Y', strtotime($master->date_of_send)) }}</td>
                  <td>{{ $master->nota }}</td>
                  <td>{{ $master->customer_name.'' }}{{ $master->tokos_name }}</td>
                  <td>{{ 'Rp. '.number_format($master->grand_total,0,',','.') }}</td>
                  <td align="center">
                    <a href="{{ route('detail.order',$master->id) }}" class="btn-show" title="Detail" id="show"><i class="fa fa-eye text-primary" ></i></a>
                  </td>
                </tr>
                @empty
                @endforelse
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>

  <script>
    $('#show').on('click', function () {
      event.preventDefault();
    });

    // $('.btn-show').on('click', function (event) {
    //   event.preventDefault();
    //   console.log('hahaha');
      

    //   var me = $(this),
    //       url = me.attr('href'),
    //       title = me.attr('title');

    //   $('modal-title').text(title);
    //   $('#modal-btn-save').addClass(hide);

    //   $.ajax({
    //     url : url,
    //     dataType : 'html',
    //     success : function (response) {
    //         $('#modal-body').html(response);
    //     }
    //   });
    // });
  </script>
@endsection