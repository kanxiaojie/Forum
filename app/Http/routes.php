<?php

use Illuminate\Http\Response;

Route::get('testResponseDownload', function(){
   return response()->download(
       realpath(base_path('public/images')).'/3.jpg','Laravel.jpg'
   );
});

Route::get('testResponse', function(){
    return response()->json(['name'=>'LaravelAcademy', 'passwrd' => 'Laravel.org'])
        ->setCallback(request()->input('callback'))
        ;
});

Route::get('mail/send', 'MailController@send');

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('auth/github','Auth\AuthController@redirectToProvider');
    Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');


    Route::group(['middleware' => 'auth'], function(){

        Route::get('excel/export', 'ExcelController@export');
        Route::get('excel/import', 'ExcelController@import');

        Route::get('excel/posts/export', 'ExcelController@postsExport');

        Route::get('/', function () {
            return view('welcome');
        });

        Route::resource('posts', 'PostsController');
        Route::get('posts/{post_id}/photos', 'PostsController@photos');
        Route::post('posts/{post_id}/photos/store', ['as' => 'store_photo_path', 'uses' => 'PostsController@photosStore']);
        Route::post('posts/photos/{id}', 'PostsController@photosDestroy');
        Route::post('posts/{id}/active1', 'PostsController@active1');


        Route::get('request/url', 'PostsController@getUrl');
        Route::group(['prefix' => 'posts/{id}'], function(){
            Route::resource('comments', 'CommentController');
        });

        Route::resource('areas', 'AreasController', ['except' => 'show']);

        Route::get('areas/ajaxShow', 'AreasController@ajaxShow');
        Route::post('ajax/province', 'AreasController@province');

        Route::resource('phones', 'PhoneController');

        Route::get('contact', 'ContactController@showForm');
        Route::post('contact', 'ContactController@sendContactInfo');

        Route::group(['namespace' => 'Admin'], function(){

            Route::get('admin/upload', 'UploadController@index');

        });

    });


});

