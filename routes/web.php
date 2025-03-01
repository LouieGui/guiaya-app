<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Services\UserService;

Route::get('/', function () {
    return view('welcome');
});

//service Container
Route::get('/test', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

//Service Provider
Route::get('/Provider', function (UserService $userProvider) {
    // dd($userProvider->listUsers());
    return $userProvider->listUsers();
});

//Controller
Route::get('/controller', [UserController::class, 'index']);

//Facades
Route::get('/facade', function (UserService $userService) {
    // dd(Response::json($userService->listUsers()));
    return Response::json($userService->listUsers());
});

//Route Parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: ". $postId . " - Comment: " . $comment;
});

Route::get('/id/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');

//Named Route or ROute Alias
Route::get('/alias/route', function () {
    return route('test-route');
})->name('test-route');

//Route - Middleware
Route::middleware(['user-middleware'])->group(function(){
    Route::get('route-middleware-group/first', function(Request $request){
        echo 'first';
    });

    Route::get('route-middleware-group/second', function(Request $request){
        echo 'second';
    });
});

//Route - Controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

//CSRF
Route::get('/token', function(Request $request) {
    // $token = $request->session()->token();
    // return view('token', ['token' => $token]);
    return view('token');
});

Route::post('/token', function(Request $request) {
    return $request->all();
});
