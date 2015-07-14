@extends('detail')

@section('body')
<div class="newsli">
    <ul>
    	@foreach($lists as $list)
        <li><a href="/archive/{{ $list->id }}"><div class="liicon"></div><span class='newspan1'>{{ $list->title }}</span><span class="newspan2">{{ $list->date }}</span></a></li>
    	@endforeach
    </ul>
</div>
<span class="teacher_fenye">
<a {{empty($lists->url(1)) ? '' : 'href='.$lists->url(1)}}>首页</a>
<a {{empty($lists->previousPageUrl()) ? '' : 'href='.$lists->previousPageUrl()}}>上一页</a>
<a {{empty($lists->nextPageUrl()) ? '' : 'href='.$lists->nextPageUrl()}}>下一页</a>
<a {{empty($lists->url($lists->lastPage())) ? '' : 'href='.$lists->url($lists->lastPage())}}>尾页</a> <span>页码：</span>
{{$lists->currentPage()}}
<span></span>/
<span>{{$lists->lastPage()}}</span>
@stop