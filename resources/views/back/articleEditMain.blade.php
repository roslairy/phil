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
                            <form role="form" action="articleSave" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                <div class="form-group">
                                    <label>标题</label>
                                    <input class="form-control" placeholder="Enter text" name="title" value="{{ $data['title'] }}" 
                                    @if (!$data['erasable'])
                                    readonly="readonly" 
                                    @endif
                                    >
                                </div>
                                <div class="form-group">
                                    <label>作者</label>
                                    <input class="form-control" placeholder="Enter text" name="author" value="{{ $data['author'] }}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label>发布时间</label>
                                    <input class="form-control" id="time" name="time" type="text" value="{{ $data['time'] }}" />
                                </div>
                                <div class="form-group" >
                                    <label>栏目</label>
                                    <select class="form-control" name="taxonomy" 
                                    @if (!$data['erasable'])
                                    readonly="readonly" 
                                    @endif
                                    >
                                        @if (!$data['erasable'])
                                        <option value="{{ $data['taxonomy'] }}">{{ $TAXONOMY[$data['taxonomy']] }}</option>
                                        @else
                                        @foreach($EDIT_TAXONOMY as $key)
                                        <option value="{{ $key }}">{{ $TAXONOMY[$key] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>正文</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script id="ue-container" name="body" type="text/plain">
                                        {!! $data['body'] !!}
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label>新闻图片</label>
                                    <span class="text-danger"> &nbsp; *如果是最新新闻请在此设置主页显示图片</span>
                                    <input id="fileinput" name="picture" type="file" class="file"/>
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
                                //设置编辑器的内容
                                //ue.setContent('');
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