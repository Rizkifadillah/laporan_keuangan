@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<form action="{{url('cari-laporan')}}" method="get">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6" >
            <div class="ml-6 mr-6">
                <label for="example-text-input" class="form-control-label">Dari</label>
                <input class="form-control datepicker" type="text" name="dari" placeholder="Dari" autocomplete="off" id="example-text-input">
            </div>
        </div>

        <div class="form-group col-md-6" >
            <div class="ml-6 mr-6">
                <label for="example-text-input" class="form-control-label">Sampai</label>
                <input class="form-control datepicker" type="text" name="sampai" placeholder="Sampai" autocomplete="off" id="example-text-input">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="ml-6 mr-6  mt-6 text-right">
            <button type="submit" class="btn btn-secondary">Cari</button>
        </div>
    </div>
</form>

@if(isset($pemasukan))

<div class="row">
        <div class="col">
          <div class="card">

            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Table Sumber Pemasukan</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">#</th>
                    <th scope="col" class="sort" data-sort="budget">Sumber</th>
                    <th scope="col" class="sort" data-sort="budget">Nominal</th>
                    <th scope="col" class="sort" data-sort="budget">Tanggal</th>
                    <th scope="col" class="sort" data-sort="budget">Keterangan</th>
                   
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($pemasukan as $index=>$ps)
                    <tr>
                        <td>{{ $index+1}}</td>
                        <td>{{ $ps->sumber_pemasukan }}</td>
                        <td>Rp.{{ number_format($ps->nominal,0) }}</td>
                        <td>{{ date('d M Y',strtotime($ps->tanggal))}}</td>
                        <td>{{ $ps->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endif

@if(isset($pengeluaran))

<div class="row">
        <div class="col">
          <div class="card">

            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Table Sumber pengeluaran</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">#</th>
                    <th scope="col" class="sort" data-sort="budget">Nominal</th>
                    <th scope="col" class="sort" data-sort="budget">Tanggal</th>
                    <th scope="col" class="sort" data-sort="budget">Keterangan</th>
                   
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($pengeluaran as $index=>$ps)
                    <tr>
                        <td>{{ $index+1}}</td>
                        <td>Rp.{{ number_format($ps->nominal,0) }}</td>
                        <td>{{ date('d M Y',strtotime($ps->tanggal))}}</td>
                        <td>{{ $ps->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endif
@endsection

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $( ".datepicker" ).datepicker();
  })

</script>

@endsection