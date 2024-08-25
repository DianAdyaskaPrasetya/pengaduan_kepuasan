@extends('layouts/contentNavbarLayout')

@section('title', 'View Data - Siswa')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">View Data /</span> Siswa
</h4>

<!-- Basic Bootstrap Table -->

<div class="card">
  
  <h5 class="card-header">Data Siswa</h5>
  <div class="d-grid gap-2 col-4 mx-auto">
  @if (Auth::user()->role == "admin" )
      <a href="{{  url('siswa/tambah-siswa') }}" class="btn btn-primary">Tambah Data Siswa</a>
  @endif
  @if (Auth::user()->role == "admin" )
      <a href="{{route('cetak_siswa')}}" target="_blank" class="btn btn-primary">Cetak Data Siswa</a>
  @endif
    </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          @if (Auth::user()->role == "admin" )
          <th>Menu</th>
          @endif
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="myTable">
      <?php $no=1;?>
                                @forelse ($data_siswa as $data)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $data->nis }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->kelas }}</td>
          @if (Auth::user()->role == "admin" )
          <td>
          <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                
                <a class="dropdown-item" href="{{ route('update_siswa', ['id'=>$data->id] ) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
               
                
                <a class="dropdown-item" href="{{ route('delete_siswa', ['id'=>$data->id] ) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                
              </div>
            </div>
          </td>
          @endif
          
        </tr>
        @empty
          <td colspan="8" class="align-middle text-center">
            <div class="alert alert-danger">
              Data belum Tersedia.
             </div>
          </td>
        <?php $no++ ;?>
                                    @endforelse
      </tbody>
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
