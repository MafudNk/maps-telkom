@extends('layout')
@section('content')
<link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        UPDATE USER
      </h1>
     
    </section>

    <!-- Main content -->
<div class="container">
<form class="form-horizontal"  action="{{ url('user/'.$user->id) }}" method="POST">
{{csrf_field()}}
  <input type="hidden" name="_method" value="PUT"></input>
  <div class="form-group has-feedback{{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="namauser" class="col-md-2 control-label">Nama User</label>
    <div class="col-md-8">
      <input type="text" class="form-control"  id="namauser" name="nama" placeholder="Masukkan Nama User" value="{{ $user->name }}">
    </div>
     @if ($errors->has('nama'))
        <span class="help-block errors" style="color: red;">
          <strong>{{$errors->first('nama')}}</strong>
        </span>
        @endif

  </div>
  <div class="form-group has-feedback{{ $errors->has('username') ? 'has-error' : '' }}">
    <label for="namauser" class="col-md-2 control-label">Username</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="namauser" name="username" placeholder="Masukkan Username"
      value="{{ $user->username}}">
    </div>
     @if ($errors->has('username'))
        <span class="help-block errors" style="color: red;">
          <strong>{{$errors->first('username')}}</strong>
        </span>
        @endif

  </div>
   <div class="form-group has-feedback{{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="pass" class="col-md-2 control-label">Password Baru</label>
    <div class="col-md-8">
  <input type="password" class="form-control" id="pass" name="password" placeholder="Masukkan Password Baru">
    </div>
     @if ($errors->has('password'))
        <span class="help-block errors" style="color: red;">
          <strong>{{$errors->first('password')}}</strong>
        </span>
        @endif

  </div>
   <div class="form-group has-feedback{{ $errors->has('repass') ? 'has-error' : '' }}">
    <label for="repass" class="col-md-2 control-label">Re-Password Baru</label>
    <div class="col-md-8">
  <input type="password" class="form-control" id="repass" name="repass" placeholder="Masukkan Re-Password Baru">
    </div>
     @if ($errors->has('repass'))
        <span class="help-block errors" style="color: red;">
          <strong>{{$errors->first('repass')}}</strong>
        </span>
        @endif

  </div>
  <div class="form-group">
       <label class="col-md-2 control-label"><small>Status : </small></label>
       <div class="col-md-8">
       <select name="cbstatus" class="form-control input-sm">
        <option value="">--Pilih Status--</option>
        <option value="2">Admin</option>
        <option value="3">Sales</option>
       </select>
       </div>
    </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">Simpan</button>
    </div>
  </div>
  </form>
  </div>
    <!-- /.content -->
  </div>

@endsection