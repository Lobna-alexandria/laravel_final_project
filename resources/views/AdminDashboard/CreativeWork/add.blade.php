@extends('AdminDashboard.layouts.app')
@section('page_title', 'Add Creative Work')

@section('content')
<form action="{{ route('CreativeWork.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                {{-- col1 name --}}<label>name</label>
                <div class="col col-md-12 d-flex align-items-center">
                    
                    <input type="text" class="form-control" value="{{ old('name') }}"
                        placeholder="Enter name" name="name">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               
            </div>
            
            <label>Description</label>
            <input type="text" class="form-control" value="{{ old('desc') }}"
                placeholder="Description" name="desc">

            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
           </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('CreativeWork.index') }}" class="btn btn-primary">Cancel</a>
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
