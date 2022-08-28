<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select(
            'users.name AS Author',
            'posts.id',
            'posts.name',
            'posts.image',
            'posts.price',
            'posts.qt',
            'posts.content',
            'posts.created_at')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->paginate(3);

        return view('dash.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post_image = "";

        if($request->file('image')) {
            $ext = $request->file('image')->extension();
            $post_image = time() . '.' . $ext;
            $request->file('image')->move(public_path('assets/uploads/post_images/'), $post_image);
        }

        $data = [
            'name' => $request['name'],
            'image' => $post_image,
            'price' => $request['price'],
            'qt' => $request['qt'],
            'content' => $request['content'],
            'user_id' => Auth::user()->id,
        ];

        if(Post::create($data)) {
            return redirect()->route('posts.index')->with('success', 'Post Created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $one_post = Post::select(
            'users.name AS Author',
            'posts.id',
            'posts.name',
            'posts.image',
            'posts.price',
            'posts.qt',
            'posts.content',
            'posts.created_at')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', '=', $post['id'])
            ->get();

        $one_post = json_decode($one_post, true)[0];
        return view('dash.posts.show', ['one_post' => $one_post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $one_post = Post::select(
            'users.name AS Author',
            'posts.id',
            'posts.name',
            'posts.image',
            'posts.price',
            'posts.qt',
            'posts.content',
            'posts.created_at')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', '=', $post['id'])
            ->get();

        $one_post = json_decode($one_post, true)[0];
        return view('dash.posts.edit', ["post" => $one_post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $image = "";

        if ($request->file('image')) {
            $ext = $request->file('image')->extension();
            $image = time() . '.' . $ext;
            $request->file('image')->move(public_path('assets/uploads/post_images/'), $image);
        }

        $data = [
            'name' => $request['name'],
            'image' => $image,
            'price' => $request['price'],
            'qt' => $request['qt'],
            'content' => $request['content'],
        ];

        $update = $post->update($data);

        if ($update) {
            return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $delete = $post->delete();

        if($delete) {
            return redirect()->route('posts.index')->with('success', 'Post deleted');
        }
    }

//    public function allPost() {
//        return Post::all();
//    }
}
