@extends('base')

@section('content')
<div class="subNav">
    <h2>{{ $TRANS_TAXONOMY[$section] }}</h2>
    <ul class="menuBox">
    	@foreach($sorts as $s)
        <li><a id='{{ $s }}' href="/list/{{ $section }}/{{ $s }}">{{ $TRANS_TAXONOMY[$s] }}</a></li>
    	@endforeach
    </ul>
</div>
	<div class="detail">
	    <div class="location">您的位置：{{ $TRANS_TAXONOMY[$section] }} | {{ $TRANS_TAXONOMY[$sort] }}</div>
        @yield('body')
	</div>
</div>
@stop

@section('script')
$('#{{ $sort }}').addClass('sepli');
@stop