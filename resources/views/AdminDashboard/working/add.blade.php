@extends('AdminDashboard.layouts.app')
@section('page_title', 'Add Working Steps')

@section('content')
<form action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                {{-- col1 name --}}
                <div class="col col-md-12 d-flex align-items-center">

                    <input type="text" class="form-control" value="{{ old('title') }}"
                        placeholder="Enter title" name="title">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- col2 img --}}
                <div class="col col-md-12 row d-flex align-items-center  justify-content-between">

                    <div class="form-group col col-md-10">
                        <!-- <label for="customFile">Custom File</label> -->

                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" name="icon" class="custom-file-input"
                                id="customFile">
                            @error('icon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                    </div>
                    {{-- img --}}
                    <div class=" col col-md-2 p-2 d-flex justify-content-center">
                        <img id="img-preview" src="{{ asset('uploads/working/default.png') }}"
                            class="w-75 img-fluid" alt="">

                    </div>
                </div>
            </div>
            <label>Description</label>
            <input type="text" class="form-control" value="{{ old('desc') }}"
                placeholder="Enter Description" name="desc">

            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

           
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('work.index') }}" class="btn btn-primary">Cancel</a>
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
