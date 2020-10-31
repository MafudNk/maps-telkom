@extends('layout')
@section('content')
<link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CREATE ODP
      </h1>
     
    </section><br>
    <div class="container" >
 <div class="box box-info">
            <div class="box-header">
            
              <h3 class="box-title">Input Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
           <form class="form-horizontal" action="{{ url('odp') }}" method="post">
                {{csrf_field()}}
              <div class="box-body">

                    <div class="form-group has-feedback{{ $errors->has('STO') ? 'has-error' : '' }}">
                      <label for="STO" class="col-sm-2 control-label">STO</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="STO" name="STO" placeholder="Input STO" value="{{ old('STO')}}"></input>
                        </div>
                                           @if ($errors->has('STO'))
                          <span class="help-block errors" style="color: red;">
                            <strong>{{'Data Harus Diisi'}}</strong>
                          </span>
                          @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('PD_NAME') ? 'has-error' : '' }}">
                      <label for="PD_NAME" class="col-sm-2 control-label">PD_NAME</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="PD_NAME" name="PD_NAME" placeholder="Input PD_NAME" value="{{ old('PD_NAME')}}"></input>
                        </div>
                         @if ($errors->has('PD_NAME'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('F_OLT') ? 'has-error' : '' }}">
                      <label for="F_OLT" class="col-sm-2 control-label">F_OLT</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="F_OLT" name="F_OLT" placeholder="Input F_OLT" value="{{ old('F_OLT')}}"></input>
                        </div>
                         @if ($errors->has('F_OLT'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('LATITUDE') ? 'has-error' : '' }}">
                      <label for="LATITUDE" class="col-sm-2 control-label">LATITUDE</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="LATITUDE" name="LATITUDE" placeholder="Input LATITUDE" value="{{ old('LATITUDE')}}"></input>
                        </div>
                         @if ($errors->has('LATITUDE'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('LONGITUDE') ? 'has-error' : '' }}">
                      <label for="LONGITUDE" class="col-sm-2 control-label">LONGITUDE</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="LONGITUDE" name="LONGITUDE" placeholder="Input LONGITUDE" value="{{ old('LONGITUDE')}}"></input>
                        </div>
                         @if ($errors->has('LONGITUDE'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>
 
                    <div class="form-group has-feedback{{ $errors->has('IS_AVAI') ? 'has-error' : '' }}">
                      <label for="IS_AVAI" class="col-sm-2 control-label">IS_AVAI</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_AVAI" name="IS_AVAI" placeholder="Input IS_AVAI" value="{{ old('IS_AVAI')}}"></input>
                        </div>
                         @if ($errors->has('IS_AVAI'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('IS_BLOCKING') ? 'has-error' : '' }}">
                      <label for="IS_BLOCKING" class="col-sm-2 control-label">IS_BLOCKING</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_BLOCKING" name="IS_BLOCKING" placeholder="Input IS_BLOCKING" value="{{ old('IS_BLOCKING')}}"></input>
                        </div>
                         @if ($errors->has('IS_BLOCKING'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('IS_OTHERS') ? 'has-error' : '' }}">
                      <label for="IS_OTHERS" class="col-sm-2 control-label">IS_OTHERS</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_OTHERS" name="IS_OTHERS" placeholder="Input IS_OTHERS" value="{{ old('IS_OTHERS')}}"></input>
                        </div>
                         @if ($errors->has('IS_OTHERS'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('IS_RESERV') ? 'has-error' : '' }}">
                      <label for="IS_RESERV" class="col-sm-2 control-label">IS_RESERV</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_RESERV" name="IS_RESERV" placeholder="Input IS_RESERV" value="{{ old('IS_RESERV')}}"></input>
                        </div>
                         @if ($errors->has('IS_RESERV'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('IS_SERVICE') ? 'has-error' : '' }}">
                      <label for="IS_SERVICE" class="col-sm-2 control-label">IS_SERVICE</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_SERVICE" name="IS_SERVICE" placeholder="Input IS_SERVICE" value="{{ old('IS_SERVICE')}}"></input>
                        </div>
                         @if ($errors->has('IS_SERVICE'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('IS_TOTAL') ? 'has-error' : '' }}">
                      <label for="IS_TOTAL" class="col-sm-2 control-label">IS_TOTAL</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_TOTAL" name="IS_TOTAL" placeholder="Input IS_TOTAL" value="{{ old('IS_TOTAL')}}"></input>
                        </div>
                         @if ($errors->has('IS_TOTAL'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                <!--     <div class="form-group">
                      <label for="OCC" class="col-sm-2 control-label">OCC</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="OCC" name="OCC" placeholder="Input OCC"></input>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                      <label for="OCC_COLOR" class="col-sm-2 control-label">OCC_COLOR</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="OCC_COLOR" name="OCC_COLOR" placeholder="Input OCC_COLOR"></input>
                        </div>
                    </div> -->

                    <div class="form-group has-feedback{{ $errors->has('OLT') ? 'has-error' : '' }}">
                      <label for="OLT" class="col-sm-2 control-label">OLT</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="OLT" name="OLT" placeholder="Input OLT" value="{{ old('OLT')}}"></input>
                        </div>
                         @if ($errors->has('OLT'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('MODUL') ? 'has-error' : '' }}">
                      <label for="MODUL" class="col-sm-2 control-label">MODUL</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="MODUL" name="MODUL" placeholder="Input MODUL" value="{{ old('MODUL')}}"></input>
                        </div>
                         @if ($errors->has('MODUL'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('MERK_OLT') ? 'has-error' : '' }}">
                      <label for="MERK_OLT" class="col-sm-2 control-label">MERK_OLT</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="MERK_OLT" name="MERK_OLT" placeholder="Input MERK_OLT" value="{{ old('MERK_OLT')}}"></input>
                        </div>
                         @if ($errors->has('MERK_OLT'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group has-feedback{{ $errors->has('STATUS') ? 'has-error' : '' }}">
                      <label for="STATUS" class="col-sm-2 control-label">STATUS</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="STATUS" name="STATUS" placeholder="Input STATUS" value="{{ old('STATUS')}}"></input>
                        </div>
                         @if ($errors->has('STATUS'))
        <span class="help-block errors" style="color: red;">
          <strong>{{'Data Harus Diisi'}}</strong>
        </span>
        @endif

                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">SIMPAN</button>
                      </div>
                    </div>


              </div>
                
               
              <!-- /.box-body -->
          </form>
       
  </div>

</div>
</div>
          @endsection