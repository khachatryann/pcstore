<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
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



        return view('dash.store.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
//        $one_post = Post::select(
//            'users.name AS Author',
//            'posts.id',
//            'posts.name',
//            'posts.image',
//            'posts.price',
//            'posts.qt',
//            'posts.content')
//            ->join('users', 'posts.user_id', '=', 'posts.id')
//            ->where('posts.id', '=', $post['id'])
//            ->get();
//
////        $one_post = json_decode($one_post, true);
//        return view('dash.store.show', ['one_post' => $one_post]);


//        return view('dash.store.show', ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
