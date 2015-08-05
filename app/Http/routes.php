<?php

use Illuminate\Support\Facades\Route;
use App\Article;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/fuck', function (){
// 	$taxes = ['xwzx-zxxw', 'xwzx-tzgg', 'xsjl-xsjz', 'ssyd-ssly'];
// 	for ($i = 0; $i < 10; $i++){
// 		foreach ($taxes as $tax){
// 			$article = new Article();
// 			$article->title = str_random();
// 			$article->author = str_random(8);
// 			$article->taxonomy = $tax;
// 			$article->body = str_random(100);
// 			$article->picture = '';
// 			$article->erasable = 1;
// 			$article->pv = 0;
// 			$article->save();
// 		}
// 	}
// });
// Route::get('/suck', function (){
// 	$data = [];
// 	foreach (Admin::TAXONOMY as $key => $value){
// 		$keys = explode('-', $key);
// 		$values = explode('-', $value);
// 		$data[$keys[0]] = $values[0];
// 		$data[$keys[1]] = $values[1];
// 	}
// 	echo "[\n";
// 	foreach ($data as $key => $value){
// 		echo "'".$key."' => '".$value."',\n";
// 	}
// 	echo ']';
// });
// Route::get('/update', function (){
// 	Schema::table('teachers', function($table){
// 	    $table->string('synopsis');
// 	    $table->string('taxonomy');
// 	    $table->integer('famous');
// 	});
// });

Route::post('/dump', function (){
		$v = Validator::make(Input::all(), [
				'title' => 'required',
				'body' => 'required',
				'time' => 'required|date'
		]);
	
		if ($v->fails()) {
			return response('bad request', 400);
		}
	
		$article = new Article();
		$article->setTable('articles');
		$article->title = Input::get('title');
		$article->author = 'admin';
		$article->taxonomy = 'bksjy-bkszs';
		$article->body = Input::get('body');
		$article->created_at = Input::get('time');
	
		$article->save();
	
		return response('good');
});

Route::get('/', 'Visit@index');
Route::get('/archive/{id}', 'Visit@showArticle');
Route::get('/list/{section}/{sort}', 'Visit@showArticleList');
Route::get('/teacherList/{taxonomy}', 'Visit@showTeacherList');
Route::get('/teacher/{id}', 'Visit@showTeacher');

Route::get('/admin', 'Admin@login');
Route::post('/check', 'Admin@check');
Route::get('/logout', 'Admin@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('about', 'Admin@about');
    Route::get('article', 'Admin@article');
    Route::get('articleEdit', 'Admin@articleEdit');
    Route::post('articleSave', 'Admin@articleSave');
    Route::get('articleDelete', 'Admin@articleDelete');
    Route::get('articleNew', 'Admin@articleNew');
    Route::get('teacher', 'Admin@teacher');
    Route::get('teacherEdit', 'Admin@teacherEdit');
    Route::post('teacherSave', 'Admin@teacherSave');
    Route::get('teacherDelete', 'Admin@teacherDelete');
    Route::get('teacherNew', 'Admin@teacherNew');
    Route::get('repass', 'Admin@repass');
});
