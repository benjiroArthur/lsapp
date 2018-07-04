<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Display all posts

        // return Post::all();
        // $posts = Post::where('id', '2')->get();
        // $posts = DB::select('SELECT * FROM posts');
        
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Load the create post page
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate post fields to ensure none empty fields
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        //Create Post
        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->user_id = auth()->user()->id;
        $posts->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show single post
        $posts = Post::find($id);
        return view('posts.show')->with('posts', $posts);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit single post
        $posts = Post::find($id);
        return view('posts.edit')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validate post fields to ensure none empty fields
         $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        //Update Post
        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete single post
        $posts = Post::find($id);
        $posts->delete();

        return redirect('/posts')->with('success', 'Post Deleted');
    }

 
}
