@extends('AdminDashboard.layouts.app')
@section('page_title', 'Add Multiple Images Me')

@section('content')

{{-- route('portfolio.update',['portfolio' => $userAbout->id])  --}}
{{-- {{route('Dabout.edit',['Dabout' => $dataP->id ])}} --}}
 <form action="{{ route('MultiImage.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="card-body">
        <div class="form-group ">

            <div class="row px-0">
                {{-- col2 img --}}
                <div class=" col col-md-12 row d-flex align-items-center justify-content-between">

                    <div class=" col col-md-10">
                       
                      

                        <label class="form-label">Upload Photo</label>
                        <div class="custom-file">

                            <input type="file" onchange="showPreview(event)" name="image[]" class="custom-file-input"
                                id="customFile" multiple>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                    </div>
                    {{-- img --}}
                    <div class=" col col-md-2 p-2 d-flex justify-content-center">
                        <img id="img-preview"
                             src="{{ asset('uploads/AboutMe/default.png') }}"
                            width="300"  height="300" class=" img-fluid rounded-3" alt="profile Photu">

                    </div>

                </div>

                

                            

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>

            <a href="{{ route('Dabout.index') }}" class="btn btn-primary">Cancel</a>
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
