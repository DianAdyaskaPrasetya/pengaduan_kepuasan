@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah Data Siswa')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tambah/</span> Data Siswa</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah</h5> <small class="text-muted float-end">Data Siswa</small>
      </div>
      <div class="card-body">
        <form action="{{  route('simpan.siswa') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">NIS</label>
            <div class="col-sm-10">
            <input type="text" maxlength="6" class="form-control" id="nis" name="nis" placeholder="NIS ..."  />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa ..."  />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">kelas</label>
            <div class="col-sm-10">
              <input type="text" maxlength="2" class="form-control" id="kelas" name="kelas" placeholder="Kelas ..." />
            </div>
          </div>       
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Username</label>
            <div class="col-sm-10">
              <input type="text" id="username" class="form-control phone-mask" placeholder="Username ...." aria-label="" aria-describedby="basic-default-phone" name="username"  />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Password</label>
            <div class="col-sm-10">
              <input class="form-control" type="password" id="password" name="password" placeholder="Password ...">
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Basic with Icons -->
  
@endsection
