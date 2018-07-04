@extends('layouts.app')

@section('content')
<h1>POSTS</h1>


    <div class="card" style="width: 40rem; display:inline-block; height:500px;">
            <img class="card-img-top" src="" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$posts->title}}</h5>
              <hr>
              <p class="card-text">{!!$posts->body!!}</p>
              <hr>
              <p><small>Written on {{$posts->created_at}}</small></p>
              <hr>
            <a href="/lsapp/public/posts/" class="btn btn-dark">Back</a>
            <a href="/lsapp/public/posts/{{$posts->id}}/edit" class="btn btn-warning">Edit</a>

            {!! Form::open(['action'=>['PostsController@destroy',$posts->id], 'method'=>'POST', 'class'=>'float-right']) !!}

                {!! Form::hidden('_method','DELETE') !!}
                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

            {!! Form::close() !!}
            </div>
          </div>
@endsection