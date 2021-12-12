<x-app-layout >
    <x-slot name="title">Sistem Absensi</x-slot>
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
        <div class="row ">
          <div class="col-xl-4" style="margin: auto">
            <div class="card mb-8">
                <div class="card-pricing border-0 text-center mb-4">
                    <div class="card-header bg-transparent">
                      <h3 class="text-uppercase ls-1 text-primary py-3 mb-0">Absensi Pegawai</h3>
                    </div>
                    <div class="card-body px-lg-5">
                      <div class="display-2">{{ Auth::user()->name }}</div>
                      <span class=" text-muted">
                        @if ($absen != null )
                            @if ($absen->status == 1)
                                Sudah absen masuk
                            @else
                                Absensi Hari ini telah selesai
                            @endif
                        @else
                         Anda Belum Absen
                      @endif</span>
                      <ul class="list-unstyled my-4">
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="icon icon-xs icon-shape bg-gradient-primary text-white shadow rounded-circle">
                                <i class="fas fa-terminal"></i>
                              </div>
                            </div>
                            <div>
                              <span class="pl-2 text-sm">Harap absen masuk sebelum pukul 09:00 WIB</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="icon icon-xs icon-shape bg-gradient-primary text-white shadow rounded-circle">
                                <i class="fas fa-pen-fancy"></i>
                              </div>
                            </div>
                            <div>
                              <span class="pl-2 text-sm">Harap absen keluar setelah jam 17:00 WIB</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        @if ($absen != null )
                            @if ($absen->status == 1)
                              <button type="submit" class="btn btn-warning mb-3">Absen Keluar</button>
                            @else
                              <button type="button" class="btn btn-success mb-3">Selesai</button>
                            @endif
                        @else
                          <button type="submit" class="btn btn-primary mb-3">Absen Masuk</button>
                        @endif
                      </form>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            
            <!-- Light table -->
            @foreach ($dataabsen as $month => $data)
            <div class="card">
                @php
                  $dateObj   = DateTime::createFromFormat('!m', $month);
                  $monthName = $dateObj->format('F');
                @endphp
                <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Data Absensi Kerja Bulan {{ $monthName }}</h3>
              </div>
                
                <div class="table-responsive" data-toggle="list" data-list-values='["name", "budget", "status", "completion"]'>
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="budget">Masuk</th>
                        <th scope="col" class="sort" data-sort="completion">Keluar</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      @foreach ($data as $item)
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">{{ $item->masuk }}</span>
                            </div>
                          </div>
                        </th>
                        <td class="budget">
                          {{ $item->keluar }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @endforeach
              <!-- Card footer -->
          </div>
        </div>
      </div>

</x-app-layout>
