@extends('layout')
@section('content')
<link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Table User
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           @include('_notifikasi')
        <div class="box">
              <div class="box-header">
                <h3 class="box-title">DATA USER</h3>
              </div>
                <div class="col-md-12">
                  <a href="{{ url('user/create')}}" class="btn btn-primary">Input User</a>
                </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-width:99%; overflow:auto; " >
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1 ?>
                @foreach($user as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->username}}</td>
                  <td>{{ $item->status}}</td>
                  <td>
                      <a href="{{ url('user/'.$item->id.'/edit')}}" class="btn btn-info">Edit User</a> 
                      <a href="{{url('user/'.$item->id)}}" data-method="delete" data-token={{csrf_token()}} data-confirm="Apakah anda yakin?" type="button" class="btn btn-danger">Hapus User</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
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