@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="badge rounded-pill mb-3" style="background-color: {{$category->color}}">{{$category->name}}</h3>
                        <div class="d-flex">
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning me-2">Edit</a>
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
