@extends('layouts.app')
@section('title','Wellcome Page')
@section('content')

@if (!empty(session('sukses')))
  <div class="alert-success"></div>
@endif
@if (!empty(session('error')))
  <div class="alert-errorLogin"></div>
@endif

<div class="login-box">
    <div class="login-logo">
    <img src="{{asset('asset/img/user.jpeg')}}" class="rounded" width="80" height="80" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sistem Letrasi SMAN 4 Kuta Selatan</p>
  
        <form method="POST" action="{{ route('login2') }}">
            @csrf

            @error('username')
            <div class="alert-error"></div>
            @enderror
            
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Enter Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block alert-success">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
       
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
