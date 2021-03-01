@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img style="max-width: 40px" class="rounded-circle w-100"
                            src="/storage/{{ $post->user->profile->image }}" alt="">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <span>
                                <a class="text-dark" href="/profile/{{ $post->user->id }}">
                                    {{ $post->user->username }}
                                </a>
                            </span>
                            <a class="pr-3" href="">Follow</a>
                        </div>
                    </div>
                </div>
                <hr>
                <span class="font-weight-bold">
                    <a class="text-dark" href="/profile/{{ $post->user->id }}">
                        {{ $post->user->username }}
                    </a>
                </span>
                <p>{{ $post->caption }}</p>
            </div>
        </div>
    </div>
@endsection
