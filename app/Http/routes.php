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

Route::get('/SML', 'PublicController@sml');

Route::get('/', 'PublicController@sml');
Route::get('/Jubiläum', 'PublicController@celebration');
Route::get('/Agenda', 'PublicController@agenda');

Route::get('/Kontakt', 'PublicController@contact');
Route::post('/Kontakt', 'PublicController@contactSave');

Route::get('/Portrait', 'PublicController@portrait');
Route::get('/News', 'PublicController@news');
Route::get('/Intern', 'PublicController@intern')->middleware('auth');

Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::get('/admin/index', 'AdminController@index')->middleware('admin');

Route::get('/admin/navigation', 'NavigationController@index')->middleware('admin');
Route::get('/admin/navigation/index', 'NavigationController@index')->middleware('admin');
Route::get('/admin/navigation/orderUp/{nav}', 'NavigationController@orderUp')->middleware('admin');
Route::get('/admin/navigation/orderDown/{nav}', 'NavigationController@orderDown')->middleware('admin');

Route::get('/admin/home', 'AdminHomeController@index')->middleware('admin');
Route::get('/admin/home/index', 'AdminHomeController@index')->middleware('admin');
Route::post('/admin/home/index', 'AdminHomeController@indexSave')->middleware('admin');

Route::get('/admin/celebration', 'CelebrationController@index')->middleware('admin');
Route::get('/admin/celebration/index', 'CelebrationController@index')->middleware('admin');
Route::post('/admin/celebration/index', 'CelebrationController@indexSave')->middleware('admin');

Route::get('/admin/agenda', 'AgendaController@index')->middleware('admin');
Route::get('/admin/agenda/index', 'AgendaController@index')->middleware('admin');
Route::get('/admin/agenda/index/{id}', 'AgendaController@index')->middleware('admin');
Route::get('/admin/agenda/create', 'AgendaController@create')->middleware('admin');
Route::post('/admin/agenda/create', 'AgendaController@createSave')->middleware('admin');
Route::get('/admin/agenda/edit/{agenda}', 'AgendaController@edit')->middleware('admin');
Route::post('/admin/agenda/edit/{agenda}', 'AgendaController@editSave')->middleware('admin');
Route::get('/admin/agenda/delete/{agenda}', 'AgendaController@delete')->middleware('admin');

Route::get('/admin/categories', 'CategoryController@index')->middleware('admin');
Route::get('/admin/categories/index', 'CategoryController@index')->middleware('admin');
Route::get('/admin/categories/create', 'CategoryController@create')->middleware('admin');
Route::post('/admin/categories/create', 'CategoryController@editSave')->middleware('admin');
Route::get('/admin/categories/edit/{category}', 'CategoryController@edit')->middleware('admin');
Route::post('/admin/categories/edit/{category}', 'CategoryController@editSave')->middleware('admin');
Route::get('/admin/categories/delete/{category}', 'CategoryController@delete')->middleware('admin');

Route::get('/admin/portrait', 'PortraitController@index')->middleware('admin');
Route::get('/admin/portrait/index', 'PortraitController@index')->middleware('admin');
Route::get('/admin/portrait/create', 'PortraitController@create')->middleware('admin');
Route::get('/admin/portrait/edit/{portrait}', 'PortraitController@edit')->middleware('admin');
Route::post('/admin/portrait/create', 'PortraitController@createSave')->middleware('admin');
Route::post('/admin/portrait/edit/{portrait}', 'PortraitController@editSave')->middleware('admin');
Route::get('/admin/portrait/delete/{portrait}', 'PortraitController@delete')->middleware('admin');

Route::auth();

//Route::get('/home', 'HomeController@index');


// FileUpload -----------------------------------
$middlewares = \Config::get('lfm.middlewares');
array_push($middlewares, '\Unisharp\Laravelfilemanager\middleware\MultiUser');

// make sure authenticated
Route::group(array('middleware' => $middlewares, 'prefix' => 'laravel-filemanager'), function ()
{
    // Show LFM
    Route::get('/', 'Unisharp\Laravelfilemanager\controllers\LfmController@show');

    // upload
    Route::any('/upload', 'Unisharp\Laravelfilemanager\controllers\UploadController@upload');

    // list images & files
    Route::get('/jsonitems', 'Unisharp\Laravelfilemanager\controllers\ItemsController@getItems');

    // folders
    Route::get('/newfolder', 'Unisharp\Laravelfilemanager\controllers\FolderController@getAddfolder');
    Route::get('/deletefolder', 'Unisharp\Laravelfilemanager\controllers\FolderController@getDeletefolder');
    Route::get('/folders', 'Unisharp\Laravelfilemanager\controllers\FolderController@getFolders');

    // crop
    Route::get('/crop', 'Unisharp\Laravelfilemanager\controllers\CropController@getCrop');
    Route::get('/cropimage', 'Unisharp\Laravelfilemanager\controllers\CropController@getCropimage');

    // rename
    Route::get('/rename', 'Unisharp\Laravelfilemanager\controllers\RenameController@getRename');

    // scale/resize
    Route::get('/resize', 'Unisharp\Laravelfilemanager\controllers\ResizeController@getResize');
    Route::get('/doresize', 'Unisharp\Laravelfilemanager\controllers\ResizeController@performResize');

    // download
    Route::get('/download', 'Unisharp\Laravelfilemanager\controllers\DownloadController@getDownload');

    // delete
    Route::get('/delete', 'Unisharp\Laravelfilemanager\controllers\DeleteController@getDelete');
});
// ----------------------------------------------
