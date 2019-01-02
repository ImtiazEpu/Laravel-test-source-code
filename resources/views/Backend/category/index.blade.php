@extends('master')

@section('content')
<div class="well">
      <h2>Category List</h2>

        @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif
      <p>
          <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
      </p>
    	<table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Slug</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->status == 1? 'Active' : 'Inactive'}}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
    </table>
{!! $categories->links() !!}
</div>
@endsection