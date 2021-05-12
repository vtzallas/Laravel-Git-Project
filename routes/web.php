<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

use App\Models\Post;

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
//Route::get('/insert', function (){
//
//    DB::insert('insert into posts(title,content) values(?,?)',['PHP with Laravel', 'SOME CONTENT']);
//
//});

//Route::get('/read',function (){
//    $results = DB::select('select * from posts where id= ?', [1]);
//
//    foreach ($results as $post){
//        return $post->title;
//    }
//});

//
//Route::get('/update',function(){
//
//    $updated = DB::update('update posts set title ="Update Title" where id =?',[1]);
//
//    return $updated;
//});
//
//
//Route::get('/delete',function(){
//
//    $deleted = DB::delete('delete from posts where id =?',[1]);
//
//    return $deleted;
//});


//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/post/{id}', [PostsController::class, 'index']);

//Route::resource('posts',PostsController::class);



/*
-----------------------------------------------------------------------
ELOQUENT
-----------------------------------------------------------------------
*/

//Route::get('/read', function(){
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//
//        return $post->title;
//    }
//
//
//});
//
//
//Route::get('/find', function(){
//    $post = Post::find(2);
//
//
//        return $post->title;
//
//});


//Route::get('/findmore',function (){
//
//   $posts= Post::where('users_count', '<',50)->firstOrFail();
//
//   return $posts;
//});

Route::get('/basicinsert', function(){

    $post= new Post;

    $post->title = 'new ELOQUENT TITLE';
    $post->content = 'Wow ELOQEUNT IS REALLY COOL';

    $post->save();

});
//
//
//Route::get('/basicinsert2', function(){
//
//    $post= Post::find(2);
//
//    $post->title = 'new ELOQUENT TITLE insert 2';
//    $post->content = 'Wow ELOQEUNT IS REALLY COOL content 2';
//
//    $post->save();
//
//});

//Route::get('/create', function (){
//
//    Post::create(['title'=>'the create method', 'content'=>'wow i am learning']);
//
//});

//Route::get('/update',function(){
//
//    Post::where('id',3)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE dassadasdasdsa','content'=>'i love my instrasdasdssddsdsuctor']);
//});

//Route::get('/delete',function (){
//
//    $post= Post::find(2);
//    $post->delete();
//
//});

//Route::get('/delete2',function(){
//
//    Post::destroy(3);
//
//    Post::where('is_admin',0)->delete();
//});


Route::get('/softdelete',function (){

Post::find(5)->delete();

});

Route::get('/readsoftdelete',function (){

//    $post = Post::find(1);
//
//    return $post ;

//    $post= Post::withTrashed()->where('id',4)->get();
//
//    return $post;

    $post= Post::onlyTrashed()->get();
    return $post;
});
