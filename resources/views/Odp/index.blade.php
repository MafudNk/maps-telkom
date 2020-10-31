@extends('layout')
@section('content')
<link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Table ODP
      </h1>
     
    </section>

  <section class="content">
      <div class="row">
        <div class="col-xs-12">
           @include('_notifikasi')
        <div class="box" >
            <div class="box-header">
              <h3 class="box-title">DATA ODP</h3>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body" style="max-width:99%; overflow:auto; " >
              <table id="example1" class="table table-bordered table-striped" style="overflow:auto; ">

                <thead>
                <tr>
                  <th>No.</th>
                  <th>STO</th>
                  <th>PD_NAME</th>
                  <th>F_OLT</th>
                  <th>LATITUDE</th>
                  <th>LONGITUDE</th>
                  <th>IS_AVAI</th>
                  <th>IS_BLOCKING</th>
                  <th>IS_OTHERS</th>
                  <th>IS_RESERV</th>
                  <th>IS_SERVICE</th>
                  <th>IS_TOTAL</th>
                  <th>OCC</th>
                  <th>OCC_COLOR</th>
                  <th>OLT</th>
                  <th>MODUL</th>
                  <th>MERK_OLT</th>
                  <th>STATUS</th>
                  <th>Aksi</th>
                
                </tr>
                </thead>
               <tbody>
               <?php $no = 1 ?>
                @foreach($odp as $item)
                 <tr>
                   <td>{{ $no++ }}</td>
                   <td>{{ $item->STO }}</td>
                   <td>{{ $item->PD_NAME }}</td>
                   <td>{{ $item->F_OLT }}</td>
                   <td>{{ $item->LATITUDE }}</td>
                   <td>{{ $item->LONGITUDE }}</td>
                   <td>{{ $item->IS_AVAI }}</td>
                   <td>{{ $item->IS_BLOCKING }}</td>
                   <td>{{ $item->IS_OTHERS }}</td>
                   <td>{{ $item->IS_RESERV }}</td>
                   <td>{{ $item->IS_SERVICE }}</td>
                   <td>{{ $item->IS_TOTAL }}</td>
                   <td>{{ $item->OCC }}</td>
                   <td>{{ $item->OCC_COLOR }}</td>
                   <td>{{ $item->OLT }}</td>
                   <td>{{ $item->MODUL }}</td>
                   <td>{{ $item->MERK_OLT }}</td>
                   <td>{{ $item->STATUS }}</td>
                    <td>
                      <a href="{{ url('odp/'.$item->id.'/edit')}}" class="btn btn-info">Edit Data</a> 
                      <a href="{{url('odp/'.$item->id)}}" data-method="delete" data-token={{csrf_token()}} data-confirm="Apakah anda yakin?" type="button" class="btn btn-danger">Hapus Data</a></td>
                 @endforeach
               </tbody>
                
              </table>
           
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
                <form action="{{url('/odp/import')}}" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                  <div class="col-xs-8">
                    <h1>IMPORT EXCEL</h1>
                        <input type="file" class="form-control" id="import_excel" name="import_excel" placeholder="Masukkan Username"></input><br>
                        <button class="btn btn-primary pull-right">Import </button>
                        @if ($errors->has('import_excel'))
                          <span class="help-block errors" style="color: red;">
                            <strong>{{$errors->first('import_excel')}}</strong>
                            </span>
                        @endif
                  </div>
           
                </form>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

</script>
@endsection