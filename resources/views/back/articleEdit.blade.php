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
@stop