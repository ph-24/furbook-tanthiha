<?php

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
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
	// C1
    // return view('cats/show')->with('number', 10);

    // C2
    // $number = 10;
    // return view('cats/show', compact('number'));

    // C3
    // return view('cats/show', array('number'=>10));

    return redirect('cat');
});

// Display list cats of breed name
Route::get('/cats/breeds/{name}', function ($name) {
    $breed = Furbook\Breed::with('cats')->where('name', $name)->first();
    return view('cats.index')->with('breed', $breed)->with('cats', $breed->cats);
});

// show câu lệnh sql dùng lệnh: DB::enableQueryLog(); ~ show: dd(DB::getQueryLog());

Route::resource('cat', 'CatController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
