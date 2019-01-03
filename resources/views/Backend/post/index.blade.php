@extends('master')

@section('content')
<div class="well">
      <h2>Post List</h2>

        @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif
      <p>
          <a href="{{ route('posts.create') }}" class="btn btn-success">Add Category</a>
      </p>
    	<table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Post Title</th>
              <th scope="col">Category</th>
              <th scope="col">Author</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
                  <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->user->username}}</td>
                    <td>{{$post->status == 1? 'Active' : 'Inactive'}}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
    </table>
{!! $posts->links() !!}
</div>
@endsection