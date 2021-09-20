<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Friend;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/shop', function () {
    return Inertia::render('Shop', [
        'name' => 'Mohsen Store',
        'brands' => ['apple','samsung','xiaomi'],
        'shipping' => 'free',
        'friends' => Friend::all(),
    ]);
});

Route::post('/firends/submit', function(Request $request){
    // save to database
    $friend = new Friend();
    $friend->name = $request->get('name');
    $friend->description = $request->get('description');
    $friend->age = $request->get('age');
    $friend->save();
    // redirect
    return Redirect::back();
})->name('submit-friend');
