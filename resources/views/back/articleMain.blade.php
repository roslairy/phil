<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">文章管理</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    文章列表
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>
                                    <th>时间</th>
                                    <th>标题</th>
                                    <th>类别</th>
                                    <th>作者</th>
                                    <th>阅读</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $line)
                                <tr class="gradeX">
                                    <td>{{ $line['created_at'] }}</td>
                                    <td>{{ $line['title'] }}</td>
                                    <td>{{ $TAXONOMY[$line['taxonomy']] }}</td>
                                    <td>{{ $line['author'] }}</td>
                                    <td>{{ $line['pv'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="location.href='articleEdit?id={{ $line['id'] }}'">编辑</button>
                                        @if ($line['erasable'])
                                        <button type="button" class="btn btn-danger btn-xs" onclick="location.href='articleDelete?id={{ $line['id'] }}'">删除</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->