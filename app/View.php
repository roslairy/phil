<?php
namespace App;

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Log;
class View{
    
    public static function getAdminAboutView(){
        return view('back.about');
    }
    
    public static function getAdminTeacherView(){
        return view('back.teacher', [ 'data' => Teacher::all()->toArray(),
            'TAXONOMY' => Admin::TEACHER_TAXONOMY]);
    }
    
    public static function getAdminArticleView(){
        return view('back.article', [ 'data' => Article::all()->toArray(),
            'TAXONOMY' => Admin::TAXONOMY,
            'EDIT_TAXONOMY' => Admin::EDIT_TAXONOMY
          ]);
    }
    
    public static function getAdminArticleEditView($data){
        return view('back.articleEdit', [ 'data' => $data,
            'TAXONOMY' => Admin::TAXONOMY,
            'EDIT_TAXONOMY' => Admin::EDIT_TAXONOMY
          ]);
    }
    
    public static function getAdminTeacherEditView($data){
        return view('back.teacherEdit', [ 'data' => $data,
            'TAXONOMY' => Admin::TEACHER_TAXONOMY]);
    }
    
    public static function getLoginView($err){
        return view('back.login', [ 'err' => $err ]);
    }
    
    public static function getBadRequstView($msg){
    	if (!empty($msg)){
    		Log::error($msg);
    	}
        return response('错误的输入，3秒后返回。' . 
                '<script>setTimeout(function(){history.back()},3000)' . 
                '</script>', 400);
    }
}