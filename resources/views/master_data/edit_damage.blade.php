@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('update',$rusak->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('forms.kerusakan',['button' => 'save'])
            </form>
        </div>
    </div>
@endsection