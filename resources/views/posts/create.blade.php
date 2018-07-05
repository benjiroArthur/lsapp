@extends('layouts.app')

@section('content')
<h1>Create Post</h1>


   <div class="row">
       <div class="col-md-6 offset-md-3 col-sm-12">
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '',['class'=>'form-control', 'placeholder'=>'Title'])}}
        </div>

        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '',['id' => 'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'Body'])}}
        </div>

        <div
           class="form-group">
           {{Form::file('cover-image')}}
       </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <a class="btn btn-danger" href="/lsapp/public/posts">Cancel</a>

    {!! Form::close() !!}
       </div>
   </div>
@endsection