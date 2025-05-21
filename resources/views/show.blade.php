@extends('layouts.app')
@section('content')
@section('title', 'Post Details')
<div class="card mt-4">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->description }}</p>
  </div>
</div>
@endsection