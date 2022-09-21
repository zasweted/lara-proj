@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
        <div class="col-8 offset-2">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="img">
        </div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                        <img style="max-width:40px" class="w-100 rounded-circle" src="{{ $post->user->profile->profileImage() }}" alt="logo">
                    </div>
                    <div class="ps-3">
                        <div class="fw-bold text-decoration-none">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark text-decoration-none">{{ $post->user->username }} </span>
                            </a>
                            <a href="#" class="px-3 text-decoration-none">Follow</a>
                        </div>
                    </div>
                </div>
                <hr>

                <p><span class="fw-bold">
                <a href=" /profile/{{ $post->user->id }}"><span class="text-dark text-decoration-none px-3">{{ $post->user->username }} </span></a>
                    </span>{{ $post->caption }}
                </p>
            </div>
        </div>

    </div>
    @endforeach
</div>
@endsection
