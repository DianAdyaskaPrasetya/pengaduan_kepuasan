<table border="0" cellspacing="0" cellpadding="5" width="100%">
<tr>
    <th><img src="{{ public_path('images/logo_kabupaten_madiun.png') }}" width="70px" height="70px" /></th>
    <th>
      PEMERINTAH KABUPATEN MADIUN<br>
      DINAS PENDIDIKAN DAN KEBUDAYAAN<br>
      SMP NEGERI 1 PILANGKENCENG<br>
      <small class="text-muted">Jl. Raya Pilangkenceng Telp. (0351) 386560 Email: smp1ssn_pkc@yahoo.co.id</small> <br>
      KAB. M A D I U N
      <div style="text-align:right;">Kode Pos : 63154</div>
     
    </th>
    <th align="center">
      <img src="{{ public_path('images/logo.png') }}" width="70px" height="70px" /> 
    </th>
</tr>
</table>
<hr>
<h3><center>Laporan Data Pengaduan</center></h3>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>#ID</th>
    <th>Tanggal Pengaduan</th>
    <th>Nama Siswa</th>
    <th>Kategori</th>
    <th>Isi Laporan</th>
    <th>Status</th>
  
  </tr>
  @foreach($data_pengaduan as $s) 
  <tr>
    <td>{{$s->id}}</td>
    <td>{{$s->tgl_pengaduan}}</td>
    <td>{{$s->nama }}</td>
    <td>
    @if ($s->kategori == 1)
              Fasilitas
          @elseif ($s->kategori == 2)
              Koleksi Buku
          @elseif ($s->kategori == 3)
              Pelayanan
          @elseif ($s->kategori == 4)
              Lingkungan Belajar    
          @else
              Data Kosong
          @endif
      -
      @if ($s->kategori == 1)
            @if ($s->sub_kategori == 1)
            Ruang Baca
            @elseif ($s->sub_kategori == 2)
            Akses Internet
            @else
            Kebersihan
            @endif
          @elseif ($s->kategori == 2)
            @if ($s->sub_kategori == 1)
            Kelengkapan Koleksi Buku
            @else
            Kondisi Fisik Buku
            @endif
          @elseif ($s->kategori == 3)
            @if ($s->sub_kategori == 1)
            Keramahan Staf Perpustakaan Dalam Melayani
            @else
            Kecepatan Respon Staf Perpustakaan Dalam Merespon Aduan
            @endif
          @elseif ($s->kategori == 4)
            @if ($s->sub_kategori == 1)
            Kebisingan di Dalam Perpustakaan
            @elseif ($s->sub_kategori == 2)
            Pencahayaan di Area Baca Perpustakaan
            @else ($s->sub_kategori == 3)
            Ketersediaan Ruang Untuk Belajar Kelompok Atau Diskusi
            @endif    
          @else
              Data Kosong
          @endif
    </td>
    <td>{{$s->isi_laporan}}</td>
    <td>{{$s->status}}</td>
  </tr>
  @endforeach
</table>
<table style="margin-top: 50px; margin-left:500px;">
  <tr>
    <td>
      <div style="text-align:center;">Kepala Sekolah</div></nbsp></br></br></br></br></br></br>
      <div style="text-align:center;">SUMARJONO, S.Pd M.Pd</div></nbsp>
      <div style="text-align:center;">Pembina Tk. I</div></nbsp>
      <div style="text-align:center;">NIP. 19661210 198903 1 014</div></nbsp>
    </td>
  </tr>
</table>