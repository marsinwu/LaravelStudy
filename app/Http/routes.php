<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;

/* This is the home page route that goes to the home page */
Route::get('/', function () {
    /*Array with the data that will be passed to the view */
    $data = array(
        'pageTitle' => 'Laravels'
    );
    return view('welcome')->with($data);
});

/* This is the about page */
Route::get('/about', function () {
    /*Array with the data that will be passed to the view */
    $data = array(
        'pageTitle' => 'About Me'
    );

    return view('about')->with($data);
});

/* This is the contact me page route */
Route::get('/contact', function () {
    /*Array with the data that will be passed to the view */
    $data = array(
        'pageTitle' => 'Contact Me'
    );

    $names = array('Alex', 'Ivanka', 'Borys');

    return view('contact')->with($data)->with('names', $names);
});


/*GET This is the route for adding new post that goes to the controller (shows the form)*/
Route::get('/posts', 'PostController@index');

/*POST Add new post, this is where the data is actually written to the database */
Route::post('/posts', 'PostController@store');

/* Example route of inserting data into db */
Route::get('/posts/new', 'PostController@create');

/* Example of how to get to the post with specific id */
Route::get('/post/{id}', 'PostController@show');

/* Deleting the post */
Route::get('/post/{id}/delete', 'PostController@destroy');

/* Deleting the post from sandbox */
Route::get('/post/{id}/permdelete', 'PostController@destroySandbox');

/* Soft deleting the post */
Route::get('/post/{id}/softdelete', 'PostController@softdestroy');

/* Demo route */
Route::get('/find', function () {
    $posts = Post::all();
});

/* Functionality to restore item from the sandbox */
Route::get('/post/{id}/restore', 'PostController@removeFromTrashAndAddToTheGeneralList');


Route::group(['middlewate' => ['web']], function () {


});