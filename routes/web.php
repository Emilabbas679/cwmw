<?php



Auth::routes();
Route::post('/site/locale', 'SiteController@locale');
Route::get('/','SiteController@index');
Route::get('/', 'SiteController@index');
Route::get('/index', 'SiteController@index');
Route::get('/about', 'SiteController@about');
Route::get('/contact', 'SiteController@contact');
Route::get('/gallery', 'SiteController@gallery');
Route::get('/blog', 'SiteController@blog');
Route::get('/departments', 'SiteController@departments');
Route::get('/projects', 'SiteController@projects');
Route::get('/blog-post/{id}', 'SiteController@blogPost');
Route::get('/error', 'SiteController@error');

Route::get('/sitemap','SitemapController@index');
Route::get('/xml','SitemapController@index');

Route::get('/admin','AdminController@index');
Route::get("/admin/profile",'AdminController@profile');


Route::resource('/admin/users','UserController');
Route::resource('/admin/gallery','GalleryController');
Route::resource('/admin/message','MessagesController');
Route::resource('/admin/news','NewsController');
Route::resource('/admin/departments','DepartmentsController');
Route::resource('/admin/about','AboutController');


Route::post('/admin/locale','AdminController@locale');
Route::post('/changepass','UserController@changepass');
Route::get('/search','SiteController@search');
Route::post('/message','SiteController@message');
Route::post('/update-unread','MessagesController@update');
Route::post('/update-unread-all','MessagesController@updateall');



