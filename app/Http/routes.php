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

Route::get('/', function () {
    return view('index');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('dashboard', 'DashboardController');
    Route::resource('server/hosts', 'ServerHostsController');
    Route::resource('server/services','ServerServicesController');
});

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/',function(){
    }) ;
});

foreach(File::allFiles(__DIR__.'/Routes') as $partial)
{
    require_once $partial->getPathname();
} 

Route::get('/',['middleware' => 'install.checker', 'uses'=>function(){
    echo "installed";
}]);
