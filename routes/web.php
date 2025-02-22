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