<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Photo;

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
//        echo $post->title;
//    }
//
//
//});

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

//Route::get('/basicinsert', function(){
//
//    $post= new Post;
//
//    $post->title = 'new ELOQUENT TITLE';
//    $post->content = 'Wow ELOQEUNT IS REALLY COOL';
//
//    $post->save();
//
//});
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


//Route::get('/softdelete',function (){
//
//Post::find(5)->delete();
//
//});

//Route::get('/readsoftdelete',function (){
//
////    $post = Post::find(1);
////
////    return $post ;
//
////    $post= Post::withTrashed()->where('id',4)->get();
////
////    return $post;
//
//    $post= Post::onlyTrashed()->get();
//    return $post;
//});

//Route::get('/restore',function (){
//
//    Post::withTrashed()->where('is_admin',0)->restore();
//
//});

//Route::get('forcedelete', function (){
//
//    Post::onlyTrashed()->where('is_admin',0)->forceDelete();
//
//
//});


/*
-----------------------------------------------------------------------
ELOQUENT RELATIONSHIPS
-----------------------------------------------------------------------
*/

//One to One relationship
Route::get('user/{id}/post',function ($id){

    return User::find($id)->post;

});

////Inverse
//Route::get('post/{id}/user',function ($id){
//
//    return Post::find($id)->user->name;
//
//});

//One to Many relationship
Route::get('/posts',function(){

    $user = User::find(1);

    foreach($user->posts as $post){
         echo $post->title ."<br>";
    }

});

//Many to Many Relationship

//Route::get('/user/{id}/role',function($id){
//    $user = User::find($id)->roles()->orderBy('id','desc')->get();
//
//    return $user;
////    foreach ($user->roles as $role){
////
////        return $role->name;
////    }
////
//});


//Accesing the intermidiate table /pivot

//Route::get('user/pivot',function(){
//
//    $user = User::find(1);
//
//    foreach ($user-> roles as $role){
//        echo $role->pivot;
//    }
//
//});

//Getting all users with roles
//Route::get('user/paivot',function(){
//
//    $pivot = User::with('roles')->get();
//
//    return $pivot;
//
//});


//For one role print all users
//Route::get('user/rolespivot',function(){
//
//    $role = Role::find(1);
//
//    foreach ($role->users as $user){
//        echo $user;
//        ;
//    }
//
//});


//Route::get('/user/country',function(){
//
//$country = Country::find(1);
//
//foreach ($country->posts as $post){
//    return $post->title;
//}
//});


//Polymorphic Relations

//Route::get('/user/photos',function (){
//
//    $user = User::find(1);
//
//    foreach ($user-> photos as $photo){
//        return $photo;
//    }
//
//});
//
//Route::get('/post/photos',function (){
//
//    $post = Post::find(1);
//
//    foreach ($post-> photos as $photo){
//        return $photo;
//    }
//
//});


Route::get('photo/{id}/post',function($id){

    $photo = Photo::findOrFail($id);

    return $photo -> imageable;

});

//Polymorphic Many to Many
//Route::get('/post/tag',function(){
//
//    $post = Post::find(1);
//
//    foreach ($post-> tags as $tag){
//        echo $tag->name;
//    }
//});


Route::get('/tag/post',function(){

   $tag= Tag::find(2);

    foreach ($tag-> posts as $post){

        return $post->title;
    }

});







