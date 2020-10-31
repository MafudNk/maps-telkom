@extends('layout')
@section('content')
<link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>
<style>
            input,button{
                background: white;
                width: 25%;
                margin: 0 auto;                
            }
            #a{
                display: none;
                background: red;
                border-radius: 5px;
                z-index: 99;
                position: absolute;
                color: white;
                margin-left: -422px; 
                margin-top: 19px; 
                width: 125px; 
                text-align: center

            }
            .a:before{
                position: absolute;
                content: "";
                border-right: 5px solid transparent;
                border-left: 5px solid transparent;
                border-bottom: 9px solid red;   
                bottom: 100%;
                left: 50%;
            }
            .i{
                z-index: 98;
                border: 1px dotted black; 
                position: relative; 
                display: inline-block;               
            }
        </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        INPUT USER
      </h1>
     
    </section>

    <!-- Main content -->
<div class="container">
<form action="{{ url('user') }}" method="post" class="form-horizontal">
      {{csrf_field()}}
  <div class="form-group">
    <label for="namauser" class="col-md-2 control-label">Nama User</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="namauser" name="nama" placeholder="Masukkan Nama User" value="{{ old('nama')}}">
     @if ($errors->has('nama'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Nama Tidak boleh Kosong'}}</strong>
        </span>
        @endif
    </div>

  </div>

  <div class="form-group">
    <label for="namauser" class="col-md-2 control-label">Username</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="namauser" name="username" placeholder="Masukkan Username" value="{{ old('username')}}">
    
     @if ($errors->has('username'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Username Tidak boleh Kosong'}}</strong>
        </span>
        @endif
    </div>
  </div>

  <div class="form-group has-feedback{{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="pass" class="col-md-2 control-label">Password</label>
    <div class="col-md-8">
  <input type="password" class="form-control" id="pass" name="password" placeholder="Masukkan Password" value="{{ old('password')}}">
    
   @if ($errors->has('password'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Password Tidak boleh Kosong'}}</strong>
        </span>
        @endif
        </div>
      </div>
   <div class="form-group has-feedback{{ $errors->has('repass') ? 'has-error' : '' }}">
    <label for="repass" class="col-md-2 control-label">Re-Password</label>
    <div class="col-md-8">
  <input type="password" class="form-control" id="repass" name="repass" placeholder="Masukkan Re-Password">
     @if ($errors->has('repass'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Password Harus Sama'}}</strong>
        </span>
        @endif
         </div>
        </div>
  <div class="form-group">
       <label class="col-md-2 control-label"><small>Status : </small></label>
       <div class="col-md-8">
       <select name="cbstatus" class="form-control input-sm">
        <option value="">--Pilih Status--</option>
        <option value="admin">Admin</option>
        <option value="sales">Sales</option>
       </select>
         @if ($errors->has('cbstatus'))
         <span class="help-block errors" style="color: red;">
          <strong>{{'Status harus dipilih'}}</strong>
        </span>
        @endif
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