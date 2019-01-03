@extends('master')

@section('content')
<div class="well">
    <h2>{{$category->name}}</h2>
    <p>
         ID: {{$category->id}}
    </p>
    <p>
         Slug: {{$category->slug}}
    </p>
    <p>
         Status: {{$category->status == 1 ? 'Active' : 'Inactive'}}
    </p>
    <p>
         Created at: {{$category->created_at}}
    </p>
    <h3>
        Post under {{$category->name}}
    </h3>
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
              @foreach ($category->posts as $post)
                  <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$post->user->username}}</td>
                    <td>{{$post->status == 1? 'Active' : 'Inactive'}}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
    </table>
    <div>
         <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-block">Edit</a>
    </div>
    <hr>
    <div>
         <form action="{{ route('categories.delete', $category->id) }}" method="post" onsubmit="return confirm('Are you sure to Delete?')">
          @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger btn-block">Delete</button>
         </form>
    </div>
    <hr>
    <p>
      <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block">Back to Category List</a>
    </p>

</div>
@endsection