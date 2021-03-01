@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img width="150px" class="rounded-circle w-100"
                    src="{{ $user->profile->profileImage() }}"
                    alt="">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline pb-4">
                    <div class="d-flex align-items-baseline">
                        <div class="h3">{{ $user->username }}</div>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add new post</a>
                @endcan
                </div>
                @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                @endcan
                <div class="d-flex">
                    <div class="pr-4"><strong>{{ $postsCount }}</strong> posts</div>
                    <div class="pr-4"><strong>{{ $followersCount }}</strong> followers</div>
                    <div class="pr-4"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach ($user->posts as $post)
            <div class="col-4 pb-5">
                <a href="/p/{{ $post->id }}">
                    <img class="w-100"
                        src="/storage/{{ $post->image }}"
                        alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
