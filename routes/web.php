<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CustomAuthController;

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\MessagesController;


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








Route::post("/veiwers/get-commands",[CustomAuthController::class,"getCommands"])->name("get.commands.pt");
Route::post("/admin/update-commands",[CustomAuthController::class,"updateCommands"])->name("update.commands.pt");


Route::get("/",[CustomAuthController::class,"home"]);
Route::get("/home",[CustomAuthController::class,"home"])->name("home.index");
Route::get("/admin",[CustomAuthController::class,"admin"])->name("admin.index");



// end of super admin


Route::group(["prefix"=>"Account","middleware"=>["mainUserIsLogedIn"]], function(){
    

    Route::get("/{name}/Dashboard",[MainUserController::class,"dashboard"])->name("mainuser.dashboard");

});

