@extends('AdminDashboard.layouts.app')
@section('page_title','All Portfolios')
    
@section('content')
<div class="card">
    <div class="card-header">
     
      @if (Auth::user()->hasPermission('users-create'))
      <a href="{{route('portfolio.create')}}" class="btn bg-olive mx-5">Add Portfolio</a>

      @else
      <button disabled class="btn btn-secondary mx-5">Add Portfolio</button>

      @endif
    
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
          <div class="col-sm-12 col-md-6">
               <div class="dataTables_length" id="example1_length">
           
            </div></div><div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter">
                  </div></div>
                   
                    </div>
                    <div class="row"><div class="col-sm-12"> 
       
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
        <tr role="row">
            
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Main Title</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Title</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ButtonCaption</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">video </th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">image</th>
 
              </tr>
        </thead>
        <tbody>
         <tr role="row" class="odd">
          @foreach ($AlldataP as $dataP)
                    
          <td tabindex="0" class="sorting_1">{{$dataP->id}}</td>
          <td>{{$dataP->main_title}}</td>
          <td>{{$dataP->title}}</td>
          <td> {{$dataP->btn_name}} </td>
          <td> <a href="{{$dataP->video}}" class="nav-link">{{$dataP->video}}</a> </td>
             <td>
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle " style="width:100px; height:100px"
                 src="{{asset('uploads/profile/'. $dataP->image)}}" alt=" profile picture">
              </div>
            </td>
          <td>
            
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
           
             {{-- @if (Auth::user()->hasPermission('users-update')) --}}
            
                 <a href="{{route('portfolio.edit',['portfolio' => $dataP->id ])}}" class="btn bg-olive">Edit  </a>
           
            {{-- @else
                 <button disabled class="btn btn-secondary">Edit </button>
            @endif --}}

            @if (Auth::user()->hasPermission('users-delete'))
            <form action="{{route('portfolio.destroy',['portfolio'=>$dataP->id])}}" method="POST">
              @csrf
              @method('DELETE')
             <button class="btn bg-danger">Delete </button>

            </form>
            @else
            <button disabled class="btn btn-secondary">Delete </button>
            @endif

          </div></td>
        </tr>
        @endforeach
       
    </tbody>
        {{-- <tfoot>
        <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
        </tfoot> --}}
      </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
         </div></div></div></div></div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

@section('page_style')
     <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 
@endsection

@section('page_js')
    <!-- DataTables -->
<script src="{{asset('AdminDashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminDashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminDashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminDashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });
    });
  </script>
@endsection