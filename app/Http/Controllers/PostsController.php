<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function index()
    {
//        $posts = DB::table('posts')->paginate(5);
        $posts = Post::where('id','>', 10)->paginate(10);
//        $posts = Post::all();
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
        flash()->success('Success!', 'Your post have been created!');

        Post::create($request->all());

        return redirect()
               ->route("posts.index");
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
        flash()->success('Success!', 'Your post have been edited successfully!');

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

    public function getUrl(Request $request)
    {
        if(!$request->is('request/*')){
            abort(404);
        }

        $uri = $request->path();
        $url = $request->url();
        $method = $request->method();
        echo $uri.'<br/>';
        echo $url.'<br/>';
        echo $method;
    }

    public function getLastRequest(Request $request)
    {
        $request->flash();
    }

    public function getCurrentRequest(Request $request)
    {
        $lastRequestData = $request->old();
        echo '<pre>';
        print_r($lastRequestData);
    }
}
