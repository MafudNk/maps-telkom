@extends('layout')
@section('content')
<link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        UPDATE ODP
      </h1>
     
    </section><br>
    <div class="container" >
 <div class="box box-info">
            <div class="box-header">
            
              <h3 class="box-title">Input Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
           <form class="form-horizontal" action="{{ url('odp/'.$odp->id) }}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT"></input>
              <div class="box-body">

                    <div class="form-group">
                      <label for="STO" class="col-sm-2 control-label">STO</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="STO" name="STO" placeholder="Input STO"
                          value="{{ $odp->STO}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="PD_NAME" class="col-sm-2 control-label">PD_NAME</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="PD_NAME" name="PD_NAME" placeholder="Input PD_NAME" value="{{ $odp->PD_NAME}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="F_OLT" class="col-sm-2 control-label">F_OLT</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="F_OLT" name="F_OLT" placeholder="Input F_OLT" value="{{ $odp->F_OLT}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="LATITUDE" class="col-sm-2 control-label">LATITUDE</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="LATITUDE" name="LATITUDE" placeholder="Input LATITUDE" value="{{ $odp->LATITUDE}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="LONGITUDE" class="col-sm-2 control-label">LONGITUDE</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="LONGITUDE" name="LONGITUDE" placeholder="Input LONGITUDE" value="{{ $odp->LONGITUDE}}"></input>
                        </div>
                    </div>
 
                    <div class="form-group">
                      <label for="IS_AVAI" class="col-sm-2 control-label">IS_AVAI</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_AVAI" name="IS_AVAI" placeholder="Input IS_AVAI" value="{{ $odp->IS_AVAI}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="IS_BLOCKING" class="col-sm-2 control-label">IS_BLOCKING</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_BLOCKING" name="IS_BLOCKING" placeholder="Input IS_BLOCKING" value="{{ $odp->IS_BLOCKING}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="IS_OTHERS" class="col-sm-2 control-label">IS_OTHERS</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_OTHERS" name="IS_OTHERS" placeholder="Input IS_OTHERS" value="{{ $odp->IS_OTHERS}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="IS_RESERV" class="col-sm-2 control-label">IS_RESERV</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_RESERV" name="IS_RESERV" placeholder="Input IS_RESERV" value="{{ $odp->IS_RESERV}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="IS_SERVICE" class="col-sm-2 control-label">IS_SERVICE</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_SERVICE" name="IS_SERVICE" placeholder="Input IS_SERVICE" value="{{ $odp->IS_SERVICE}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="IS_TOTAL" class="col-sm-2 control-label">IS_TOTAL</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="IS_TOTAL" name="IS_TOTAL" placeholder="Input IS_TOTAL" value="{{ $odp->IS_TOTAL}}"></input>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                      <label for="OCC" class="col-sm-2 control-label">OCC</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="OCC" name="OCC" placeholder="Input OCC" value="{{ $odp->OCC}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="OCC_COLOR" class="col-sm-2 control-label">OCC_COLOR</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="OCC_COLOR" name="OCC_COLOR" placeholder="Input OCC_COLOR" value="{{ $odp->OCC_COLOR}}"></input>
                        </div>
                    </div> -->

                    <div class="form-group">
                      <label for="OLT" class="col-sm-2 control-label">OLT</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="OLT" name="OLT" placeholder="Input OLT" value="{{ $odp->OLT}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="MODUL" class="col-sm-2 control-label">MODUL</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="MODUL" name="MODUL" placeholder="Input MODUL" value="{{ $odp->MODUL}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="MERK_OLT" class="col-sm-2 control-label">MERK_OLT</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="MERK_OLT" name="MERK_OLT" placeholder="Input MERK_OLT" value="{{ $odp->MERK_OLT}}"></input>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="STATUS" class="col-sm-2 control-label">STATUS</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="STATUS" name="STATUS" placeholder="Input STATUS" value="{{ $odp->STATUS}}"></input>
                        </div>
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