<?php

use App\Http\Controllers\Admin\MessagesController;
use Illuminate\Support\Facades\Route;

use App\Mail\MyMail;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name("home");

Route::get('/loginForm', [\App\Http\Controllers\LoginController::class, "index"])->name("loginForm");

Route::post('/login', [\App\Http\Controllers\LoginController::class, "login"])->name("login");

Route::get('/logOut', [\App\Http\Controllers\LoginController::class, "logout"])->name("logOut");

Route::get('/registerForm', [\App\Http\Controllers\RegisterController::class, "index"])->name("registerForm");

Route::post('/register', [\App\Http\Controllers\RegisterController::class, "register"])->name("register");

Route::get('/author',[\App\Http\Controllers\AuthorController::class, 'index'])->name('author');

Route::post('/search/{keyword}', [\App\Http\Controllers\HomeController::class, "search"])->name("search");

Route::post('/filter/{category_id}',[\App\Http\Controllers\HomeController::class, "filter"])->name('filter');

Route::post('/filter/all',[\App\Http\Controllers\HomeController::class, 'filterAll'])->name('filterAll');

//Route::get('/contactForm',[\App\Http\Controllers\ContactController::class, 'index'])->name('contactForm');
//
//Route::post('/contact',[\App\Http\Controllers\ContactController::class, 'store'])->name('contact');
//
//Route::get('/adminMessages',[\App\Http\Controllers\Admin\MessagesController::class, 'index'])->name('adminMessages');


Route::middleware(['loggedIn'])->group(function (){

    Route::get('/contactForm',[\App\Http\Controllers\ContactController::class, 'index'])->name('contactForm');

    Route::post('/contact',[\App\Http\Controllers\ContactController::class, 'store'])->name('contact');

    Route::get('/adminMessages',[MessagesController::class, 'index'])->name('adminMessages');

    Route::post('/messages/delete',[MessagesController::class, 'delete'])->name('deleteMessage');

    Route::get('/adminMenu',[\App\Http\Controllers\Admin\MenuController::class, 'index'])->name('adminMenus');

    Route::post('/menus/update',[\App\Http\Controllers\Admin\MenuController::class, 'changed'])->name('menuUpdate');

    Route::post('/menus/delete',[\App\Http\Controllers\Admin\MenuController::class, 'delete'])->name('menuDelete');

    Route::post('/menus/insert',[\App\Http\Controllers\Admin\MenuController::class, 'store'])->name('menuInsert');

    Route::get('/adminUsers',[\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('adminUsers');

    Route::post('/users/delete',[\App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('deleteUser');

    Route::get('/adminRoles',[\App\Http\Controllers\Admin\RolesController::class, 'index'])->name('adminRoles');

    Route::post('/roles/update',[\App\Http\Controllers\Admin\RolesController::class, 'changed'])->name('roleUpdate');

    Route::post('/roles/delete',[\App\Http\Controllers\Admin\RolesController::class, 'delete'])->name('roleDelete');

    Route::post('/roles/insert',[\App\Http\Controllers\Admin\RolesController::class, 'store'])->name('roleInsert');

    Route::get('/adminCategories',[\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('adminCategories');

    Route::post('/categories/update',[\App\Http\Controllers\Admin\CategoriesController::class, 'changed'])->name('categoryUpdate');

    Route::post('/categories/delete',[\App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('categoryDelete');

    Route::post('/categories/insert',[\App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('categoryInsert');

    Route::get('/adminProducts',[\App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('adminProducts');

    Route::post('/product/update',[\App\Http\Controllers\Admin\ProductsController::class, 'changed'])->name('productUpdate');

    Route::post('/product/delete',[\App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('productDelete');

    Route::post('/product/insert',[\App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('productInsert');

    Route::get('/adminStatistics',[\App\Http\Controllers\Admin\UsersActivityController::class, 'index'])->name('adminStatistics');

    Route::post('/statistics/registration', [\App\Http\Controllers\Admin\UsersActivityController::class, "registrationFilter"])->name("registrationFilter");

    Route::post('/statistics/login', [\App\Http\Controllers\Admin\UsersActivityController::class, "loginFilter"])->name("loginFilter");

    Route::post('/statistics/logout', [\App\Http\Controllers\Admin\UsersActivityController::class, "loggedOutFilter"])->name("loggedOutFilter");

    Route::post('/product/order', [\App\Http\Controllers\OrderControler::class, 'store'])->name('productOrder');


});

