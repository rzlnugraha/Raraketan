@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data {{ $customer->customer_name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('update',$customer->id) }}" method="post">
                @csrf @method('PUT')
                @include('forms.toko')
            </form>
        </div>
    </div>
@endsection