@extends('layouts/contentNavbarLayout')

@section('title', 'View Data - Pengaduan Siswa')

@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">View Data /</span> Tanggapan Pengaduan
</h4>

<!-- Basic Bootstrap Table -->

<div class="card">
  <h5 class="card-header">Data Tanggapan Pengaduan</h5>
  <div class="d-grid gap-2 col-4 mx-auto">
  @if (Auth::user()->role == "admin" )
      <a href="{{ route('cetak_tanggapan')}}" class="btn btn-primary">Cetak Data Tanggapan</a>
  @endif
    </div> 
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Tanggapan</th>
          <th>Nama Admin</th>
          <th>Isi Laporan</th>
          <th>Kategori</th>
          <th>Tanggapan</th>
          @if (Auth::user()->role == "admin" )
          <th>Menu</th>
          @endif
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="myTable">
      <?php 
      
      $no=1;
      ?>
                                @forelse ($data_tanggapan as $data)
                                              
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $data->tgl_pengaduan }}</td>
          <td>{{ $data->nama }}</td>
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
          -
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
          <td>{{ $data->tanggapan }}</td>
          @if (Auth::user()->role == "admin" )
          <td>
          <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu"> 
                <a class="dropdown-item" href="{{ route('delete_tanggapan', ['id'=>$data->id] ) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalCenter{{ $data->id }}"><i class="bx bx-objects-horizontal-left me-1"></i> Edit Tanggapan</a>
                <i class=''></i>
              </div>
            </div>
          </td>
          @endif
            <!-- Vertically Centered Modal -->
            <div class="col-lg-4 col-md-6">
                  <div class="mt-3">
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <form action="{{ route('save_update_tanggapan', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    
                    <div class="modal fade" id="modalCenter{{ $data->id }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tanggapan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col mb-3">
                                <input type="text" class="form-control" id="id_admin" name="id_admin" value="{{ Auth::user()->id }}" hidden>
                                <input type="text" class="form-control" id="id_tanggapan" name="id_tanggapan" value="{{ $data->id }}" hidden>
                                <label for="nameWithTitle" class="form-label">Tanggapan Pengaduan</label>
                              
                                <textarea  id="nameWithTitle" class="form-control" placeholder="Tanggapi Pengaduan" name="tanggapan">{{ $data->tanggapan }}</textarea>
                                <label for="nameWithTitle" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="file" name="file" />
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tanggapi</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
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
<!--/ Basic Bootstrap Table -->



<!-- Bootstrap Dark Table -->

<!--/ Bootstrap Dark Table -->



<!-- Bootstrap Table with Header - Dark -->

<!--/ Bootstrap Table with Header Dark -->



<!-- Bootstrap Table with Header - Light -->

<!-- Bootstrap Table with Header - Light -->



<!-- Bootstrap Table with Header - Footer -->

<!-- Bootstrap Table with Header - Footer -->



<!-- Bootstrap Table with Caption -->

<!-- Bootstrap Table with Caption -->



<!-- Striped Rows -->

<!--/ Striped Rows -->



<!-- Bordered Table -->

<!--/ Bordered Table -->



<!-- Borderless Table -->

<!--/ Borderless Table -->



<!-- Hoverable Table rows -->

<!--/ Hoverable Table rows -->


<!-- Small table -->


<!--/ Small table -->



<!-- Contextual Classes -->


<!--/ Contextual Classes -->


<!-- Table within card -->

<!--/ Table within card -->



<!-- Responsive Table -->

<!--/ Responsive Table -->
@endsection
