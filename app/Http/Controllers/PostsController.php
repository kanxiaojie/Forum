<?php

namespace App\Http\Controllers;

use App\AddPhotoToPost;
use App\Photo;
use App\Post;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        $posts = Cache::get('posts');
//        if(!$posts)
//        {
            $posts = Post::paginate(10);
//            Cache::put('posts',$posts,60*24*7);
//        }

        return view('posts.index',compact('posts'));
    }

    public function active1(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->active1 = $request->input('active1');
        $post->save();

        return back();
    }

    /**
     * @return mixed
     */
    public function show($id)
    {
//        $post = Cache::get('post'.$id);
//        if(!$post)
//        {
            $post = Post::findOrFail($id);
//            Cache::put('post'.$id,$post,60*24*7);
//        }

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
        $inputs = $request->all();
//        Post::create($request->all());
        $post = new Post();
        $post->user_id = $inputs['user_id'];
        $post->title = $inputs['title'];
        $post->subtitle = $inputs['subtitle'];
        $post->content = $inputs['content'];
        $post->save();

        $cacheKey = 'posts';
        $cacheData = Cache::get($cacheKey);
        if(!$cacheData){
            Cache::add($cacheKey,$post,60*24*7);
        }else
        {
            Cache::put($cacheKey,$post,60*24*7);
        }
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

        $cacheKey = 'post'.$post->id;
        $cacheData = Cache::get($cacheKey);
        if(!$cacheData)
        {
            Cache::add($cacheKey,$post,60*24*7);
        }else{
            Cache::put($cacheKey,$post,60*24*7);
        }

        return redirect()
               ->route('posts.index')
               ->withSuccess('You have been edited successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $cacheKey = 'post'.$id;
        $cacheData = Cache::get($cacheKey);
        if($cacheData)
        {
            Cache::forget($cacheData);
        }

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

    /**
     * 显示照片
     * @param $post_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photos($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.photos', compact('post', 'post_id'));
    }

    /**
     * 保存照片
     * @param Request $request
     * @param $post_id
     */
    public function photosStore(Request $request, $post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $photo = $request->file('photo');

        (new AddPhotoToPost($post,$photo))->save();
    }

    public function photosDestroy($id)
    {
        Photo::findOrFail($id)->delete();

        return back();
    }

    public function changePassword()
    {
        return view('auth.changePasswordIndex');
    }

    public function change(Request $request)
    {
        $messages = [
            'min' => '密码至少需要 6 个字符.',
        ];
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ],$messages);

        $user = Auth::user();
        $inputs = Input::all();
        $user->password = bcrypt($inputs['password']);
        $user->save();

        return redirect('/posts');
    }

    public function reset($id)
    {
        $user = User::where('id', $id)->first();
        $user->password = bcrypt('123456');
        $user->save();

        return back();
    }

    public function QrCode($id)
    {
        return view('posts.QrCode',compact('id'));
    }

    /**
     * 自定义500错误
     */
    public function error()
    {
        try{
            error_log('bb');
            $user = 'a';
            $this->dispatch($user);
        }catch (\Exception $exception)
        {
            error_log('aa');
            return view('errors.503');
        }
    }
}
