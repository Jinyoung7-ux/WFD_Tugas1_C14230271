<?php

use App\Http\Controllers\FoodController;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;

Route::resource('foods', FoodController::class);

Route::get('/', function(){
return redirect('/foods');
});