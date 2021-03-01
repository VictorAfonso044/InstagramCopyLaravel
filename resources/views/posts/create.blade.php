@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Add new post</h1>
            </div>
            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label">{{ __('Post caption') }}</label>
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                    name="caption" autocomplete="caption" >
                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
                <input type="file" class="form-control-file" name="image" id="image">
                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pt-4 ">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
        </form>
    </div>
    </div>
@endsection
