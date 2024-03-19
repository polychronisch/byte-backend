<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DegreeController;
use App\Models\Degree;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/submit-candidate', [CandidateController::class, 'store']);
Route::post('/delete-candidate/{id}', [CandidateController::class, 'delete']);
Route::get('/candidates', [CandidateController::class, 'index']);

//degrees
Route::get('/degrees', [DegreeController::class, 'index']);
Route::post('/submit-degree', [DegreeController::class, 'store']);
Route::post('/delete-degree/{id}', [DegreeController::class, 'delete']);

