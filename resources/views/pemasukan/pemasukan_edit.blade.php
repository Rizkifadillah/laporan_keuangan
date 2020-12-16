@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<form action="{{url('pemasukan/'.$data->pemasukan_id)}}" method="post">
    {{csrf_field()}}
    {{ method_field('put') }}
    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Pilih Summber Pemasukan</label>
            <select class="form-control" name="sumber_pemasukan">
                <option selected="" disabled="">Pilih Sumber Pemasukan</option>
                @foreach($sumber as $sb)
                <option value="{{$sb->id}}" {{ ($data->sumber_pemasukan == $sb->id) ? 'selected' : '' }}>{{ $sb->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Nominal</label>
            <input class="form-control" type="number" value="{{ $data->nominal}}" name="nominal" placeholder="Nominal" id="example-text-input">
        </div>
    </div>

    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" class="form-control-label">Tanggal</label>
            <input class="form-control datepicker" type="text" name="tanggal" value="{{ date('Y-m-d',strtotime($data->tanggal))}}" placeholder="Tanggal" autocomplete="off" id="example-text-input">
        </div>
    </div>

    <div class="form-group" >
        <div class="ml-6 mr-6">
            <label for="example-text-input" >Keterangan</label>
            <textarea class="form-control" value="{{ $data->keterangan}}" name="keterangan" id="" rows="10">{{ $data->keterangan}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="ml-6 mr-6  mt-6 text-right">
            <button type="submit" class="btn btn-secondary">Update Sumber</button>
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