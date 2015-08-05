@extends('back.base')

@section('page')
    @include('back.articleEditMain', [ 'data' => $data, 'TAXONOMY' => $TAXONOMY, 'EDIT_TAXONOMY' => $EDIT_TAXONOMY ])
@stop

@section('js')
    @include('back.formJs')
    <script type="text/javascript" charset="utf-8">
        $('a#article').addClass('active');
        $('select[name=taxonomy] option[value={{ $data['taxonomy'] }}]').attr('selected', '');
    </script>
    <script src="/laydate/laydate.js"></script>
    <script type="text/javascript" charset="utf-8">
        laydate({elem: '#time', istime: true, format: 'YYYY-MM-DD hh:mm:ss'});
        laydate.skin('molv');
    </script>
@stop