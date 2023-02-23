@extends('AdminDashboard.layouts.app')
@section('page_title', 'Add User')

   @section('content')
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <div class="row">
          {{-- col1 name --}}
          <div class="col col-md-12 d-flex align-items-center">
       
        <input type="text" class="form-control" value="{{old('name')}}" placeholder="Enter name" name="name">
     
      @error('name')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
</div>
{{-- col2 img --}}
<div class="col col-md-12 row d-flex align-items-center  justify-content-between">
     
<div class="form-group col col-md-10">
  <!-- <label for="customFile">Custom File</label> -->

  <div class="custom-file">
    <input type="file" onchange="showPreview(event)" name="image" class="custom-file-input" id="customFile" >
    @error('image')
<div class="alert alert-danger">{{$message}}</div>
@enderror
    <label class="custom-file-label" for="customFile"></label>
  </div>
</div>
{{-- img --}}
<div class=" col col-md-2 p-2 d-flex justify-content-center">
 <img id="img-preview" src="{{asset('uploads/users/default.png')}}" class="w-75 img-fluid" alt="">

</div>
</div>
</div>
        <label >Email address</label>
        <input type="email" class="form-control"  value="{{old('email')}}" placeholder="Enter email" name="email">
      
      @error('email')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
     
        <label >Password</label>
        <input type="password" class="form-control" value="{{old('password')}}" placeholder="Password" name="password">
     
        @error('password')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
{{-- attach role  --}}
<div class="d-flex justify-contents-between p-3">
  <label class="px-2">Role : </label>
    @foreach ($allRoless as $role)
   
   <div class="d-flex mx-2"> 
    <div class="form-check">
      <input  value="{{$role->name}}"  class="form-check-input " {{$role->name =='user' ? 'checked' : ''}} type="radio" name="user_role">
      <label class="form-check-label">{{$role->display_name}}</label>
    </div>
  </div>
    @endforeach
  </div>

  {{-- attach  permission --}}
<div class="d-flex p-3">
  <label class="px-2">Permissions: </label>
    @foreach ($allPermss as $perm)
   
   <div class="d-flex mx-2"> 
    <div class="form-check">
      <div class="form-check">
        <input value="{{$perm->name}}" class="form-check-input" type="checkbox" name="perms[]">
        
        <label class="form-check-label">{{$perm->display_name}}</label>
      </div>
    </div>
  </div>
    @endforeach
  </div>
    </div> 
 </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>

      <a href="{{route('user.index')}}" class="btn btn-primary">Cancel</a>
    </div>
  </form>
@endsection

@section('page_js')
<script>  
function showPreview(event){
  // alert('yes file is chosen');
if(event.target.files.length >0 ){
  // alert('yes file name exists');
  let src=URL.createObjectURL(event.target.files[0]);
  alert(src);
  let preview = documemt.getElementById('img-preview');
  preview.src=src;
}
else{
alert('no file chosen');

}
}
</script>
@endsection