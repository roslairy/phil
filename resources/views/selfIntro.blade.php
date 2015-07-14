@extends('base')

@section('content')
<div class="subNav">
    <h2>{{ $TRANS_TAXONOMY[$section] }}</h2>
    <ul class="menuBox">
    	@for($i = 0; $i < 4; $i++)
        <li><a id='{{ $sorts[$i] }}' href="/archive/{{ $i + 1 }}">{{ $TRANS_TAXONOMY[$sorts[$i]] }}</a></li>
    	@endfor
    </ul>
</div>
	<div class="detail">
	    <div class="location">您的位置：{{ $TRANS_TAXONOMY[$section] }} | {{ $TRANS_TAXONOMY[$sort] }}</div>
		<div class="detail_content">
		     <h3 style="text-align:center;padding-top:30px;">{{ $title }}</h3>
		    <span class="content_span"><span style="border-right:1px solid #a0a0a0;padding-right:5px;margin-right:5px;">发表时间:{{ $date }}</span><span style="border-right:1px solid #a0a0a0;margin-right:5px;padding-right:5px;">浏览人数:{{ $pv }}</span><span>作者：{{ $author }}</span></span>
		    <p>{!! $body !!}</p>
		</div>
	</div>
</div>
@stop

@section('script')
$('#{{ $sort }}').addClass('sepli');
@stop