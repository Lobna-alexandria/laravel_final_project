@extends('AdminDashboard.layouts.app')
@section('page_title', 'Edit profile')

@section('content')

{{-- route('portfolio.update',['portfolio' => $frontSection1->id])  --}}
 <form action="{{ route('portfolio.update',['portfolio' =>  $frontSection1->id]) }}"
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
                            <label class="form-label">Main title</label>

                            <input type="text" class="form-control" value="{{ $frontSection1->main_title }}"
                                name="main_title">

                            @error('main_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class="mb-3">
                            <label class="form-label"> title</label>

                            <input type="text" class="form-control" value="{{ $frontSection1->title }}"
                                name="title">

                                @error('title')
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
                             src="{{ asset('uploads/profile/'. $frontSection1->image ) }}"
                            width="300"  height="300" class=" img-fluid rounded-3" alt="profile Photu">

                    </div>

                </div>

                

                <label>Button Caption</label>
               <input type="text" class="form-control" value="{{ $frontSection1->btn_name  }}"
                placeholder="Button Caption"
                name="btn_name">

                @error('btn_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label>video link</label>
                <input type="text" class="form-control" value="{{ $frontSection1->video }}"
                placeholder="Button Caption"
                name="video">

                @error('btn_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>

            <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Cancel</a>
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
