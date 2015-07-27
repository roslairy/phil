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

		<div class="detail_content">
		     <h3 style="text-align:center;padding-top:30px;padding-bottom:30px">{{ $name }}</h3>
		    
			<div class="teacher">
			    <div style="width: 565px;">
			    <div style="width: 25%; margin: 10px auto" >
				<img src="{{ $picture }}" style="width: 100%;" >
			    </div>
				<p style="">
					{!! $description !!}
				</p>
			</div>
		</div>

		</div>

	</div>
</div>
@stop

@section('script')
$('#{{ $sort }}').addClass('sepli');
@stop