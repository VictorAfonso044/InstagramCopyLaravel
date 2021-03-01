@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit profile</h1>
            </div>
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                    name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
                <input type="text" value="{{ old('description') ?? $user->profile->description }}" class="form-control" name="description" id="description">
                @error('description')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="row">
                <label for="url" class="col-md-4 col-form-label">{{ __('Url') }}</label>
                <input type="text" value="{{ old('url') ?? $user->profile->url }}" class="form-control" name="url" id="url">
                @error('url')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                <input type="file" class="form-control-file" name="image" id="image">
                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pt-4 ">
                <button type="submit" class="btn btn-primary">Save profile</button>
            </div>
        </div>
        </form>
    </div>
@endsection
