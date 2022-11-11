<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Anime_setting_Controller;
use App\Http\Controllers\add_category;
use App\Http\Controllers\categoryHandling;
use App\Http\Controllers\AnimeDetail;
use App\Http\Controllers\AnimeWatch;
use App\Http\Controllers\SliderSetting;
use App\Http\Controllers\homePage;
use App\Http\Controllers\userHandling;
use App\Http\Controllers\AddWhishlist;
use App\Http\Controllers\animeFilter;
use App\Http\Controllers\comment;
use App\Http\Controllers\mailSend;
use App\Http\Controllers\AdminLogins;
use App\Http\Controllers\meta_tag;

// Asdf{}123456
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


// Route::view('category', 'categories');

// Route::view('sign_up', 'signup');

// middleware group start
Route::middleware(['web'])->group(function () {
// main page route


Route::get('/', [homePage::class,"index"]);
Route::get('/mail-send/{id}', [mailSend::class,"index"]);
Route::post('/mail-send', [mailSend::class,"store"]);
Route::get('Anime-forget-password', [mailSend::class,"form"]);
Route::get('forget-password/{email}', [mailSend::class,"show"]);
Route::post('forget-password', [mailSend::class,"edit"]);
// =========================================================================
// =========================================================================
Route::view('login', 'login');
// =========================================================================
// =========================================================================
// =========================================================================


    // -=============edit user===============
Route::get('user-setting',[userHandling::class,"index"]);
Route::post('update-user',[userHandling::class,"edit"]);
//whislist
Route::get('add-fvrt',[AddWhishlist::class,"store"]);
Route::get("Favorite-Anime",[AddWhishlist::class,"index"]);
Route::get("Delete_fvrt/{id}",[AddWhishlist::class,"destroy"]);

// search anime
Route::get("anime-filter/",[animeFilter::class,"index"]);
// comments
Route::post("anime-comments/",[comment::class,"store"]);
Route::post("anime-comments-edit",[comment::class,"edit"]);
// anime details
Route::get('anime-detail/{id}', [AnimeDetail::class,"index"]);
// anime watch
Route::get('Watch-Anime/{id}/{name}',[AnimeWatch::class,"index"]);
// login user panel
// Route::get('Delete-fvrt/{id}/{name}',[AddWhishlist::class,"index"]);
Route::post('insert-user',[userHandling::class,"store"]);
Route::post('login-user',[userHandling::class,"check_login"]);
Route::get('logout',[userHandling::class,"logout"]);
Route::get('user-inactive/{id}',[userHandling::class,"inActive"]);

});
// user middleware end
// ===================================
// ===================================
// ===================================


// admin views routes
Route::get('/admin', [AdminLogins::class,"index"]);
Route::get('/admin-setting', [AdminLogins::class,"admin_setting"]);
Route::get('/dashboard', [AdminLogins::class,"dashboard"]);
Route::get('/admin_logout', [AdminLogins::class,"logout"]);
Route::get('/All-user', [userHandling::class,"admin_handler"]);
Route::get('/Edit-admin-user/{id}', [userHandling::class,"Edit_admin_user"]);
Route::post('/Edit_admin_user/{id}', [userHandling::class,"Update_admin_user"]);
Route::get('/delete_admin_user/{id}', [userHandling::class,"destroy"]);
Route::get('/meta-tag-setting', [meta_tag::class,"index"]);
Route::get('/Edit-meta-tag/{id}', [meta_tag::class,"edit"]);
Route::post('/meta-tag-insert', [meta_tag::class,"store"]);
Route::post('/meta-tag-edit', [meta_tag::class,"update"]);
Route::get('/meta-description/{id}', [meta_tag::class,"meta_description"]);

Route::post('/login-admin', [AdminLogins::class,"check_admin_login"]);

Route::post('/update-admin', [AdminLogins::class,"edit"]);

// ===================================
// ===================================


// admin get route
Route::get('Add-anime', [Anime_setting_Controller::class,"index"]);
Route::get('All-anime', [Anime_setting_Controller::class,"show_data"]);
Route::get('Edit-anime/{id}', [Anime_setting_Controller::class,"show"]);
Route::get('Delete-anime/{id}', [Anime_setting_Controller::class,"destroy"]);
Route::get('anime-description/{flid}',[Anime_setting_Controller::class,"anime_description"]);
// =========================================================================
// category
Route::get('Add-anime-category',[add_category::class,"Add_anime_category"]);
Route::get('Edit-anime-category/{id}',[add_category::class,"show"]);
Route::get('Delete-anime-category/{id}',[add_category::class,"destroy"]);
// =========================================================================
// admin post routes
// add and update anime category
Route::post('insert-anime-category',[add_category::class,"store"]);
Route::post('update-anime-category/{id}',[add_category::class,"edit"]);
// =========================================================================
// =========================================================================
// slider submit gallery main page
Route::post('SliderInsert',[SliderSetting::class,"store"]);
Route::post('Slider-delete-images',[SliderSetting::class,"destroy"]);
// =========================================================================
// =========================================================================
// =========================================================================
// floder_id with respect to name
Route::post('insertGallery',[SliderSetting::class,"store_flid"]);
Route::post('update-anime-slider/{id}',[SliderSetting::class,"edit"]);
Route::get('Delete-anime-gallery/{id}',[SliderSetting::class,"destroy_record"]);
// =========================================================================
// =========================================================================
// =========================================================================
// add anime setting
Route::post('insert-anime-setting',[Anime_setting_Controller::class,"store"]);
Route::post('update-anime-setting/{id}',[Anime_setting_Controller::class,"edit"]);

// =========================================================================
// =========================================================================
// =========================================================================
// =============================================
// slider get images in dropzone and show main page of slider
Route::get('Slider-setting',[SliderSetting::class,"index"]);

Route::get('slider-fetch-images',[SliderSetting::class,"getImages"]);
Route::get('Edit-anime-slider/{id}',[SliderSetting::class,"show"]);
// =========================================================================
// =========================================================================
// =========================================================================
// =========================================================================
Route::get('category', [categoryHandling::class,"show_all"]);
Route::get('category/{id}', [categoryHandling::class,"index"]);
Route::get('category/{name}/{order_by}', [categoryHandling::class,"index"]);
// ====================================================
// ====================================================
// ====================================================
// ====================================================
// ====================================================

