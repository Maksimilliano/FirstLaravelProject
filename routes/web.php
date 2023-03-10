<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\UserController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/', function (){
   return '<h1>Hello, world!</h1>';
});

Route::get('/', function (){
    $res = 2 + 3;
    $name = 'John';
   // return view('home', ['res'=>$res, 'name'=>$name]);
    return view('home', compact('res', 'name'));
})->name('home');

Route::get('/about', function (){
    return view('about');
});
*/
/*
Route::get('/contact', function (){
    return view('contact');
});
Route::post('/send-email', function (){
    if (!empty($_POST)){
        dump($_POST);
    }
    return 'Send Email';
});
*/
/*
Route::match(['post', 'get'], '/contact', function (){
    if (!empty($_POST)){
        dump($_POST);
    }
    return view('contact');
});

Route::match(['post', 'get', 'put'], '/contact', function (){
    if (!empty($_POST)){
        dump($_POST);
    }
    return view('contact');
})->name('contact');

Route::view('/test', 'test', ['test'=>'Test data']);
*/
//Route::redirect('/about', '/contact');

//Route::redirect('/about', '/contact', 301);

//Route::permanentRedirect('/about', '/contact');

/*Route::get('/post/{id}', function ($id){
    return "Post $id" ;
});
*/
/*
Route::get('/post/{id}/{slug}', function ($id,$slug){
    return "Post $id | $slug";
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z0-9-]+']);

Route::get('/post/{id}/{slug?}', function ($id,$slug = null){
    return "Post $id | $slug";
})->name('post');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/posts', function (){
        return "Posts List" ;
    });

    Route::get('/post/create', function (){
        return "Posts Create" ;
    });

    Route::get('/post/{id}/edit', function ($id){
        return "Edit Post $id" ;
    })->name('post');
});

Route::resource('/admin/posts', 'PostController', ['parameters'=> [
    'posts'=> 'slug'
]]);

Route::fallback(function (){
   // return redirect()->route('home');
    abort(404, 'Oops! Page not found...');
});
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->name('posts.create');
Route::post('/store', [HomeController::class, 'store'])->name('posts.store');
//Route::post('/', 'HomeController@store')->name('posts.store');

Route::get('/page/about', [PageController::class, 'show'])->name('page.about');

//Route::get('/send', [ContactController::class, 'send']);

Route::match(['get', 'post'], '/send', [ContactController::class, 'send'])->name('mail.send');

Route::group(['middleware'=> 'guest'], function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware'=> 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', [MainController::class, 'index']);
});


