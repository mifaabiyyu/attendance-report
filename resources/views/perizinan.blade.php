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
        <div class="row " >
          <div class="col-xl-6" style="margin: auto">
            <div class="card mb-8">
                <div class="card-pricing border-0 mb-4">
                    <div class="card-header bg-transparent">
                      <h3 class="text-uppercase ls-1 text-center text-primary py-3 mb-0">Ajukan Izin Kerja</h3>
                    </div>
                    <div class="card-body px-lg-5">
                      <form action="{{ route('perizinan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label class="form-control-label">Jenis Izin</label>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="custom-control custom-radio mb-3">
                                <input name="jenis" class="custom-control-input" id="customRadio5" value="sakit" type="radio">
                                <label class="custom-control-label" for="customRadio5">Sakit</label>
                              </div>
                              
                            </div>
                            <div class="col-md-3">
                              <div class="custom-control custom-radio mb-3">
                                <input name="jenis" class="custom-control-input" id="customRadio6" value="izin" type="radio">
                                <label class="custom-control-label" for="customRadio6">Izin</label>
                              </div>
                            </div>
                          </div>
                          @error('jenis')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Tanggal izin</label>
                          <input class="form-control" type="date"  id="datestart" name="datestart" value="{{ old('datestart') }}">
                        </div>
                        @error('datestart')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                          <label class="form-control-label">Deskripsi</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                          <p style="font-size: 12px">* Deskripsi Boleh Kosong</p>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                      </form>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Data Ajuan Ketidak Hadiran Kerja ( {{Auth::user()->name}} )</h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th>Tipe Ajuan</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($izin as $item)    
                    <tr>
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

</x-app-layout>
