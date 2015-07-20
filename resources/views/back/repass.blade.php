@extends('back.base')

@section('page')
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">修改密码</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    编辑框
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="repass" method="get" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>新密码</label>
                                    <input class="form-control" placeholder="Enter text" name="pass">
                                </div>
                                <button type="submit" class="btn btn-default">修改</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@stop

@section('js')
    @include('back.tableJs')
    <script type="text/javascript" charset="utf-8">
        $('a#repass').addClass('active');
    </script>
@stop