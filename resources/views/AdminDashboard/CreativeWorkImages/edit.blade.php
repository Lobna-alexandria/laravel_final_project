@extends('AdminDashboard.layouts.app')
@section('page_title', 'Edit CreativeWork')

@section('content')
<form
    action="{{ route('CreativeWorkImg.update',['CreativeWorkImg' => $creative_Work_image->id ]) }}"
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
                            <label class="form-label">Description</label>

                            <input type="text" class="form-control" value="{{ $creative_Work_image->desc }}"
                                name="desc">

                            @error('desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div>
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
                <div class=" col col-md-2 p-2 d-flex justify-content-center">
                    <img id="img-preview"
                        src="{{ asset('uploads/crimages/'. $creative_Work_image->image) }}"
                        width="300" height="300" class=" img-fluid rounded-3" alt="User Photu">

                </div>
                </div>
                {{-- img --}}
               
                <div class=" col col-md-10">
                    <!-- <label for="customFile">Custom File</label> -->
                    <div class="mb-3">
                        <label>Main Task</label>

                        <select name="crwork_id" id="" class="form-control w-25">
                            @foreach($works as $work)
                                <option value="{{ $work->id }}">{{ $work->name }}</option>
                            @endforeach
                            {{-- {{dd($work->crwork_id) }} --}}
                            {{-- <option value="{{  $work->crwork_id }}">{{ $work->crwork_id }}
                            </option> --}}
                        </select>

                        @error('crwork_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

            </div>




        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('CreativeWorkImg.index') }}" class="btn btn-primary">Cancel</a>
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
