@extends('detail')

@section('body')
<div class="detail_content">
     <h3 style="text-align:center;padding-top:30px;">{{ $title }}</h3>
    <span class="content_span"><span style="padding-right:5px;margin-right:5px;">发表时间:{{ $date }}</span>|&nbsp;<span style="margin-right:5px;padding-right:5px;"> 浏览人数:{{ $pv }}</span>|&nbsp;<span> 作者：{{ $author }}</span></span>
    {!! $body !!}
</div>
@stop