<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">文章编辑</h1>
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
                            <form role="form" action="teacherSave" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                <div class="form-group">
                                    <label>姓名</label>
                                    <input class="form-control" placeholder="Enter text" name="name" value="{{ $data['name'] }}" >
                                </div>
                                <div class="form-group">
                                    <label>名家风采</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="famous" value="1"
                                            @if(!empty($data['famous']))
                                            checked
                                            @endif
                                            >名家风采
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>类型</label>
                                    <select class="form-control" name="taxonomy" >
                                        @foreach($TAXONOMY as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>简介</label>
                                    <input class="form-control" placeholder="Enter text" name="synopsis" value="{{ $data['synopsis'] }}" >
                                </div>
                                <div class="form-group">
                                    <label>照片</label>
                                    <input id="fileinput" name="picture" type="file" class="file"/>
                                </div>
                                <div class="form-group">
                                    <label>正文</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script id="ue-container" name="description" type="text/plain">
                                        $data['description']
                                    </script>
                                </div>
                                <button type="submit" class="btn btn-default">发表</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('ue-container');
                            ue.ready(function() {
                                ue.setHeight(300);
                            });
                        </script>
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