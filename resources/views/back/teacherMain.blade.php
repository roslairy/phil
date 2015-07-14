<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">教师管理</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    教师列表
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>姓名</th>
                                    <th>职称</th>
                                    <th>简介</th>
                                    <th>名家风采</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $line)
                                <tr class="gradeX">
                                    <td>{{$line['id']}}</td>
                                    <td>{{$line['name']}}</td>
                                    <td>{{$TAXONOMY[$line['taxonomy']]}}</td>
                                    <td>{{$line['synopsis']}}</td>
                                    <td>{{!empty($line['famous']) ? '是' : '否'}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-xs" onclick="location.href='teacherEdit?id={{ $line['id'] }}'">编辑</button>
                                        <button type="button" class="btn btn-danger btn-xs" onclick="location.href='teacherDelete?id={{ $line['id'] }}'">删除</button>
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