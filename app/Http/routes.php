<?php
use Illuminate\Support\Facades\URL;
use Vinkla\Hashids\Facades\Hashids;

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

/*
 * Route model bindnings to support Hashids
 * TODO: Extend router to include custom function for wildcard models
 */
Route::bind('member', function($value, $route)
{
    $id = Hashids::decode($value)[0];
    return \App\Member::findOrFail($id);
});

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/setup/organization', 'OrganizationController@create');
    Route::post('/setup/organization', 'OrganizationController@store');

    Route::group(['middleware' => 'requireOrg'], function () {
        Route::get('member/create/printable', 'MemberController@createPrintable');
        Route::resource('member', 'MemberController');
        Route::resource('form', 'FormController');

        Route::get('/home', 'HomeController@index');
    });
});

Route::get('test', function(){
    return Url::route('member.show', [\App\Member::find(4)]);
});
