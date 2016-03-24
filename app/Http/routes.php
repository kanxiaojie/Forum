<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

//    Route::get('posts/{id}', 'PostsController@show');
    Route::resource('posts', 'PostsController');

    Route::group(['prefix' => 'posts/{id}'], function(){

        Route::resource('comments', 'CommentController');

    });

    Route::auth();
});

