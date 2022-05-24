@extends('layouts.app')

@section('title','add-new-post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Posts index</a>
            </div>
        </div>
        <form class="row row-cols-4 g-3 flex-column align-items-center" action="{{ route("admin.categories.store")}}" method="POST">
            @csrf
            <div class="col">
                <h2>
                    Create new post
                </h2>
                @if ( $errors->any() )
                <ul class="alert alert-danger">
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col">
                <label for="name">name categoria:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="col">
                <label for="color" class="form-label">Color picker</label>
                <input type="color" class="form-control form-control-color" id="color" value="#00000" title="seleziona il colore della categoria">
            </div>

            <div class="col text-center">
                <button type="submit" class="btn btn-primary mb-3">Send</button>
            </div>
        </form>
    </div>
@endsection
