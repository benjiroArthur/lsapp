@extends('layouts.app')

@section('content')
<h1>POSTS</h1>

@if(count($posts)>0)
    @foreach($posts as $post)
    
    <div class="card" style="width: 17rem; display:inline-block; height:400px;">
            <img class="card-img-top" src="" alt="Post Image">
            <hr>
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <hr>
              <p class="card-text">{{str_limit($post->body,30)}}</p>
              <hr>
            <small>Written on {{$post->created_at}}</small><br>
            <small>By {{$post->user->name}}</small><br>
            <a href="/lsapp/public/posts/{{$post->id}}" class="btn btn-primary">Show More</a>
            </div>
          </div>
        {{-- <div class="well">
            <h3>{{$post->title}}</h3>
        </div> --}}
    @endforeach
    <br><br>
    <div style="display:-webkit-flex;align-items:center;">{{$posts->links()}}</div>
@else
    <p>No Posts Found</P>
@endif
@endsection