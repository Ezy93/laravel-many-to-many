@extends('layouts.app')

@section('title','edit-post')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 mb-3">
			<a href="{{ route('admin.posts.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Post-index</a>
		</div>
	</div>

    <form class="row row-cols-4 g-3 flex-column align-items-center" action="{{ route("admin.posts.update", $post )}}" method="POST">
        @csrf
		@method('PUT')
        <div class="col">
            <h2>
                Edit post
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
            <input type="text" name="img_url" id="img_url" class="form-control" value="{{$post->img_url}}">
		</div>
        <div class="col">
            <label for="title">Titolo del post:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="col">
            <label for="author">Autore del post:</label>
            <input type="text" name="author" id="author" class="form-control" value="{{$post->author}}">
        </div>
        <div class="col">
            <label for="description">Contenuto del post:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{$post->description}}">
        </div>
        <div class="col d-flex">
            <label for="categories">categorie del post:</label>
            @foreach ($post->categories as $key=>$category_post)
            {{-- da modificare il name della select pecrhe cosi mi dice  --}}

                <select name="categoria$key">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if ($post->categories["$key"]->id === $category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            @endforeach
        </div>

        <div class="col text-center">
            <button type="submit" class="btn btn-primary mb-3">Send</button>
        </div>
    </form>
</div>
@endsection

