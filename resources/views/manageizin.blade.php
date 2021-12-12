<x-app-layout >
    <x-slot name="title">Pengajuan Perizinan</x-slot>
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral">New</a>
                <a href="#" class="btn btn-sm btn-neutral">Filters</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Data Ajuan Ketidak Hadiran Kerja Pegawai</h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                        <th>Nama</th>
                        <th>Tipe Ajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($izin as $item)    
                    <tr>
                      <td class="budget">
                        {{ $item->name }}
                      </td>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $item->jenis }}</span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                        {{ $item->datestart }}
                      </td>
                      <td>
                        @if ($item->status == 1)
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i>
                          <span class="status">Pending</span>
                        </span>
                        @elseif ($item->status == 2)
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i>
                          <span class="status">Disetujui</span>
                        </span>
                        @else
                        <span class="badge badge-dot mr-4">
                          <i class="bg-danger"></i>
                          <span class="status">Ditolak</span>
                        </span>
                        @endif
                      </td>
                      <td class="table-actions">
                        <a href="#!" onclick="setujui( {{$item->id_izin}} )" class="table-action" data-toggle="tooltip" data-original-title="Setujui Ajuan">
                          <i class="fas fa-check text-success"></i>
                          <form action="{{ route('manageizin.update', $item->id_izin)}}" id="data-{{ $item->id_izin }}" method="POST">
                            @csrf
                            </form>
                        </a>
                        <a href="#!" onclick="tolak( {{$item->id_izin}} )" class="table-action" data-toggle="tooltip" data-original-title="Tolak Ajuan">
                          <i class="fas fa-times text-danger"></i>
                          <form action="{{ route('manageizin.tolak', $item->id_izin)}}" id="data2-{{ $item->id_izin }}" method="POST">
                            @csrf
                            </form>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- Card footer -->
              <div class="card-footer py-4">
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
          function setujui(id_izin)
            {
                    swal({   
                        title: "Apakah anda yakin ingin Menyetujui ?",   
                        text: "Ajuan akan disetujui",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Setujui!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#data-'+id_izin).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Dibatalkan !','','warning');
                        }
                    }) 

                
            }

          function tolak(id_izin)
            {
                    swal({   
                        title: "Apakah anda yakin ingin Menolak ?",   
                        text: "Ajuan akan ditolak",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Tolak!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#data2-'+id_izin).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Dibatalkan !','','warning');
                        }
                    }) 

                
            }
      </script>
</x-app-layout>
