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
<h3><center>Laporan Data Siswa</center></h3>
<table align="center" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>#ID</th>
    <th>Nama Siswa</th>
    <th>NIS</th>
    <th>Kelas</th>
  
  </tr>
  @foreach($data_siswa as $s) 
  <tr>
    <td>{{$s->id}}</td>
    <td>{{$s->nama}}</td>
    <td>{{$s->nis}}</td>
    <td>{{$s->kelas}}</td>
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