@extends('layouts.master')

@section('content')
    <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
              <!-- <h6 class="h2 text-white d-inline-block mb-0">Sumber Pemasukan</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{url('pengeluaran/add')}}" class="btn btn-sm btn-neutral">Tambah Pengeluaran</a>
            </div>
          </div>


          <div class="row">
            <div class="col">
              <div class="card">

                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0">Table Pengeluaran</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                  <table id="table-pemasukan" class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">#</th>
                        <th scope="col" class="sort" data-sort="budget">Nominal</th>
                        <th scope="col" class="sort" data-sort="budget">Tanggal</th>
                        <th scope="col" class="sort" data-sort="status">Keterangan</th>
                        <th scope="col" >
                          <center>Action</center>
                        </th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      @foreach($data as $index=>$dt)
                        <tr>
                            <td>{{ $index+1}}</td>
                            <td>Rp.{{ number_format($dt->nominal,0) }}</td>
                            <td>{{ date('d M Y',strtotime($dt->tanggal))}}</td>
                            <td>{{ $dt->keterangan }}</td>

                            <td>
                                <center>
                                <div class="col-lg-6 col-5 text-center">
                                  <a href="{{url('pengeluaran/'.$dt->pengeluaran_id)}}" class="btn btn-sm  btn-info">Edit</a>
                                  <a sumber-id="{{$dt->pengeluaran_id}}"class="btn-hapus btn btn-sm btn-danger" href="{{url('pengeluaran/'.$dt->pengeluaran_id)}}" >Delete</a>
                                </div>
                                </center>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
  
   <!-- btn delete script -->
   <div class="col-md-4">
        <!-- <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">Notification</button> -->
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
              <div class="modal-content bg-gradient-primary ">
                
                  <div class="modal-header">
                      <h6 class="modal-title" id="modal-title-notification">Your attention is delete</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-atom ni-3x"></i>
                          <h4 class="heading mt-4"></h4>
                          <p>Apakah Kamu Yakin Menghapus Data ini?</p>
                      </div>
                      
                  </div>
                  
                  <div class="modal-footer">
                      <form action="" method="post">
                      {{ csrf_field()}}
                      {{ method_field('delete')}}
                        <button type="submit" class="btn btn-white">Ok, Got it</button>
                      </form>
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                  
              </div>
          </div>
      </div>

  </div>

@endsection

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-hapus').click(function(e){
      e.preventDefault();
      var id = $(this).attr('sumber-id');
      var url = "{{url('pengeluaran')}}" +'/'+id;
      $('#modal-notification').find('form').attr('action',url);

      $('#modal-notification').modal();
    })
  })

</script>


@endsection


