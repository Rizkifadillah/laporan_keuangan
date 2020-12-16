@extends('layouts.master')

@section('content')
<form action="{{url('sumber-pemasukan/add')}}" method="post">
    {{csrf_field()}}
    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Nama Sumber</label>
            <input class="form-control" type="text" name="nama" placeholder="Nama Sumber" id="example-text-input">
        </div>
    </div>
    <div class="form-group">
        <div class="ml-6 mr-6  mt-6 text-right">
            <button type="submit" class="btn btn-secondary">Tambah Sumber</button>
        </div>
    </div>

</form>
@endsection