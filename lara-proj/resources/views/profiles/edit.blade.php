@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
    @method('put')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>
                        Edit Profile
                    </h1>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">Title</label>


                    <input id="title" name="title" type="text" class="form-control " caption="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                    @error('title')
                    
                        <strong style="color:crimson; font-size: 12px">{{ $message }}</strong>
                    
                    @enderror

                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">Description</label>


                    <input id="description" name="description" type="text" class="form-control " caption="description" value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description" autofocus>

                    @error('description')
                    
                        <strong style="color:crimson; font-size: 12px">{{ $message }}</strong>
                    
                    @enderror

                </div>

                <div class="row mb-3">
                    <label for="url" class="col-md-4 col-form-label">URL</label>


                    <input id="url" name="url" type="text" class="form-control " caption="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                    @error('url')
                    
                        <strong style="color:crimson; font-size: 12px">{{ $message }}</strong>
                    
                    @enderror

                </div>
                 

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input class=" form-control-file" type="file" name="image" id="image">

                    @error('image')
                    
                        <strong style="color:crimson; font-size: 12px">{{ $message }}</strong>
                    
                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary btn-width">Save profile</button>
                </div>
            </div>
        </div>
        @csrf
    </form>
</div>
@endsection
