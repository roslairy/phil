@extends('base')

@section('content')
<div class="subNav">
    <h2>{{ $TRANS_TAXONOMY[$section] }}</h2>
    <ul class="menuBox">
    	@foreach($sorts as $s)
        <li><a id='{{ $s }}' href="/teacherList/{{ $s }}">{{ $TRANS_TAXONOMY[$s] }}</a></li>
    	@endforeach
    </ul>
</div>
	<div class="detail">
	    <div class="location">您的位置：{{ $TRANS_TAXONOMY[$section] }} | {{ $TRANS_TAXONOMY[$sort] }}</div>
		<div class="teacher">
		    <ul>
		    	@foreach($teachers as $teacher)
		        <li>
		            <div class="li_div"><a href=""><img src="{{$teacher->picture}}"></a></div>
		            <div class="teacher_info">
		                <h4>{{$teacher->name}}</h4>
		                <p>
		                    {{$teacher->synopsis}}
		                </p>
		                <a href="/teacher/{{$teacher->id}}">查看更多>></a>
		            </div>
		        </li>
		    	@endforeach
		    </ul>
            <span class="teacher_fenye">
            <a {{empty($teachers->url(1)) ? '' : 'href='.$teachers->url(1)}}>首页</a>
            <a {{empty($teachers->previousPageUrl()) ? '' : 'href='.$teachers->previousPageUrl()}}>上一页</a>
            <a {{empty($teachers->nextPageUrl()) ? '' : 'href='.$teachers->nextPageUrl()}}>下一页</a>
            <a {{empty($teachers->url($teachers->lastPage())) ? '' : 'href='.$teachers->url($teachers->lastPage())}}>尾页</a> <span>页码：</span>
            {{$teachers->currentPage()}}
            <span></span>/
            <span>{{$teachers->lastPage()}}</span>
		</div>

	</div>
</div>
@stop

@section('script')
$('#{{ $sort }}').addClass('sepli');
@stop