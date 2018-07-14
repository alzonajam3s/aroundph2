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

Route::get('/', 'BlogsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');

//keep trashed routes here
Route::get('/blogs/trash','BlogsController@trash')->name('blogs.trash');
Route::get('/blogs/trash/{id}/restore','BlogsController@restore')->name('blogs.restore');
Route::delete('/blogs/trash/{id}/permanent-delete','BlogsController@permanentDelete')->name('blogs.permanent-delete');


Route::get('/blogs/{id}', 'BlogsController@show')->name('blogs.show');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::patch('/blogs/{id}/update', 'BlogsController@update')->name('blogs.update');
Route::patch('/blogs/{id}/updatedraft', 'BlogsController@updatedraft')->name('blogs.updatedraft');
Route::patch('/blogs/{id}/publishedupdate', 'BlogsController@publishedupdate')->name('blogs.publishedupdate');
Route::delete('/blogs/{id}/delete', 'BlogsController@delete')->name('blogs.delete');

Route::get('/dashboard' , 'AdminController@index')->name('dashboard');
Route::get('/admin/blogs' , 'AdminController@blogs')->name('admin.blogs');

Route::resource('/categories' , 'CategoryController');


Route::resource('/users' , 'UserController');

Route::get('contact' , 'MailController@contact')->name('contact');
Route::post('contact/send' , 'MailController@send')->name('mail.send');


Route::get('/userprofile/{id}' , 'PagesController@userprofile')->name('pages.userprofile');
Route::get('/userprofile/{id}/editprofile' , 'PagesController@editprofile')->name('pages.editprofile');
Route::patch('/userprofile/{id}/updateprofile' , 'PagesController@updateprofile')->name('pages.updateprofile');
Route::delete('/userprofile/{id}/deleteprofile' , 'PagesController@deleteprofile')->name('pages.deleteprofile');

Route::get('/myblogs/{name}' , 'PagesController@myblogs')->name('pages.myblogs');
Route::get('/catlist' , 'PagesController@catlist')->name('pages.catlist');
Route::get('/aboutme' , 'PagesController@aboutme')->name('pages.aboutme');
// Route::get('/newslist' , 'PagesController@newslist')->name('pages.newslist');

Route::resource('/carousel' , 'CarouselController');

Route::resource('/news' , 'NewsController');
Route::get('/newslist' , 'NewsController@list')->name('news.list');

Route::get('search', 'SearchController@index')->name('pages.search');

Route::resource('/articles' , 'ArticlesController');
Route::get('/articleslist' , 'ArticlesController@list')->name('articles.list');
