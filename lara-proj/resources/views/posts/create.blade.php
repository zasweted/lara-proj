@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
    
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>
                        Add New Post
                    </h1>
                </div>
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>


                    <input id="caption" name="caption" type="text" class="form-control " caption="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                    @error('caption')
                    
                        <strong style="color:crimson; font-size: 12px">{{ $message }}</strong>
                    
                    @enderror

                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input class=" form-control-file" type="file" name="image" id="image">

                    @error('image')
                    
                        <strong style="color:crimson; font-size: 12px">{{ $message }}</strong>
                    
                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary btn-width">Add New Post</button>
                </div>
            </div>
        </div>
        @csrf
    </form>
</div>
@endsection
