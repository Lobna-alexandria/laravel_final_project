@extends('AdminDashboard.layouts.app')
@section('page_title','All Creative Works')
    
@section('content')
<div class="card">
    <div class="card-header">
     
      @if (Auth::user()->hasPermission('users-create'))
      <a href="{{route('CreativeWork.create')}}" class="btn bg-olive mx-5">Add Tasks</a>

      @else
      <button disabled class="btn btn-secondary mx-5">Add Tasks</button>

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
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Description</th>

            

              </tr>
        </thead>
        <tbody>
         <tr role="row" class="odd">
          @foreach ($Alldata as $data)
                    
          <td tabindex="0" class="sorting_1">{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->desc}}</td>
         
            
            
          <td>
            
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
           
             @if (Auth::user()->hasPermission('users-update'))
            
                 <a href="{{route('CreativeWork.edit',['CreativeWork' => $data->id ])}}" class="btn bg-olive">Edit  </a>
           
            @else
                 <button disabled class="btn btn-secondary">Edit </button>
            @endif

            @if (Auth::user()->hasPermission('users-delete'))
            <form action="{{route('CreativeWork.destroy',['CreativeWork'=>$data->id])}}" method="POST">
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
      </table></div></div><div class="row"><nav aria-label="Page navigation example">
        <ul class="pagination">
          {{$Alldata->links()}}  
        </ul>
      </nav><div class="col-sm-12 col-md-5">
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