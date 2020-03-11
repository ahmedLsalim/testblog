<?php

Route::get('/','postController@index');
Route::get('/posts/create','PostController@create');
Route::post('/posts','PostController@store');
Route::get('/posts/{post}','postController@show');
Route::post('/posts/{post}/comments', 'commentsController@store');
Route::get('/posts/tags/{tag}','TagsController@index');
Auth::routes();

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});
 Route::post('/posts/{post}/delete','PostController@delete');
//Route::get('/', 'homeController@index')->name('home');
Route::post('/deleteComent/{id}' , 'commentsController@delete');
Route::post('/editpost/{id}' , 'PostController@edit');
Route::post('/updatepost/{id}' , 'PostController@update');


Route::name('admin.')->group(function () {
});


Route::get('users', function () {
    // Route assigned name "admin.users"...
})->name('admin.users');
Route::get('users_edits', function () {
    // Route assigned name "admin.users"...
})->name('admin.users_edits');
