@extends('AdminDashboard.layouts.app')
@section('page_title', 'Add SocialMedia link & Icon')

@section('content')
<form action="{{ route('ServeMultiIcon.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                {{-- col1 name --}}
                <div class="col col-md-12 d-flex align-items-center">

                    <input type="text" class="form-control" value="{{ old('linkname') }}"
                        placeholder="Enter Link name" name="linkname">

                    @error('linkname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- col2 img --}}
                <div class="col col-md-12 row d-flex align-items-center  justify-content-between">

                    <div class="form-group col col-md-10">
                        <!-- <label for="customFile">Custom File</label> -->

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
                        <img id="img-preview" src="{{ asset('uploads/ServMultiIcons/default.png') }}"
                            class="w-75 img-fluid" alt="">

                    </div>
                </div>
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
