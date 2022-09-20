@extends('layouts.app')

@section('content')
<div class="container">
    Show
    <div class="row">
        <div class="col-8">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="img">
        </div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                        <img style="max-width:40px" class="w-100 rounded-circle" src="/storage/{{ $post->user->profile->image }}" alt="logo">
                    </div>
                    <div class="ps-3">
                        <div class="fw-bold">
                        <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->username }}</span></a></div>
                    </div>
                </div>
                <hr>

                <p><span class="fw-bold"><a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a></span>{{ $post->caption }}</p>
            </div>
        </div>

    </div>
</div>
@endsection
