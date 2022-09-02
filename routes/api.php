<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Models\Office;
use App\Models\Area;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PartnerController;


Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('nations', [NationController::class, 'index']);
Route::get('about_us', [AboutUsController::class, 'index']);
Route::post('about_us', [AboutUsController::class, 'update']);
Route::post('about_us_delete', [AboutUsController::class, 'delete_image']);


Route::resource('users', UserController::class)->except(['edit', 'create', 'update']);
Route::resource('office', OfficeController::class)->except(['edit', 'create', 'show', 'update']);
Route::resource('section', SectionController::class)->except(['edit', 'create', 'update',]);
Route::resource('areas', AreaController::class)->except(['edit', 'create', 'update', 'show']);
Route::resource('projects', ProjectController::class)->except(['edit', 'create', 'update',]);
Route::post('projects/delete_image/{id}',[ProjectController::class ,"delete_image"]);

Route::resource('campings', CampaignController::class)->except(['edit', 'create', 'update',]);
Route::resource('slider', SliderController::class)->except(['edit', 'create', 'update', 'show']);
Route::resource('testimonial', TestimonialController::class)->except(['edit', 'create', 'update', 'show']);
Route::resource('post', PostController::class)->except(['edit', 'create', 'update', 'show']);

Route::post('users/{id}', [UserController::class, 'update']);
Route::post('office/{id}', [OfficeController::class, 'update']);
Route::post('section/{id}', [SectionController::class, 'update']);
Route::post('areas/{id}', [AreaController::class, 'update']);
Route::post('projects/{id}', [ProjectController::class, 'update']);
Route::post('campings/{id}', [CampaignController::class, 'update']);
Route::post('slider/{id}', [SliderController::class, 'update']);
Route::post('testimonial/{id}', [TestimonialController::class, 'update']);
Route::post('post/{id}', [PostController::class, 'update']);


Route::get('roles', [UserController::class, 'getRoles']);
// routs setting
Route::get('setting', [SettingController::class, 'index']);
Route::post('setting/{id}', [SettingController::class, 'update']);

//  dashpoard rout
Route::get('count-user', [UserController::class, 'count']);
Route::get('count-projects', [ProjectController::class, 'projectsCount']);
Route::get('count-areas', [AreaController::class, 'areaCount']);
Route::get('count-sections', [SectionController::class, 'sectionCount']);
Route::get('count-offices', [OfficeController::class, 'countOffice']);
Route::get('count-campings', [CampaignController::class, 'countCamping']);




Route::resource('partner', PartnerController::class)->except(['edit', 'create', 'update', 'show']);


    