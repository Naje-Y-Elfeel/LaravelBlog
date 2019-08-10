<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Image;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index', 'show']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'ASC')->paginate(5);
        $tags = Tag::all();
        return view('posts.index', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required|min:5',
          'body' => 'required',
          'photo' => 'image|mimes:jpeg,png,jpg'
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $timeStamp = date('YmdHis');
        $post->slug = str_replace(' ', '-', strtolower($post->title)).'-'.$timeStamp;
        $post->user_id = $user->id;

        if ($request->hasFile('photo')) {
          $photo = $request->photo;
          $filename = time().'-'.$photo->getClientOriginalName();
          $location = public_path('images/posts/'.$filename);

          Image::make($photo)->resize(800, 400)->save($location);

          $post->photo = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect('/posts')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
          'title' => 'required|min:5',
          'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect('/posts/'.$post->slug)->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted Successfully');
    }
}
