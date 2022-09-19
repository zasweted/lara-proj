@extends('layouts.app')

@section('content')
<div class="container">
    Show
    <div class="row col-8">
        <img class="w-100" src="/storage/{{ $post->image }}" alt="img">
    </div>
    <div class="col-4">
        <div>
            <h3>{{ $post->user->username }}</h3>

            <p>{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection
