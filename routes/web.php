<?php

//use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use App\Models\Post;
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

    Route::get('/', [PostController::class, 'index'])->name('home');

    Route::get('posts/{post:slug}', [PostController::class, 'show']);
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

    /*Route::get('authors/{author:username}', function (\App\Models\User $author) {
        return view('posts.index.blade.php', [
            'posts' => $author->posts,                       // da nema with => ->load(['category', 'author'])
        ]);
    });*/

    Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

    Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

    Route::get('admin/categories', [AdminCategoryController::class, 'index'])->middleware('auth');
    Route::get('admin/categories/create', [AdminCategoryController::class, 'create'])->middleware('auth');
   // Route::post('admin/categories', [AdminCategoryController::class, 'store'])->middleware('auth');
   // Route::get('admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->middleware('auth');
   // Route::delete('admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->middleware('auth');


    Route::middleware('auth')->group(function () {
        Route::resource('admin/posts', AdminPostController::class)->except('show');
        /*
        Route::get('admin/posts', [AdminPostController::class, 'index']);
        Route::get('admin/posts/create', [AdminPostController::class, 'create']);
        Route::post('admin/posts', [AdminPostController::class, 'store']);
        Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
        Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
        Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
        */
    });



    Route::get('admin/categories','CategoryController@manageCategory')->name('category-tree-view');
    Route::post('add-category','CategoryController@addCategory')->name('add.category');

    Route::get('admin/categories/request', [AdminCategoryController::class, 'request'])->middleware('auth');
    Route::get('send-mail', 'MailController@sendMail')->name('send.mail');

