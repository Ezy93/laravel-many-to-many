@extends('layouts.app')

@section('title','add-new-post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Posts index</a>
            </div>
        </div>
        <form class="row row-cols-4 g-3 flex-column align-items-center" action="{{ route("admin.posts.store")}}" method="POST">
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
                <label for="img_url">Link dell'immagine:</label>
                <input type="text" name="img_url" id="img_url" class="form-control">
            </div>
            <div class="col">
                <label for="title">Titolo del post:</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="col">
                <label for="author">Autore del post:</label>
                <input type="text" name="author" id="author" class="form-control">
            </div>
            <div class="col">
                <label for="description">Contenuto del post:</label>
                <input type="text" name="description" id="data_immatricolazione" class="form-control">
            </div>

            <div class="col text-center">
                <button type="submit" class="btn btn-primary mb-3">Send</button>
            </div>
        </form>
    </div>
@endsection
