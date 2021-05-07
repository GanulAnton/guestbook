<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Models\Comment;
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

//Public routes for comments and Authorization
Route::get('/comments',[CommentController::class, 'index']);
Route::get('/comments/{id}',[CommentController::class, 'show']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

//Protected routes for comments and Authorization
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::delete('comments/{id}',[CommentController::class, 'destroy']);
    Route::post('comments/create',[CommentController::class, 'store']);
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::post('comments/{id}',[CommentController::class, 'update']);
    Route::post('/comments/{id}/replies',[ReplyController::class, 'store']);
    Route::delete('/comments/{id}/replies/{reply_id}',[ReplyController::class, 'destroy']);
});

//Public routes for replies
Route::get('/comments/{id}/replies',[ReplyController::class, 'index']);






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
