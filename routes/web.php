<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Auth::routes();
Route::get('login', 'AdminController@login')->name('login');
Route::post('login', 'AdminController@processlogin');
Route::get('admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('', 'AdminController@index')->name('librarian')->middleware('librarian');
Route::get('', 'AdminController@index')->name('student')->middleware('student');

// Route::get('/home', 'HomeController@index')->name('home');
Route::post('submit-edit', 'CategoryController@update')->name('submit-edit');
Route::post('edit_submit', 'BookController@update')->name('edit_submit');
Route::post('submit-edit', 'StudentController@update')->name('submit-edit');


Route::post('issuebook.store', 'IssuebookController@store')->name('issuebook.store');
Route::get('issuebook.create', 'IssuebookController@create')->name('issuebook.create');
Route::post('issuebook.store', 'IssuebookController@store')->name('issuebook.store');
Route::post('issuebook.edit', 'IssuebookController@edit')->name('issuebook.edit');
Route::post('book_issue.destroy', 'IssuebookController@destroy')->name('book_issue.destroy');
Route::post('issuebook.update/{issuebook_id}', 'IssuebookController@update')->name('issuebook.update');
Route::post('issuebook.statusupdate/{issuebook_id}', 'IssueBookController@statusupdate')->name('issuebook.statusupdate');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('books', 'BookController');
    Route::resource('students', 'StudentController');
    Route::resource('issuebooks', 'IssuebookController');
});
