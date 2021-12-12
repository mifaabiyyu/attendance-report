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
              <!-- Light table -->
              @foreach ($datalaporan as $row => $data)
              <div class="card">
                @php
                    $dateObj   = DateTime::createFromFormat('!m', $row);
                    $monthName = $dateObj->format('F');
                @endphp
                  <!-- Card header -->
                <div class="card-header border-0">
                  <h1 class="mb-0">Bulan {{ $monthName }}</h1>
                </div>
                <div class="card-header border-0">
                  <h3 class="mb-0">Data Absensi Kerja {{ $monthName }}</h3>
                </div>
                  
                  <div class="table-responsive" data-toggle="list" data-list-values='["name", "budget", "status", "completion"]'>
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="budget">Nama</th>
                          <th scope="col" class="sort" data-sort="budget">Masuk</th>
                          <th scope="col" class="sort" data-sort="completion">Keluar</th>
                        </tr>
                      </thead>
                      @php
                          $newData = $data->unique('masuk');
                      @endphp
                      <tbody class="list">
                        @foreach ($newData as $item)
                        <tr>
                        <td class="budget">
                                {{ $item->name }}
                              </td>
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
                  <div class="card-header border-0 mt-5">
                    <h3 class="mb-0">Data Izin Kerja {{  $monthName }}</h3>
                  </div>
                  <div class="table-responsive" data-toggle="list" data-list-values='["name", "budget", "status", "completion"]'>
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="budget">Nama</th>
                          <th scope="col" class="sort" data-sort="budget">Jenis Izin</th>
                          <th scope="col" class="sort" data-sort="budget">Tanggal Izin</th>
                          <th scope="col" class="sort" data-sort="completion">Status</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @foreach ($newData as $item)
                        <tr>
                          <th scope="row">
                            <div class="media align-items-center">
                              <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $item->name }}</span>
                              </div>
                            </div>
                          </th>
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
                </div>
                @endforeach
                <!-- Card footer -->
            </div>
          </div>
      </div>
</x-app-layout>
