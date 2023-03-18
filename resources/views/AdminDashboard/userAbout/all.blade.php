@extends('AdminDashboard.layouts.app')
@section('page_title','About Me')
    
@section('content')
<div class="card border border-info">
  <div>
    <div class="card-header border border-info">
     
      {{-- @if (Auth::user()->hasPermission('users-create'))
      <a href="{{route('portfolio.create')}}" class="btn bg-olive mx-5">Add Portfolio</a>

      @else@endif --}}
      <button disabled class="btn btn-secondary mx-5">Add About Data</button>
   
    </div>
    <!-- /.card-header -->
    <div class="card-body border ">
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
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Description</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">image</th>
 
              </tr>
        </thead>
        <tbody>
         <tr role="row" class="odd">
          @foreach ($Aboutdata as $dataP)
         

          <td tabindex="0" class="sorting_1">{{$dataP->id}}</td>
          <td>{{$dataP->main_title}}</td>
          <td>{{$dataP->title}}</td>
          
          <td> {{$dataP->desc}} </td>
          
             <td>
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle " style="width:100px; height:100px"
                 src="{{asset('uploads/AboutMe/'. $dataP->image)}}" alt=" profile picture">
              </div>
            </td>
          <td>
            
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
           
             {{-- @if (Auth::user()->hasPermission('users-update')) --}}
            
                 <a href="{{route('Dabout.edit',['Dabout' => $dataP->id ])}}" class="btn bg-olive">Edit  </a>
           
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
        <tr><th class="text-danger" rowspan="1" colspan="2"><h2>About Me Tab :</h2></th></tr>

        <tr><th rowspan="1" colspan="6"><textarea name="editor1" id="editor1" disabled> {{$dataP->editor1}}</textarea>

         
        
         </th></tr>

        @endforeach
       
    </tbody>

        {{-- <tfoot>
        <tr><th rowspan="1" colspan="1">{{$dataP->about}}</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
      
      </tfoot> --}}
      </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
       

         </div></div></div></div></div>
       
    </div>
    <!-- /.card-body -->
  {{-- </div> --}}
{{-- *********************************************************************************************************************** --}}
<h2 class="my-5">Add Multi Images</h2>
  {{--2 upload photos from multi image model--}}
  <div class="card border border-info">
    <div class="card-header border border-info">
     
      {{-- @if (Auth::user()->hasPermission('users-create'))
      <a href="{{route('portfolio.create')}}" class="btn bg-olive mx-5">Add Portfolio</a>

      @else@endif --}}
      <a href="{{route('MultiImage.create')}}" class="btn btn-info mx-5">Add Images Data</a>

      
    
    </div>
    <!-- /.card-header -->
    <div class="card-body border ">
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
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Images</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Control</th>
           
              </tr>
        </thead>
        <tbody>
         <tr role="row" class="odd">
          @foreach ($MultiImg as $dataP)
                    
          <td tabindex="0" class="sorting_1">{{$dataP->id}}</td>
         
             <td>
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle " name="image" style="width:100px; height:100px"
                 src="{{asset('uploads/AboutMe/'. $dataP->image)}}" alt=" profile picture">
              </div>
            </td>
          <td>
            
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
           
             {{-- @if (Auth::user()->hasPermission('users-update')) --}}
            
                 <a href="{{route('MultiImage.edit',['MultiImage' => $dataP->id ])}}" class="btn bg-olive">Edit  </a>
           
            {{-- @else
                 <button disabled class="btn btn-secondary">Edit </button>
            @endif --}}

            @if (Auth::user()->hasPermission('users-delete'))
            <form action="{{route('MultiImage.destroy',['MultiImage'=>$dataP->id])}}" method="POST">
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
  <script>
    window.onload = function() {
        CKEDITOR.replace( 'editor1' );
    };
</script>

@endsection