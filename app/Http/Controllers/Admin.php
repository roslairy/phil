<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Req;
use App\Teacher;

class Admin extends Controller {
    
    public function login() {
        return View::getLoginView(Input::get('err', '0'));
    }
    
    public function logout() {
        if (Auth::check()){
            Auth::logout();
        }
        
        return redirect('/');
    }
    
    public function check() {
        $v = Validator::make(Input::all(), [
            'user' => 'required',
            'pw' => 'required',
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView();
        }
        
        $user = Input::get('user');
        $pw = Input::get('pw');
        
        if (Auth::check() || Auth::attempt(['email' => $user, 'password' => $pw])){
            return redirect('/admin/article');
        }
        else{
            return redirect('/admin?err=1');
        }
        
        
    }

    public function about() {
        return View::getAdminAboutView();
    }

    public function article() {
        return View::getAdminArticleView();
    }

    public function articleEdit() {
        $v = Validator::make(Input::all(), [
            'id' => 'required|numeric'
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView($v->messages());
        }
        else if (Article::find(Input::get('id')) == null){
        	return View::getBadRequstView(
        			'no article of this id. id is '.Input::get('id'));
        }
        
        $article = Article::find(Input::get('id'));
        $data = [
            'id' => $article->id,
            'title' => $article->title,
            'author' => Auth::user()->email,
            'taxonomy' => $article->taxonomy,
            'body' => $article->body,
            'picture' => $article->picture,
            'erasable' => $article->erasable,
        	'time' => $article->created_at
        ];
        
        return View::getAdminArticleEditView($data);
    }

    public function articleSave() {
        $v = Validator::make(Input::all(), [
            'id' => 'required|numeric',
            'title' => 'required',
            'author' => 'required',
            'taxonomy' => 'required',
            'body' => 'required',
            'picture' => 'image',
        	'time' => 'required|date'
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView($v->messages());
        }
        else if (Article::find(Input::get('id')) == null){
        	return View::getBadRequstView(
        			'no article of this id. id is '.Input::get('id'));
        }

        $article = Article::find(Input::get('id'));
        $article->title = Input::get('title');
        $article->author = Input::get('author');
        $article->taxonomy = Input::get('taxonomy');
        $article->body = Input::get('body');
        $article->created_at = Input::get('time');
        
        if (Req::hasFile('picture')){
            $filename = $this->getRandFilename();
            $article->picture = '/uploadimg/'.$filename;
            
            Req::file('picture')
            ->move(storage_path().'/../public/uploadimg', $filename);
        }
        else {
            $article->picture = '';
        }
            
        $article->save();
        
        return redirect('/admin/article');
    }

    public function articleDelete() {
        $v = Validator::make(Input::all(), [
            'id' => 'required|numeric'
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView($v->messages());
        }
        else if (Article::find(Input::get('id')) == null){
        	return View::getBadRequstView(
        			'no article of this id. id is '.Input::get('id'));
        }
        
        $article = Article::find(Input::get('id'));
        if ($article->erasable){
            $article ->delete();
        }
        
        return redirect('/admin/article');
    }

    public function articleNew() {
        
        $article = new Article();
        $article->title = '标题未填写';
        $article->author = '作者未填写';
        $article->taxonomy = 'bksjy-bkszs';
        $article->body = '文章未填写';
        $article->picture = '';
        $article->erasable = 1;
        
        $article->save();
        
        return redirect('/admin/articleEdit?id='.$article->id);
    }

    public function teacher() {
        return View::getAdminTeacherView();
    }

    public function teacherEdit() {
        $v = Validator::make(Input::all(), [
            'id' => 'required|numeric'
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView($v->messages());
        }
        else if (Teacher::find(Input::get('id')) == null){
        	return View::getBadRequstView(
        			'no teach of this id. id is '.Input::get('id'));
        }
        
        $teacher = Teacher::find(Input::get('id'));
        $data = [
            'id' => $teacher->id,
            'name' => $teacher->name,
            'picture' => $teacher->picture,
            'synopsis' => $teacher->synopsis,
            'taxonomy' => $teacher->taxonomy,
            'famous' => $teacher->famous,
            'description' => $teacher->description
        ];
        
        return View::getAdminTeacherEditView($data);
    }

    public function teacherSave() {
        $v = Validator::make(Input::all(), [
            'id' => 'required|numeric',
            'name' => 'required',
            'picture' => 'image',
            'synopsis' => 'required',
            'taxonomy' => 'required',
            'description' => 'required',
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView($v->messages());
        }
        else if (Teacher::find(Input::get('id')) == null){
        	return View::getBadRequstView(
        			'no teach of this id. id is '.Input::get('id'));
        }
        
        $teacher = Teacher::find(Input::get('id'));
        $teacher->name = Input::get('name');
        $teacher->description = Input::get('description');
        $teacher->synopsis = Input::get('synopsis');
        $teacher->famous = Input::get('famous', 0);
        $teacher->taxonomy = Input::get('taxonomy');
        
        if (Req::hasFile('picture')){
        	$filename = $this->getRandFilename();
        	$teacher->picture = '/uploadimg/'.$filename;
        	
        	Req::file('picture')
        	->move(storage_path().'/../public/uploadimg', $filename);
        }
            
        $teacher->save();
        
        return redirect('/admin/teacher');
    }

    public function teacherDelete() {
        $v = Validator::make(Input::all(), [
            'id' => 'required|numeric'
        ]);
        
        if ($v->fails()) {
            return View::getBadRequstView($v->messages());
        }
        else if (Teacher::find(Input::get('id')) == null){
        	return View::getBadRequstView(
        			'no teach of this id. id is '.Input::get('id'));
        }
        
        Teacher::find(Input::get('id'))->delete();
        
        return redirect('/admin/teacher');
    }

    public function repass() {
        $v = Validator::make(Input::all(), [
            'pass' => 'required'
        ]);
        
        if ($v->fails()) {
            return view('back.repass');
        }
        
        $pass = Input::get('pass');
        
        Auth::user()->password = Hash::make($pass);
        Auth::user()->save();
        
        return redirect('/logout');
    }

    public function teacherNew() {
        
        $teacher = new Teacher();
        $teacher->name = '姓名未填写';
        $teacher->description = '信息未填写';
        $teacher->synopsis = '简介未填写';
        $teacher->famous = 0;
        $teacher->taxonomy = 'lecturer';
        $teacher->picture = '';
        
        $teacher->save();
        
        return redirect('/admin/teacherEdit?id='.$teacher->id);
    }
    
    private function getRandFilename(){
        return str_random(16).'.jpg';
    }
    
    const TAXONOMY = [
        'bxgk-bxjj' => '本系概况-本系简介',
        'bxgk-xrld' => '本系概况-历任领导',
        'bxgk-xsjg' => '本系概况-系属机构',
        'bxgk-dzzz' => '本系概况-党政组织',
        'szdw-famous' => '师资队伍-名家风采',
        'szdw-retprof' => '师资队伍-荣休教授',
        'szdw-prof' => '师资队伍-教授',
        'szdw-asprof' => '师资队伍-副教授',
        'szdw-lecturer' => '师资队伍-讲师',
        'szdw-postdoctor' => '师资队伍-博士后',
        'bksjy-bkszs' => '本科生教育-本科生招生',
        'bksjy-bkspy' => '本科生教育-本科生培养',
        'bksjy-bksjx' => '本科生教育-本科生教学',
        'bksjy-sxwjy' => '本科生教育-双学位教育',
        'yjsjy-yjszs' => '研究生教育-研究生招生',
        'yjsjy-yjspy' => '研究生教育-研究生培养',
        'yjsjy-yjsjx' => '研究生教育-研究生教学',
        'yjsjy-yxbpx' => '研究生教育-研修班培训',
        'xwzx-zxxw' => '新闻资讯-最新新闻',
        'xwzx-tzgg' => '新闻资讯-通知公告',
        'xwzx-xwjb' => '新闻资讯-新闻季报',
        'xsjl-xsjz' => '学术交流-学术讲座',
        'xsjl-xshy' => '学术交流-学术会议',
        'xsjl-xsfw' => '学术交流-学术访问',
        'ssyd-ssly' => '师生园地-师生掠影',
        'ssyd-rzzy' => '师生园地-睿智哲言',
        'ssyd-xyzj' => '师生园地-校友之家',
    ];
    
    const TRANS_TAXONOMY = [
		'bxgk' => '本系概况',
		'bxjj' => '本系简介',
		'xrld' => '历任领导',
		'xsjg' => '系属机构',
		'dzzz' => '党政组织',
    	'szdw' => '师资队伍',
        'famous' => '名家风采',
        'retprof' => '荣休教授',
        'prof' => '教授',
        'asprof' => '副教授',
        'lecturer' => '讲师',
        'postdoctor' => '博士后',
		'bksjy' => '本科生教育',
		'bkszs' => '本科生招生',
		'bkspy' => '本科生培养',
		'bksjx' => '本科生教学',
		'sxwjy' => '双学位教育',
		'yjsjy' => '研究生教育',
		'yjszs' => '研究生招生',
		'yjspy' => '研究生培养',
		'yjsjx' => '研究生教学',
		'yxbpx' => '研修班培训',
		'xwzx' => '新闻资讯',
		'zxxw' => '最新新闻',
		'tzgg' => '通知公告',
		'xwjb' => '新闻季报',
		'xsjl' => '学术交流',
		'xsjz' => '学术讲座',
		'xshy' => '学术会议',
		'xsfw' => '学术访问',
		'ssyd' => '师生园地',
		'ssly' => '师生掠影',
		'rzzy' => '睿智哲言',
		'xyzj' => '校友之家',
	];
    
    const EDIT_TAXONOMY = [
        'bksjy-bkszs',
        'bksjy-bkspy',
        'bksjy-bksjx',
        'bksjy-sxwjy',
        'yjsjy-yjszs',
        'yjsjy-yjspy',
        'yjsjy-yjsjx',
        'yjsjy-yxbpx',
        'xwzx-zxxw',
        'xwzx-tzgg',
        'xwzx-xwjb',
        'xsjl-xsjz',
        'xsjl-xshy',
        'xsjl-xsfw',
        'ssyd-ssly',
        'ssyd-rzzy',
        'ssyd-xyzj'
    ];
    
    const TEACHER_TAXONOMY = [
        'retprof' => '荣休教授',
    	'prof' => '教授',
    	'asprof' => '副教授',
    	'lecturer' => '讲师',
    	'postdoctor' => '博士后'
    ];
}
