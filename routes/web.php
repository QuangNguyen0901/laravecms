<?php

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

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about',function (){
    return 'about';
});

Route::get('where',function (){
    return Redirect::to('about');
});

Route::get('profile/{name}','ProfileController@showProfile');

Route::get('insert',function (){
   DB::insert('insert into users(name,email,password) VALUES (?,?,?)',['vana','hikari0901@gmail.com','123456']);
   return 'insert successful';
});

Route::get('read',function(){
    $result = DB::select('select * from users where id = ? ',[1]);
    foreach ($result as $user ){

        return $user->name;
    }
});

Route::get ('update',function (){
    $updated = DB::update('update users set name = ? where id = ?',['ahaha',1]);
    return $updated;
});

Route::get('delete',function (){
    $deleted = DB::delete('delete from users where id = ?',[2]);
    return $deleted;
});

//LAM VIEC VOI DB bang ORM --------------------------------------------------

Route::get('readAll',function (){
    $posts = Post::all();
    foreach ($posts as $p){
        echo $p->tittle;
        echo '<br>';
    }
});

//Route::get('findId', function (){
//    $item = Post::where('id',2)
//    ->get();
//    foreach ($item as $i) {
//        echo $i->tittle;
//        echo '<br>';
//    }
//});

Route::get('findId', function (){
    $item = Post::where('id','>=',2)
        ->get();
//    dd($item);
    foreach ($item as $i) {
        echo $i->tittle;
        echo '<br>';
    }
});

Route::get('findIdx', function (){
    $item = Post::where('id','>=',1)
        ->where('tittle','like','%abc%')
        ->orderBy('id','desc')
        ->get();
//    dd($item);
    foreach ($item as $i) {
        echo $i->tittle;
        echo '<br>';
    }
});

Route::get('insertORM', function (){
    $p = new Post;
    $p->tittle = 'abc 222';
    $p->body = 'xcscs';
    $p->user_id = '1';
    $p->save();
});

Route::get('updateORM', function (){
    $p = Post::where('id',3)->first();
    $p->tittle = 'uuuu2';
    $p->body = 'xdn';
    $p->save();
    return 'update DONE';
});

Route::get('deleteORM',function (){
    Post::where('id','>=',3)
        ->delete();
});


Route::get('destroyORM',function(){
    Post::destroy([2,3]);
});


