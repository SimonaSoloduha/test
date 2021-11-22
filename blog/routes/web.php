<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController');
});

Route::get('blog_add', function () {
    return view('blog_add');
})->name('blog-add');

Route::post('blog_add/submit',
    'BlogController@submit'
)->name('blog-add-submit');

Route::get('blog_all/',
    'BlogController@blogAll'
)->name('blog-all');

//Route::get('blog_all/', [BlogController::class, 'blogAll'])
//    ->name('blog-all');


Route::get('blog_all/{id}',
    'BlogController@showOne',
)->name('blog-one');

Route::post('blog_all/{id}',
    'CommentController@add'
)->name('blog-comment');

Route::get('blog_all/{id}/update',
    'BlogController@updateOne'
)->name('blog-update');

Route::post('blog_all/{id}/update',
    'BlogController@updateOneSubmit'
)->name('blog-update-submit');
