

    <!-- jQuery -->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap Inputfile -->
    <link href="/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/js/fileinput.min.js" type="text/javascript"></script>
    <script src="/js/fileinput_locale_zh.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

    <script>
        $("#fileinput").fileinput({'showUpload':false, 'previewFileType':'any',
            language: 'zh',
            maxFileCount: 1,
            allowedFileTypes: ['image']
            @if (!empty($data['picture']))
            , 
            initialPreview: [
                "<img src='{{ $data['picture'] }}' class='file-preview-image' alt='Desert' title='Desert'>"
            ]
            @endif
        });
    </script>