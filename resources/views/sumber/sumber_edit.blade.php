@extends('layouts.master')

@section('content')
<form action="{{url('sumber-pemasukan/'.$data->id)}}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Nama Sumber</label>
            <input class="form-control" type="text" name="nama" placeholder="Nama Sumber" value="{{ $data->nama}}" id="example-text-input">
        </div>
    </div>
    <div class="form-group">
        <div class="ml-6 mr-6  mt-6 text-right">
            <button type="submit" class="btn btn-secondary">Tambah Sumber</button>
        </div>
    </div>

</form>
@endsection