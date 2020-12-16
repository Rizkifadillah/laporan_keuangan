@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<form action="{{url('pengeluaran/add')}}" method="post">
    {{csrf_field()}}
    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Nominal</label>
            <input class="form-control" type="number" name="nominal" placeholder="Nominal" id="example-text-input">
        </div>
    </div>

    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Tanggal</label>
            <input class="form-control datepicker" type="text" name="tanggal" placeholder="Tanggal" autocomplete="off" id="example-text-input">
        </div>
    </div>

    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" >Keterangan</label>
            <textarea class="form-control" name="keterangan" id="" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="ml-6 mr-6  mt-6 text-right">
            <button type="submit" class="btn btn-secondary">Tambah Sumber</button>
        </div>
    </div>

</form>
@endsection

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $( ".datepicker" ).datepicker();
  })

</script>

@endsection