@extends('layouts/blankLayout')

@section('title', 'Halaman Login')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl" style="background-image: url('../../../../images/IMG-20240709-WA0004.jpg'); background-repeat: no-repeat; background-size: cover;">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo 
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
         /Logo -->
          <h4 class="mb-2 text-center">Selamat Datang Di Sistem Pengaduan Kepuasan Pelayanan Perpustakaan SMPN 1 Pilangkenceng</h4>
          <p class="mb-4 text-center">Login Terlebih Dahulu Untuk Masuk Ke Dalam Sistem</p>
          @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
          <form id="formAuthentication" class="mb-3" action="{{ route('auth-login-dologin') }}" method="POST">
          @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda......." autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
               
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
           
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
          </form>
        <!--
          <p class="text-center">
            <span>Ingin mendaftar?</span>
            <a href="{{url('/siswa/regis-siswa')}}">
              <span>Daftar Akun</span>
            </a>
          </p>
-->
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
