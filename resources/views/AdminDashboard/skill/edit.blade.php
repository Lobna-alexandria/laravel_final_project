@extends('AdminDashboard.layouts.app')
@section('page_title', 'Edit Skills')

@section('content')
<form
    action="{{ route('skill.update',['skill' => $skill->id ]) }}"
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

                            <input type="text" class="form-control" value="{{ $skill->name }}" name="name">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                   
                </div>
                
                    <label>Percentage</label>
                    <input type="email" class="form-control" value="{{ $skill->perc }}" placeholder="Enter percentage"
                        name="perc">

                    @error('perc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                  
               
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>

            <a href="{{ route('skill.index') }}" class="btn btn-primary">Cancel</a>
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
