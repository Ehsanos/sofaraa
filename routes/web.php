<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/setLang/{lang}', function ($lang) {
    if(session()->has('lang')){
        session()->forget('lang');
        session()->put('lang',$lang);
    }else{
        session()->put('lang',$lang);
    }
    return redirect()->back();
})->name('setLang');


Route::middleware('locale')->group(function(){
    Route::get('/',[\App\Http\Controllers\Web\IndexController::class,'index'])->name('home');
    Route::get('/projects/{section?}',[\App\Http\Controllers\Theme\ProjectController::class,'index'])->name('projects');
    Route::get('/projects/area/{area}',[\App\Http\Controllers\Theme\ProjectController::class,'area'])->name('projects.area');
    Route::get('/archives/{nation?}',[\App\Http\Controllers\Theme\ProjectController::class,'archives'])->name('archives');
    Route::get('/projects/{project}/show',[\App\Http\Controllers\Theme\ProjectController::class,'show'])->name('projects.show');
    Route::get('/campaigns',[\App\Http\Controllers\Theme\CampaignController::class,'index'])->name('campaigns');
    Route::get('/campaigns/{campaign}',[\App\Http\Controllers\Theme\CampaignController::class,'show'])->name('campaigns.show');
    Route::get('/posts',[\App\Http\Controllers\Theme\PostController::class,'index'])->name('posts');
    Route::get('/posts/{post}',[\App\Http\Controllers\Theme\PostController::class,'show'])->name('posts.show');
    Route::get('/payments',[\App\Http\Controllers\Theme\PaymentController::class,'index'])->name('payment');
    Route::get('/about',[\App\Http\Controllers\Theme\AboutController::class,'index'])->name('about');
     Route::get('/offices/{office}',[\App\Http\Controllers\Theme\OfficeController::class,'show'])->name('office.show');
});
