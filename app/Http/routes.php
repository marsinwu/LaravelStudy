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


/* This is the home page route */
Route::get('/', function () {
    $data = array(
        'pageTitle' => 'Laravels'
    );
    return view('welcome')->with($data);
});

/* This is the about page*/
Route::get('/about', function () {
    $data = array(
        'pageTitle' => 'About Me'
    );

    return view('about')->with($data);
});

/* This is the contact me page route */
Route::get('/contact', function () {
    $data = array(
        'pageTitle' => 'Contact Me'
    );

    $names = array('Alex', 'Ivanka', 'Borys');

    return view('contact')->with($data)->with('names', $names);
});

/* Route that gets all the posts list*/

/* This is the route for adding new post */
Route::get('/posts', 'PostController@index');

/* Add new post*/
Route::post('/posts', 'PostController@store');

/* Example route of inserting data into db */

Route::get('/posts/new', 'PostController@create');


/* Example of how to get to the post with specific id */

Route::get('/post/{id}', 'PostController@show');

/* Deleting the post */
Route::get('/post/{id}/delete', 'PostController@destroy');

Route::group(['middlewate' => ['web']], function () {


});