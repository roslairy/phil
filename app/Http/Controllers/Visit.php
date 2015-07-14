<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Utils;
use App\Teacher;

class Visit extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$data = [ 'section' => 'sy' ];
		
		$presses = Article::where('taxonomy', '=', 'xwzx-zxxw')
			->orderBy('id', 'desc')->paginate(6);
		$informs = Article::where('taxonomy', '=', 'xwzx-tzgg')
			->orWhere('taxonomy', '=', 'bksjy-bksjx')
			->orWhere('taxonomy', '=', 'yjsjy-yjsjx')
			->orderBy('id', 'desc')->paginate(7);
		$dynamics = Article::where('taxonomy', '=', 'xsjl-xsjz')
			->orWhere('taxonomy', '=', 'xsjl-xshy')
			->orderBy('id', 'desc')->paginate(7);
		$teachers = Article::where('taxonomy', '=', 'ssyd-ssly')
			->orderBy('id', 'desc')->paginate(7);
		
		$data['presses'] = $presses;
		$data['informs'] = $informs;
		$data['dynamics'] = $dynamics;
		$data['teachers'] = $teachers;
		
		return view('home', $data);
	}
	
	public function showArticleList($section, $sort){
		$data = [ 'section' => $section ];
		
		$lists = Article::where('taxonomy', '=', $section.'-'.$sort)
			->orderBy('id', 'desc')->paginate(10);
		
		foreach($lists as $item){
			$item->date = explode(' ', $item->created_at)[0];
		}
		
		$data['lists'] = $lists;
		
		$data = self::equipSort($data, $section, $sort);
		
		return view('list', $data);
	}
	
	public function showArticle($id){
		$article = Article::find($id);
		list($section, $sort) = explode('-', $article->taxonomy);
		
		$data = [ 'section' => $section ];
		$data = self::equipSort($data, $section, $sort);
		
		$article->pv++;
		$article->save();
		
		$data['title'] = $article->title;
		$data['author'] = $article->author;
		$data['date'] = explode(' ', $article->created_at)[0];
		$data['pv'] = $article->pv;
		$data['body'] = $article->body;
		
		if ($section === 'bxgk') return view('selfIntro', $data);
		return view('article', $data);
	}
	
	public function showTeacherList($taxonomy){
		$data = [ 'section' => 'szdw' ];
		
		$lists = Teacher::where('taxonomy', '=', $taxonomy)->paginate(6);
		if ($taxonomy === 'famous'){
			$lists = Teacher::where('famous', '=', 1)->paginate(6);
		}
		
		$data['teachers'] = $lists;
		$data = self::equipSort($data, 'szdw', $taxonomy);
		
		return view('teacherList', $data);
	}
	
	public function showTeacher($id){
		$teacher = Teacher::find($id);
		$section = 'szdw';
		$sort = $teacher->taxonomy;
		
		$data = [ 'section' => $section ];
		$data = self::equipSort($data, $section, $sort);
		
		$data['name'] = $teacher->name;
		$data['description'] = $teacher->description;
		$data['picture'] = $teacher->picture;
		
		return view('teacher', $data);
	}
	
	protected function equipSort($data, $section, $sort){
		list($keys, $values) = array_divide(Admin::TAXONOMY);
		$taxes = Utils::array_starts_with($keys, $section);
		$sorts = [];
		foreach ($taxes as $tax){
			$sorts[] = explode('-', $tax)[1];
		}
		$data['sorts'] = $sorts;
		$data['sort'] = $sort;
		$data['TRANS_TAXONOMY'] = Admin::TRANS_TAXONOMY;
		return $data;
	}
}
