@extends('back.base')

@section('page')
    @include('back.articleMain', [ 'data' => $data, 'TAXONOMY' => $TAXONOMY, 'EDIT_TAXONOMY' => $EDIT_TAXONOMY ])
@stop

@section('js')
    @include('back.tableJs')
    <script type="text/javascript" charset="utf-8">
        $('a#article').addClass('active');
        $('.click-tax').click(function(){
        	window.table.search($(this).text()).draw();
        })
    </script>
@stop