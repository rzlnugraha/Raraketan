@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kirim Pesanan</h1>
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
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Dikirim / Diambil</th>
                  <th>No. Pesanan</th>
                  <th>Grand Total</th>
                  <th>Customer</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($ordermaster as $item)
                <tr>
                  <td>{{ date('d F Y',strtotime($item->date_of_entry)) }}</td>
                  <td>{{ !empty($item->date_of_send) ? date('d F Y',strtotime($item->date_of_send)) : "Belum Dikirim" }}</td>
                  <td>{{ $item->nota }}</td>
                  <td>Rp. {{ number_format($item->grand_total,0,',','.') }}</td>
                  <td>{{ !empty($item->customer_name) ? $item->customer_name : $item->tokos_name }}</td>
                  <td align="center"><a href="{{ url('send-order/send').'/'.$item->id }}" class="btn btn-primary"><i class="fa fa-truck"></i></a></td>
                </tr>
                @empty
                 <tr>
                   <td colspan="6">Data Not Found</td>
                 </tr> 
                @endforelse
                </tbody>
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
@endsection