<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     *
     */
    public function index()
    {
        flash()->overlay("Welcome!", "You've been in successfully");
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * @return mixed
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post','id'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        flash()->success('Success!', 'Your flyer have been created!');

        $post = Post::create($request->all());

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect()
               ->route('posts.index')
               ->withSuccess('You have been edited successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return back();
    }
}
