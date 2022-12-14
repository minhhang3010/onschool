<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/students', [StudentController::class,'index']);
// Route::get('/students/{id}', [StudentController::class,'index']);
// Route::post('/students', [StudentController::class,'store']);
    
Route::resource('/students', StudentController::class);
Route::get('/students/search/{name}',[StudentController::class,'search']);

Route::resource('/users', UserController::class);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace'=>'App\Http\Controllers'

], function ($router) {

    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/refresh', [AuthController::class,'refresh']);
    Route::get('/me', [AuthController::class,'me']);

});
