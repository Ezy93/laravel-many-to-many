@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add new post</a>
            </div>
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
            </div>
            <div class="col-12 d-flex flex-wrap gap-5">
                @foreach ($posts as $post)

                    <div class="card">
                        <img src="{{$post->img_url}}" class="card-img-top" alt="{{'immagine di '.$post->title}} ">
                        <div class="card-body">
                            <h3 class="card-title mb-3">{{$post->title}}</h3>
                            <h5 class="card-subtitle mb-3">{{$post->author}}</h5>
                            <p class="card-text">{{$post->description}}</p>

                            @foreach ($post->categories as $category)
                                <div class="badge rounded-pill mb-2 me-1" style="background-color: {{$category->color}}">{{$category->name}}</div>
                            @endforeach

                            <div class="d-flex">
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning me-2">Edit</a>
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger">
                                </form>
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary ms-2">Details</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
