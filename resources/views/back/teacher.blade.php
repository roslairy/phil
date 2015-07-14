@extends('back.base')

@section('page')
    @include('back.teacherMain', [ 'data' => $data ])
@stop

@section('js')
    @include('back.tableJs')
    <script type="text/javascript" charset="utf-8">
        $('a#teacher').addClass('active');
    </script>
@stop