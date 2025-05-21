@extends('layouts.app')
@section('content')
@section('title', 'All Posts')
    <div class="text-center">
    <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Add New Post</a>
    </div>
    <table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <td>{{ $post->created_at }}</td>
      <td>
        <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection