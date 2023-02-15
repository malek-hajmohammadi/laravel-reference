<?php

use Illuminate\Support\Facades\Route;

//I need to Add this use to show Request
use Illuminate\Http\Request;

use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//to show a simple string
Route::get('/malek', function () {
    return 'Hello Malek';
});

// to show a web page which is a view page
Route::get('/o', function () {
    return view('simplepage');
});

//to run a method in a controller
Route::get('/user', [UserController::class, 'index']);

//this route also return http response and header (in safe way return 200)
Route::get('/hello', function () {
    return response('<h1>Hello World</h1>');
});

// we can pass the status number of response number we want
Route::get('/notFound', function () {
    return response('<h1>Sorry; File not fount</h1>', 404);
});

// we can chane the header parameters manually
// and consequently the way of handling this page will be changed
Route::get('/nf', function () {
    return response('<h1>Shgjhorry; File not fount</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('MalekResValue', 'ja');
});

//get the parameter from url
Route::get('/posts/{id}', function ($id) {
    return response('Post: ' . $id);
});

//we can have a filter by a regular expression
Route::get('/postsf/{id}', function ($id) {
    return response('Post: ' . $id);
})->where('id', '[0-9]+');

//having die and dump to show everything about id
Route::get('/postsf2/{id}', function ($id) {
    dd($id);
    return response('Post: ' . $id);
})->where('id', '[0-9]+');

//its for debugging . it freez everything when ddd is called and show some useful information
Route::get('/postsf3/{id}', function ($id) {
    ddd($id);
    return response('Post: ' . $id);
})->where('id', '[0-9]+');

//to see everything about the querystring
//in order to run, I can write /search?name=Malek&...
// I need to add "use ... request add the top
Route::get('/search', function (Request $request) {
    dd($request);
});

Route::get('/search2', function (Request $request) {
    dd($request->name . ' and ' . $request->lastName);
});

Route::get('/search3', function (Request $request) {
    return ($request->name . ' and ' . $request->lastName);
});

//////////////////////

Route::get('/listings', function () {
    return view('listings');
});

// in this code we can pass a variable to the view
/*
 * <php
 * echo $heading
 */
Route::get('/listings-h', function () {
    return view('listings', [
        'heading' => 'Latest Listings'
    ]);
});

/////////////////
Route::get('/listings-a', function () {

    return view('listings2', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum1',


                ],
                [
                    'id' => 2,
                    'title' => 'Listing Two',
                    'description' => 'Lorem ipsum1'

                ]
            ]
        ]);
});

//////////////
///listings-a2 which is rewritten with blade templates
/// And then transfer the listing array to a model which its name is Listing.php
Route::get('/listings-a2', function () {

    return view('listings2b', [
        'heading' => 'Latest Listings',
        'listings' =>Listing::all()
    ]);
});

Route::get('/list-single-Item/{id}', function ($id) {

    return view('listingSingle', [

        'listing' =>Listing::find($id)
    ]);
});


Route::get('/listinglink', function () {

    return view('listings2b-withLink', [

        'listings' =>Listing::all()
    ]);
});
