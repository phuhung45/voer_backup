<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\VprContentMaterialController;
use App\Http\Controllers\VprAuthorController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LocalizationController;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\Frontend\UserMaterialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Backend\AdminCollectionController;
use App\Http\Controllers\Backend\AdminAuthorController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false]);
});

Route::middleware('admin')->group(function() {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin/material', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admins', [AdminController::class, 'create'])->name('admin.create');
    Route::put('admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::delete('admin/delete/{admin}', [AdminController::class, 'confirm_destroy'])->name('admin.confirm_destroy');
    Route::get('admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('admin/materials', [AdminController::class, 'show'])->name('admin.show');
    Route::get('admin/materials/hide', [AdminController::class, 'hide'])->name('admin.hide');
    Route::get('admin/materials/deleted', [AdminController::class, 'delete'])->name('admin.deleted');
    Route::get('admin/materials/undeleted/{id}', [AdminController::class, 'undelete'])->name('admin.undeleted');

    
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('user.index');
    Route::post('admin/users', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('admin/user/create', [AdminUserController::class, 'create'])->name('user.create');
    Route::put('admin/user/{id}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('admin/user/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');
    Route::get('admin/user/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::get('admin/user/{id}', [AdminUserController::class, 'show'])->name('user.show');
    
    Route::get('/admin/author', [AdminAuthorController::class, 'index'])->name('author.index');
    Route::post('admin/author', [AdminAuthorController::class, 'store'])->name('author.store');
    Route::get('admin/author/create', [AdminAuthorController::class, 'create'])->name('author.create');
    Route::put('admin/author/{id}', [AdminAuthorController::class, 'update'])->name('author.update');
    Route::delete('admin/author/{id}', [AdminAuthorController::class, 'destroy'])->name('author.destroy');
    Route::get('admin/author/edit/{id}', [AdminAuthorController::class, 'edit'])->name('author.edit');
    Route::get('admin/author/{id}', [AdminAuthorController::class, 'show'])->name('author.show');
    Route::resource('/create-collection', AdminCollectionController::class);

});
    
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');

Route::resource('/browse', BrowseController::class);
Route::get('/search/title', [SearchController::class, 'searchByTitle'])->name('search');
Route::get('admin/search/title', [SearchController::class, 'adminSearchByTitle'])->name('admin.search');
Route::get('/search/action', [SearchController::class, 'action'])->name('search.action');

Route::get('/profile/{id}', [VprAuthorController::class, 'index'])->name('profile');
Route::get('/{material_type}/{slug}/{material_id}/{content_id?}', [VprContentMaterialController::class, 'index'])->name('slug');
route::get('content/dong-gop/', [ContentController::class, 'store'])->name('donggop');
route::get('content/gioi-thieu/', [ContentController::class, 'index'])->name('about');
route::get('content/huong-dan/', [ContentController::class, 'update'])->name('huongdan');

Route::get('/user/index', [AuthController::class, 'index'])->name('register.login');
Route::post('user/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/user/write.{id}', [AuthController::class, 'write'])->name('register.write');
Route::put('user/{id}', [AuthController::class, 'update'])->name('register.update');
Route::get('user/register', [AuthController::class, 'create'])->name('register.create');
Route::get('user_{id}/edit', [AuthController::class, 'edit'])->name('register.edit');
Route::get('user-{id}/info', [AuthController::class, 'show'])->name('register.show');
Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');


Route::POST('/user/login', [UserLoginController::class, 'index'])->name('user.login');

Route::resource('/browses', UserMaterialController::class);
Route::resource('/collection', CollectionController::class);

// Route::group(['middleware' => 'locale'], function() {
//     Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('user.change-language'); 
// });
Route::get(
    'welcome/{locale}',
    [HomeController::class, 'changeLang']
)->name('locale');

Route::middleware('locale')->get('echo-lang', function () {
    echo __('lang.home');
    return view('frontend.index');
});
