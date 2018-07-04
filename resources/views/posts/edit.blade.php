@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>


   <div class="row">
       <div class="col-md-6 offset-md-3 col-sm-12">
            {!! Form::open(['action' => ['PostsController@update', $posts->id], 'method' => 'POST']) !!}

        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $posts->title,['class'=>'form-control', 'placeholder'=>'Title'])}}
        </div>

        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $posts->body, ['id' => 'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'Body'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <a class="btn btn-danger" href="/lsapp/public/posts">Cancel</a>

    {!! Form::close() !!}
       </div>
   </div>
@endsection