@extends('layouts/contentNavbarLayout')

@section('title', ' Edit Data Siswa')

@section('content')
@if (Auth::user()->role == "admin" )
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Edit/</span> Data Admin</h4>
@elseif (Auth::user()->role == "siswa" )
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Edit/</span> Data Siswa</h4>
@endif
<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
      @if (Auth::user()->role == "admin" )
        <h5 class="mb-0">Ubah</h5> <small class="text-muted float-end">Data Admin</small>
      @elseif (Auth::user()->role == "siswa" )
      <h5 class="mb-0">Ubah</h5> <small class="text-muted float-end">Data Siswa</small>
      @endif
      </div>
      <div class="card-body">
        <form action="{{  route('save_update_siswa', ['id' => $data_siswa->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @if (Auth::user()->role == "siswa" )
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">NIS</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nis" name="nis" placeholder="nis" value="{{ $data_siswa->nis }}" />
            </div>
          </div>
        @elseif (Auth::user()->role == "admin" )
        <input type="text" class="form-control" id="nis" name="nis" placeholder="nis" value="{{ $data_siswa->nis }}" hidden/>
        @endif
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ $data_siswa->nama }}" />
            </div>
          </div>
          @if (Auth::user()->role == "siswa" )
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">kelas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data_siswa->kelas }}" />
            </div>
          </div>
          @elseif (Auth::user()->role == "admin" )
          <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data_siswa->kelas }}" hidden/>
          @endif       
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Username</label>
            <div class="col-sm-10">
              <input type="text" id="username" class="form-control phone-mask" placeholder="" aria-label="" aria-describedby="basic-default-phone" name="username" value="{{ $data_siswa->username }}" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Password</label>
            <div class="col-sm-10">
              <input class="form-control" type="password" id="password" name="password" placeholder="Password">
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
