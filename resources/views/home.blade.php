@extends('base')

@section('content')
<div id="title"><a href=""><span>热点新闻 &gt; &gt;</span></a>
</div>
<div id="imgNews">
    <div id="fame1" class="imgShow "><img src="img/kongzi.png"></div>
    <div class="imgShow  newsIntro1" 
    @if (!empty($presses->items()[0]->picture))
    style="background-image: url('{{ $presses[0]->picture }}')"
    @endif
    ><a href="/archive/{{ $presses[0]->id }}" class="sepa1" title="{{ $presses[0]->title }}">{{ $presses[0]->title }}</a></div>
    <div class="imgShow newsIntro2"
    @if (!empty($presses->items()[1]->picture))
    style="background-image: url('{{ $presses[1]->picture }}')"
    @endif
    ><a href="/archive/{{ $presses[1]->id }}" class="newsLink bg" title="{{ $presses[1]->title }}">{{ $presses[1]->title }}</a></div>
    <div  class="imgShow newsIntro3"
    @if (!empty($presses->items()[2]->picture))
    style="background-image: url('{{ $presses[2]->picture }}')"
    @endif
    ><a href="/archive/{{ $presses[2]->id }}" class="sepa1" title="{{ $presses[2]->title }}">{{ $presses[2]->title }}</a></div>
    <div class="imgShow quote2" >
    <p>我的野心是用十句话说出别人用一本书说出的东西，一一说出别人用一本书没有说出的东西。
        <span style="float: right;">——尼采</span>
    </p></div>
    <div class="imgShow quote1" >
        <p>恭而无礼则劳，慎而无礼则葸，勇而无礼则乱，直而无礼则绞。
        <span style="float: right;">——孔子</span>
        </p>
    </div>
    <div class="imgShow newsIntro4"
    @if (!empty($presses->items()[3]->picture))
    style="background-image: url('{{ $presses[3]->picture }}')"
    @endif
    ><a href="/archive/{{ $presses[3]->id }}" class="newsLink bg1" title="{{ $presses[3]->title }}">{{ $presses[3]->title }}</a></div>
    <div class="imgShow newsIntro5"
    @if (!empty($presses->items()[4]->picture))
    style="background-image: url('{{ $presses[4]->picture }}')"
    @endif
    ><a href="/archive/{{ $presses[4]->id }}" class="sepa2" title="{{ $presses[4]->title }}">{{ $presses[4]->title }}</a></div>
    <div class="imgShow newsIntro6"
    @if (!empty($presses->items()[5]->picture))
    style="background-image: url('{{ $presses[5]->picture }}')"
    @endif
    ><a href="/archive/{{ $presses[5]->id }}" class="newsLink bg2" title="{{ $presses[5]->title }}">{{ $presses[5]->title }}</a></div>
    <div class="imgShow"><img src="img/photo.png"></div>
</div>
<div id="manyLinks">
    <div class="links1">
        <a class="linkIns">最新通知</a>
        <div class="cuts"></div>
        <ul>
            @foreach($informs as $inform)
            <li><a href="/archive/{{ $inform->id }}">• &nbsp; {{ $inform->title }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="links1">
        <a class="linkIns">学术动态</a>
        <div class="cuts"></div>
        <ul>
            @foreach($dynamics as $dynamic)
            <li><a href="/archive/{{ $dynamic->id }}">• &nbsp; {{ $dynamic->title }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="links2">
        <a class="linkIns">师生园地</a>
        <div class="cuts"></div>
        <ul>
            @foreach($teachers as $teacher)
            <li><a href="/archive/{{ $teacher->id }}">• &nbsp; {{ $teacher->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@stop