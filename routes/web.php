<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatencyScan; 
use App\Http\Controllers\WebsiteController; 
use App\Http\Controllers\Auth\RegisterController; 


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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/resgitration', function () {
    return view('auth/register');
});

Route::group(['middleware' => ['auth']], function(){
        
Route::get('/latency_test', function () {
    return view('ping_test');
});

Route::get('/speedtest_ookla', function () {
    return view('speedtest_ookla');
});

Route::get('/netstat', function () {
    return view('netstat');
});

Route::get('/security_scan', function () {
    return view('nmap_security_scan');
});

// Route::get('/my_websites', function () {
//     return view('my_websites');
// });

Route::post('auth/create_user', [RegisterController::class, 'create']);


Route::get('test/ping', [LatencyScan::class, 'testLatency']);
Route::get('test/pingURL', [LatencyScan::class, 'testLatencyURL']);

Route::get('test/hostname', [LatencyScan::class, 'testHostname']);
Route::get('test/speed', [LatencyScan::class, 'testSpeed']);
Route::get('test/nmap', [LatencyScan::class, 'nmapLatency']);

Route::get('test/nmaprun', [LatencyScan::class, 'nmap']);
Route::get('test/speedOokla', [LatencyScan::class, 'testSpeedOokla']);
Route::get('test/getNetStat', [LatencyScan::class, 'getNetstat']);
Route::get('test/getNmapSecurity', [LatencyScan::class, 'getNmapSecurity']);

Route::get('dashboard/websites', [WebsiteController::class, 'index']);
Route::get('my_websites', [WebsiteController::class, 'index_lg']);
Route::post('website/add_new', [WebsiteController::class, 'create']);
Route::get('/latency_test', [WebsiteController::class, 'weblist']);
Route::get('/security_scan', [WebsiteController::class, 'securityscanweblist']);
Route::get('dashboard', [WebsiteController::class, 'dashboard']);

Route::post('website/delete', [WebsiteController::class, 'delete']);
Route::post('website/edit', [WebsiteController::class, 'edit']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
