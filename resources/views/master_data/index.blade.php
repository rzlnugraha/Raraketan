@extends('layouts.app')
@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Customer </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modal-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Customer/Toko</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @forelse ($user as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->customer_name }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('edit_customer',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ route('delete_customer',$item->id) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="3"><strong>Data Tidak Ada</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Toko</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modalToko">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Toko</th>
                                <th>Nama Customer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @forelse ($tokos as $toko)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $toko->toko }}</td>
                                <td>{{ $toko->customer_name }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('edit_toko',$toko->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ route('delete_customer',$toko->id) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="4"><strong>Data Tidak Ada</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Harga</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-info btn-sm mb-3" data-toggle="modal" data-target="#modalHarga">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @forelse ($harga as $price)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ 'Rp. '.number_format($price->price,0,',','.') }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('edit_harga',$price->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ url('delete').'/'.$price->id.'/price' }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3"><strong>Data tidak ada</strong></td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Kerusakan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#modalKerusakan">
                        <i style="color:white;" class="fa fa-plus"></i>
                    </a>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @forelse ($damages as $damage)
                            <tr>
                                <td>{{ $no }}</td>
                                <td><img src="{{ asset('images/kerusakan/'.$damage->damage_image) }}" alt="" width="150px" height="100px"></td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('edit_damage',$damage->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ url('delete').'/'.$damage->id.'/damage' }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3"><strong>Data tidak ada</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Merk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-warning btn-sm mb-3" data-toggle="modal" data-target="#modalMerk">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Merk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($merks as $merk)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ ucwords($merk->merk_name) }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('edit_merk',$merk->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ url('delete').'/'.$merk->id.'/merk' }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Jenis Merk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-light btn-sm mb-3" data-toggle="modal" data-target="#modalTipe">
                        <i class="fa fa-plus"></i>
                    </a>
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Merk Raket</th>
                                <th>Tipe Raket</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($types as $type)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $type->merk->merk_name }}</td>
                                <td>{{ $type->type_name }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('edit_jenis_merk',$type->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ url('delete').'/'.$type->id.'/tipe-merk' }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>
</div>
@include('modal.modal')


@endsection