@extends('back.base')

@section('page')
    @include('back.teacherEditMain', [ 'data' => $data ])
@stop

@section('js')
    @include('back.formJs')
    <script type="text/javascript" charset="utf-8">
        $('a#teacher').addClass('active');
        $('select[name=taxonomy] option[value={{ $data['taxonomy'] }}]').attr('selected', '');
    </script>
@stop