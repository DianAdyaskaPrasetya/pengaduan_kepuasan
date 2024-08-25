@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script type="text/javascript">
 /**
 * Dashboard
 */



(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;


  // Order Statistics Chart
  // --------------------------------------------------------------------
  const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
    orderChartConfig = {
      chart: {
        height: 165,
        width: 130,
        type: 'donut'
      },
     
      labels: ['Fasilitas', 'Koleksi Buku', 'Pelayanan', 'Lingkungan Belajar'],
      @forelse ($data_chart as $object)
      series: [{{$object->where('kategori', 1)->count()}}, {{$object->where('kategori', 2)->count()}}, {{$object->where('kategori', 3)->count()}}, {{$object->where('kategori', 4)->count()}}],
      @empty
      @endforelse
      colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
      stroke: {
        width: 5,
        colors: [cardColor]
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: 0,
          bottom: 0,
          right: 15
        }
      },
      states: {
        hover: {
          filter: { type: 'none' }
        },
        active: {
          filter: { type: 'none' }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '75%',
            labels: {
              show: true,
              value: {
                fontSize: '1.5rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val);
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
            
              total: {
                show: true,
                fontSize: '0.8125rem',
                color: axisColor,
                label: 'Fasilitas',
                formatter: function (w) {
                  @forelse ($data_chart as $object)
                  return {{$object->where('kategori', 1)->count()}};
                  @empty
                  @endforelse
                }
              }
             
            }
          }
        }
      }
    };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
    statisticsChart.render();
  }

  

 
})();


 </script>
 <script>
  div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
 </script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
        
            <h5 class="card-title text-dark">Selamat Datang {{ Auth::user()->username }} Di Sistem Pengaduan Kepuasan Pelayanan Perpustakaan SMPN 1 Pilangkenceng! </h5>

          @if (Auth::user()->role == "siswa" )
            <a href="{{  url('pengaduan/tambah-pengaduan') }}" class="btn btn-primary btn-sm">Tambahkan Pengaduan Anda Disin</a>
          @endif
            <!--
            <p class="mb-4">You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in your profile.</p>
            -->
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">
        
          <h5 class="card-title text-dark">Lihat Tanggapan 🖼️</h5>


          @forelse ($data_tanggapan as $data1)
          <?php 
          $foto=$data1->foto;
          ?>
            <div class="responsive">
              <div class="gallery">
              <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#modalCenter{{ $data1->id_pengaduan }}">
              @if ($data1->kategori == 1)
              Fasilitas
          @elseif ($data1->kategori == 2)
              Koleksi Buku
          @elseif ($data1->kategori == 3)
              Pelayanan
          @elseif ($data1->kategori == 4)
              Lingkungan Belajar    
          @else
              Data Kosong
          @endif
          -
          @if ($data1->kategori == 1)
            @if ($data1->sub_kategori == 1)
            Ruang Baca
            @elseif ($data1->sub_kategori == 2)
            Akses Internet
            @else
            Kebersihan
            @endif
          @elseif ($data1->kategori == 2)
            @if ($data1->sub_kategori == 1)
            Kelengkapan Koleksi Buku
            @else
            Kondisi Fisik Buku
            @endif
          @elseif ($data1->kategori == 3)
            @if ($data1->sub_kategori == 1)
            Keramahan Staf Perpustakaan Dalam Melayani
            @else
            Kecepatan Respon Staf Perpustakaan Dalam Merespon Aduan
            @endif
          @elseif ($data1->kategori == 4)
            @if ($data1->sub_kategori == 1)
            Kebisingan di Dalam Perpustakaan
            @elseif ($data1->sub_kategori == 2)
            Pencahayaan di Area Baca Perpustakaan
            @else ($data1->sub_kategori == 3)
            Ketersediaan Ruang Untuk Belajar Kelompok Atau Diskusi
            @endif    
          @else
              Data Kosong
          @endif
                <div class="desc">Tanggapan : {{ $data1->tanggapan }}</div>
              </a> 
              </div>
            </div>
           
            <div class="clearfix"></div>
          <!-- Vertically Centered Modal -->
          <div class="col-lg-4 col-md-6">
                  <div class="mt-3">
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                   
                    
                    <div class="modal fade" id="modalCenter{{ $data1->id_pengaduan }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document" style="--bs-modal-width: 1000px;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Foto Tanggapan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col mb-3">
                              <div style="align:center; margin-left: 200px;">
                              <img src="{{ url('images/tanggapan/'.$foto) }}" alt="Forest" width="600" height="400">
                              </div>
                              <h5 class="modal-title" id="modalCenterTitle">Data Pengaduan</h5>
                              <div class="table-responsive text-nowrap">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Tanggal Pengaduan</th>
                                      <th>Nama</th>
                                      <th>NIS</th>
                                      <th>Isi Laporan</th>
                                      <th>Kategori</th>
                                      <th>Sub Kategori</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0" id="myTable">
                                  <?php 
                                  $no=1;
                                  $data_pengaduan = App\Models\pengaduan::orderBy('id','DESC')->select('pengaduans.id','pengaduans.id_siswa','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','users.nis','users.role','tanggapans.id_pengaduan')
           ->join('users','pengaduans.id_siswa','=','users.id' )->join('tanggapans','pengaduans.id','=','tanggapans.id_pengaduan')->where('pengaduans.id',$data1->id_pengaduan) ->get();
                                  ?>
                                                            @forelse ($data_pengaduan as $data)
                                                            
                                    <tr>
                                      <td>{{ $no++ }}</td>
                                      <td>{{ $data->tgl_pengaduan }}</td>
                                      <td>{{ $data->nama }}</td>
                                      <td>{{ $data->nis }}</td>
                                      <td>{{ $data->isi_laporan }}</td>
                                      <td>
                                      @if ($data->kategori == 1)
                                          Fasilitas
                                      @elseif ($data->kategori == 2)
                                          Koleksi Buku
                                      @elseif ($data->kategori == 3)
                                          Pelayanan
                                      @elseif ($data->kategori == 4)
                                          Lingkungan Belajar    
                                      @else
                                          Data Kosong
                                      @endif
                                      </td>
                                      <td>
                                      @if ($data->kategori == 1)
                                        @if ($data->sub_kategori == 1)
                                        Ruang Baca
                                        @elseif ($data->sub_kategori == 2)
                                        Akses Internet
                                        @else
                                        Kebersihan
                                        @endif
                                      @elseif ($data->kategori == 2)
                                        @if ($data->sub_kategori == 1)
                                        Kelengkapan Koleksi Buku
                                        @else
                                        Kondisi Fisik Buku
                                        @endif
                                      @elseif ($data->kategori == 3)
                                        @if ($data->sub_kategori == 1)
                                        Keramahan Staf Perpustakaan Dalam Melayani
                                        @else
                                        Kecepatan Respon Staf Perpustakaan Dalam Merespon Aduan
                                        @endif
                                      @elseif ($data->kategori == 4)
                                        @if ($data->sub_kategori == 1)
                                        Kebisingan di Dalam Perpustakaan
                                        @elseif ($data->sub_kategori == 2)
                                        Pencahayaan di Area Baca Perpustakaan
                                        @else ($data->sub_kategori == 3)
                                        Ketersediaan Ruang Untuk Belajar Kelompok Atau Diskusi
                                        @endif    
                                      @else
                                          Data Kosong
                                      @endif
                                      </td>
                                      <td>{{ $data->status }}</td>
                                    </tr>
                                    @empty
                                      <td colspan="9" class="align-middle text-center">
                                        <div class="alert alert-danger">
                                          Data belum Tersedia.
                                        </div>
                                      </td>
                                    <?php $no++ ;?>
                                                            
                                  </tbody>
                                  @endforelse
                                </table>
                                
                              


                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </div>
            </div>            
               
                     
          @empty
          
          @endforelse
         
             
          </div>
        </div>
       
      </div>
    </div>

    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">
        
          <h5 class="card-title text-dark">Pojok Diskusi 📖</h5>


          @foreach ($posts as $post)
           @endforeach
          <livewire:comments :model="$post" />
             
          </div>
        </div>
       
      </div>
    </div>
  </div>
 
  <!-- Total Revenue -->

  <!--/ Total Revenue -->
  <!-- Order Statistics -->
 
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4" style="height: 500px;"> 
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Statistik Pengaduan</h5>
          <small class="text-muted"> Total Data</small>
        </div>
        
      </div>
    <div class="card-body">
    
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">  
                                @php
                                     $jumlah_kategori=App\Models\pengaduan::Select('kategori')->count();
                                     
                                @endphp 
            {{$jumlah_kategori}}
            </h2>
            <span>Total</span>
          </div>
          <div id="orderStatisticsChart"></div>
        </div>
        @forelse ($data_chart as $object)
        <ul class="p-0 m-0">
        @if ($object->kategori == 1)
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-home-alt'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
              
                <h6 class="mb-0">Fasilitas</h6>
                
                {{$object->where('kategori', 1)->count()}} Pengaduan    
          
              </div>
              <div class="user-progress">
                <small class="fw-medium">
                 
              </small>
              </div>
            </div>
          </li>
          @elseif ($object->kategori == 2)
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-secondary"><i class='bx bxs-book-content'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
               
                <h6 class="mb-0">Koleksi Buku</h6>
                
                {{$object->where('kategori', 2)->count()}} Pengaduan
             
              </div>
              <div class="user-progress">
                <small class="fw-medium">
                
                </small>
              </div>
            </div>
          </li>
          @elseif ($object->kategori == 3)
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bx-user-voice'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
              
                <h6 class="mb-0">Pelayanan</h6>
                
                {{$object->where('kategori', 3)->count()}} Pengaduan
              
              </div>
              <div class="user-progress">
                <small class="fw-medium">
                
                </small>
              </div>
            </div>
          </li>
          @elseif ($object->kategori == 4)
          <li class="d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded  bg-label-success"><i class='bx bx-pen'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
              
                <h6 class="mb-0">Lingkungan Belajar</h6>
                
                {{$object->where('kategori', 4)->count()}} Pengaduan
                
                
              </div>
              <div class="user-progress">
                <small class="fw-medium">
              
                </small>
              </div>
            </div>
          </li>
          @else
                  Data Kosong
                @endif
        </ul>
        @empty
        @endforelse
      </div>

    </div>
  </div>
  
  <!--/ Order Statistics -->
</div>

@endsection
