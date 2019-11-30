@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data {{ $price->price }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('update',$price->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('forms.price',['button' => 'save'])
            </form>
        </div>
    </div>
@endsection