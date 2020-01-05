@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History Pesanan</h1>
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
                  <td align="center"><a href="{{ url('detail-order').'/'.$item->id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a> <a target="_blank" href="{{ url('detail-order/print').'/'.$item->id }}" class="btn btn-primary"><i class="fa fa-print"></i></a> <a  href="{{ url('hapus-order').'/'.$item->id }}" onclick="return confirm('Apakah anda yakin akan menghapus ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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
          <div class="card">
            <div class="card-header">
              Export Excel
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form class="form-inline" action="{{ route('exportOrder') }}">
                <div class="form-group">
                  <label for="tglawal">Tanggal Awal:</label>
                  <input type="date" class="form-control ml-2" id="tglawal" name="tglawal">
                </div>
                <div class="form-group">
                  <label for="tglakhir" class="control-label ml-3">Tanggal Akhir:</label>
                  <input type="date" class="form-control ml-2" id="tglakhir" name="tglakhir">
                </div>
                <button type="submit" class="btn btn-primary ml-3">Download Excel</button>
              </form>
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