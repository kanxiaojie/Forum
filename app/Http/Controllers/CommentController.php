<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }

    public function index()
    {
    }

    public function show()
    {

    }

    public function create($id)
    {
        return view('comments.create',compact('id'));
    }

    public function store(CommentRequest $request)
    {
        $comments = Comment::create($request->all());

        return back();
    }

    public function update()
    {

    }
}
