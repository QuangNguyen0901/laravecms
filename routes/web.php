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

Route::get('readAll',function (){
    $posts = Post::all();
    foreach ($posts as $p){
        echo $p->tittle;
        echo '<br>';
    }
});

