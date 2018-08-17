<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Category;
use App\Post;
use App\Settings;

Route::get('/',[
    'uses' => 'FrontController@index',
    'as'=>'index'
    ]);

Auth::routes();

Route::get('/test',function (){

    return App\Profile::find(1)->user;
});



Route::group(['prefix'=>'admin' , 'middleware'=>'auth'],function (){


    Route::get('/home', [

        'uses'=>'HomeController@index',
        'as'=>'home'

    ]);
    Route::get('/post/create',[

        'uses'=>'PostsController@create',
        'as'=>'post.create'

    ]);
    Route::get('/posts',[

        'uses'=>'PostsController@index',
        'as'=>'posts'

    ]);

    Route::post('/post/store',[

        'uses'=>'PostsController@store',
        'as'=>'post.store'

    ]);
    Route::get('/post/delete/{id}',[

        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'

    ]);
    Route::get('/post/edit/{id}',[

        'uses'=>'PostsController@edit',
        'as'=>'post.edit'

    ]);
    Route::get('/post/trash',[

        'uses'=>'postsController@trashed',
        'as'=>'post.trash'

    ]);
    Route::get('/post/kill/{id}',[

        'uses'=>'postsController@kill',
        'as'=>'post.kill'

    ]);

    Route::get('/post/restore/{id}',[

        'uses'=>'postsController@restore',
        'as'=>'post.restore'

    ]);
    Route::post('/post/update/{id}',[

        'uses'=>'PostsController@update',
        'as'=>'post.update'

    ]);

    Route::get('/category/create',[

        'uses'=>'CategoriesController@create',
        'as'=>'category.create'

    ]);

    Route::post('/category/store',[

        'uses'=>'CategoriesController@store',
        'as'=>'category.store'

    ]);

    Route::get('/category/index',[

        'uses'=>'CategoriesController@index',
        'as'=>'categories'

    ]);

    Route::get('/category/edit/{id}',[

        'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'

    ]);
    Route::get('/category/delete/{id}',[

        'uses'=>'CategoriesController@destroy',
        'as'=>'category.delete'

    ]);

    Route::post('/category/update/{id}',[

        'uses'=>'CategoriesController@update',
        'as'=>'category.update'

    ]);

    Route::get('/tags',[
        'uses' => 'TagsController@index',
            'as'=>'tags'
        ]);

    Route::get('/tags/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as'=>'tag.edit'
    ]);

    Route::get('/tags/create',[
        'uses' => 'TagsController@create',
        'as'=>'tag.create'
    ]);

    Route::post('/tags/store',[
        'uses' => 'TagsController@store',
        'as'=>'tag.store'
    ]);

    Route::post('/tags/update/{id}',[
        'uses' => 'TagsController@update',
        'as'=>'tag.update'
    ]);

    Route::get('/tags/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as'=>'tag.delete'
    ]);

    Route::get('/users/index',[

        'uses'=>'UsersController@index',
        'as'=>'users'
    ]);
    Route::get('/users/create',[

        'uses'=>'UsersController@create',
        'as'=>'user.create'
    ]);
    Route::post('/users/store',[

        'uses'=>'UsersController@store',
        'as'=>'user.store'
        ]);

    Route::get('/user/admin/{id}',[
        'uses'=>'UsersController@admin',
        'as'=>'user.admin'
        ]);


    Route::get('/user/not-admin/{id}',[

        'uses'=>'UsersController@notadmin',
        'as'=>'user.not.admin'
    ]);

    Route::get('/user/delete/{id}',[

        'uses'=>'UsersController@destroy',
        'as'=>'user.delete'
    ]);

    Route::get('/user/profile',[

        'uses'=>'ProfileController@index',
        'as'=>'user.profile'
        ]);

    Route::post('/user/profile/update',[

        'uses'=>'ProfileController@update',
        'as'=>'user.profile.update'
    ]);


    Route::get('/settings',[

        'uses'=>'SettingsController@index',
        'as'=>'settings'
    ]);

    Route::post('/settings/update',[

        'uses'=>'SettingsController@update',
        'as'=>'settings.update'
    ]);

    Route::get('/post/{slug}',[

        'uses'=>'FrontController@singlepost',
        'as'=>'post.single_view'
    ]);
    Route::get('/category/{id}',[

        'uses'=>'FrontController@singlecategory',
        'as'=>'category.single'
    ]);

    Route::get('/tag/{id}',[

        'uses'=>'FrontController@singletag',
        'as'=>'tag.single'
    ]);

    Route::get('/results', function (){



        $post = Post::where('title','like','%'.request('query').'%')->get();

        return view('result')->with('posts',$post)
                                    ->with('title','Search Result: '. request('query'))
                                    ->with('settings',Settings::first())
                                    ->with('categories',Category::take(5)->get())
                                    ->with('query',request('query')) ;

    });
});

