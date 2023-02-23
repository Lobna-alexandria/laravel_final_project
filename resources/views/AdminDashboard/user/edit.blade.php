@extends('AdminDashboard.layouts.app')
@section('page_title', 'Edit User')

@section('content')
<form
    action="{{ route('user.update',['user' => $user->id ]) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group ">

            <div class="row px-0">
                {{-- col2 img --}}
                <div class=" col col-md-12 row d-flex align-items-center justify-content-between">

                    <div class=" col col-md-10">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>

                            <input type="text" class="form-control" value="{{ $user->name }}" name="name">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <label class="form-label">Upload Photo</label>
                        <div class="custom-file">

                            <input type="file" onchange="showPreview(event)" name="image" class="custom-file-input"
                                id="customFile">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                    </div>
                    {{-- img --}}
                    <div class=" col col-md-2 p-2 d-flex justify-content-center">
                        <img id="img-preview"
                            src="{{ asset('uploads/users/'. $user->image) }}" width="300"
                            height="300" class=" img-fluid rounded-3" alt="User Photu">

                    </div>

                </div>
                
                    <label>Email address</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email"
                        name="email">

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label>Password</label>
                    <input type="password" class="form-control" value="{{ $user->password }}" placeholder="Password"
                        name="password">

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
               
                {{-- attach role --}}
                <div class="d-flex col-12  justify-contents-between p-3">
                    <label class="px-2">Role : </label>
                    @foreach($allRoless as $role)

                        <div class="d-flex mx-2">
                            <div class="form-check">
                                <input value="{{ $role->name }}" class="form-check-input"
                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                    type="radio" name="user_role">
                                <label class="form-check-label">{{ $role->display_name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- attach  permission --}}
                <div class="d-flex  col-12 p-3">
                    <label class="px-2">Permissions: </label>
                    @foreach($allPermss as $perm)

                        <div class="d-flex mx-2">
                            <div class="form-check">
                                <div class="form-check">
                                    <input value="{{ $perm->name }}" class="form-check-input" type="checkbox"
                                        name="perms[]"
                                        {{ $user->hasPermission($perm->name) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $perm->display_name }}</label>
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

            <a href="{{ route('user.index') }}" class="btn btn-primary">Cancel</a>
        </div>
</form>
@endsection

@section('page_js')
<script>
    function showPreview(event) {
        // alert('yes file is chosen');
        if (event.target.files.length > 0) {
            // alert('yes file name exists');
            let src = URL.createObjectURL(event.target.files[0]);
            // alert(src);
            let preview = document.getElementById('img-preview');
            preview.src = src;
        } else {
            alert('no file chosen');

        }
    }

</script>
@endsection
