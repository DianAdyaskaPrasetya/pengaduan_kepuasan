@extends('layouts/contentNavbarLayout')

@section('title', ' Edit Data Pengaduan')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Edit/</span> Data Pengaduan</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Ubah</h5> <small class="text-muted float-end">Data Pengaduan</small>
      </div>
      <div class="card-body">
        <form action="{{  route('save_update_pengaduan', ['id' => $data_pengaduan->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Pengaduan</label>
            <div class="col-sm-10">
              <input type="input" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" placeholder="dd-mm-yyyy" value="{{ $data_pengaduan->tgl_pengaduan }}" readonly />
            </div>
          </div>
          <input type="text" class="form-control" id="id_siswa" name="id_siswa" placeholder="id" value="{{ Auth::user()->id }}" / hidden>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" placeholder="Nama ...." value="{{ $data_pengaduan->nama }}" readonly/>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">NIS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nis" name="nis" value="{{ $data_pengaduan->nis }}" readonly />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Kategori Laporan</label>
            <div class="col-sm-10">
            <select class="form-select" id="kategori" name="kategori" aria-label="Default select example" onchange="SubKategori()">
              <option value="0" selected>Pilih Kategori Pengaduan</option>
              <option id="1" value="1">Fasilitas</option>
              <option id="2" value="2">Koleksi Buku</option>
              <option id="3" value="3">Pelayanan</option>
              <option id="4" value="4">Lingkungan Belajar</option>
            </select>
            </div>
            <label class="col-sm-2 col-form-label" for="basic-default-message"></label>
            <div class="col-sm-10">
            <select class="form-select" id="sub_kategori" name="sub_kategori" aria-label="Default select example">
              <option selected>-- Sub Kategori --</option>
              
            </select>
            </div>
            <script>
              
              //Pilih Kategori
              var pilihan_kategori = {};
              pilihan_kategori['1'] = ['Ruang Baca', 'Akses Internet', 'Kebersihan'];
              pilihan_kategori['2'] = ['Kelengkapan Koleksi Buku', 'Kondisi Fisik Buku'];
              pilihan_kategori['3'] = ['Keramahan Staf Perpustakaan Dalam Melayani', 'Kecepatan Respon Staf Perpustakaan Dalam Merespon Adun'];
              pilihan_kategori['4'] = ['Kebisingan di Dalam Perpustakaan', 'Pencahayaan di Area Baca Perpustakaan', 'Ketersediaan Ruang Untuk Belajar Kelompok Atau Diskusi'];

              function SubKategori() {
  
                
                var main_kategori = document.getElementById("kategori");
                var sub_kategori = document.getElementById("sub_kategori");
                var pilih_sub_kategori = main_kategori.options[main_kategori.selectedIndex].value;
                while (sub_kategori.options.length) {
                  sub_kategori.remove(0);
                }
                var pilih = pilihan_kategori[pilih_sub_kategori];
                if (pilih) {
                  var i;
                  for (i = 0; i < pilih.length; i++) {
                    var pilihan = new Option(pilih[i], i);
                    sub_kategori.options.add(pilihan);
                  }
                }
              } 
            </script>

          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Isi Laporan</label>
            <div class="col-sm-10">
              <textarea id="basic-default-message" class="form-control" placeholder="Tuliskan Laporan Anda Disini" aria-label="Tuliskan Laporan Anda Disini" aria-describedby="basic-icon-default-message2" name="isi_laporan" id="isi_laporan">{{ $data_pengaduan->isi_laporan }}</textarea>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Basic with Icons -->
  
@endsection
