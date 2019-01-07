@extends('master')

@section('content')
	<div class="well">
    	<h2>Add Post</h2>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @if($errors->count() === 1)
                    {{ $errors->first() }}
                @else
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif

        <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
        </div>
        <div class="form-group">
            <label for="">Post Content</label>
            <textarea class="form-control" name="content"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control">
            	<option value="1">Active</option>
            	<option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add Post</button>
    </form>
    <hr>
    <p>
    	<a href="{{ route('posts.index') }}" class="btn btn-primary btn-block">Back to Posts List</a>
    </p>
	</div>
@endsection
