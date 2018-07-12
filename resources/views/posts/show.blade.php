@extends('layouts.app')

@section('content')
<h1>POSTS</h1>


    <div class="card" style="width: 100%; display:inline-block;">

        <div class="row">
            <div class="col-md-5">
                <img class="card-img" src="{{asset('storage/cover_images/'.$posts->cover_image)}}"  style="width: 80%; height: 300px; margin: 10px">
            </div>

            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title">{{$posts->title}}</h5>
                    <hr>
                    <p class="card-text">{!!$posts->body!!}</p>
                    <hr>
                    <small>Written on {{$posts->created_at}}</small><br>
                    <small>By {{$posts->user->name}}</small>
                    <hr>
                    <a href="{{url('/posts')}}" class="btn btn-dark">Back</a>
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $posts->user_id)
                            <a href="{{url('/posts/'.$posts->id.'/edit')}}" class="btn btn-warning">Edit</a>

                            {!! Form::open(['action'=>['PostsController@destroy',$posts->id], 'method'=>'POST', 'class'=>'float-right']) !!}

                            {!! Form::hidden('_method','DELETE') !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection