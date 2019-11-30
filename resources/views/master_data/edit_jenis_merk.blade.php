@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data {{ $tipe_merk->type_name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('update',$tipe_merk->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('forms.jenis_merk',['button' => 'save'])
            </form>
        </div>
    </div>
@endsection