@extends('layouts/blankLayout')

@section('title', 'Register Akun - Masyarakat')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Daftar Akun</h4>
          <p class="mb-4"></p>

          <form class="mb-3" action="{{ route('register.siswa') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label for="nik" class="form-label">NIK</label>
              <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS Anda" required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Anda" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda" required>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <button class="btn btn-primary d-grid w-100" type="submit">
              Sign up
            </button>
          </form>

          <p class="text-center">
            <span>Sudah punya akun?</span>
            <a href="{{url('auth/login-basic')}}">
              <span>Login Disini</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>
@endsection
