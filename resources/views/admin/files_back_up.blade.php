@extends('layouts.admin.main')


@push('style')
<link href="{{asset('assets/plugins/jstree/dist/themes/default/style.min.css')}}" rel="stylesheet" />
<style>
.col-md-9 {
    display: flex !important;
    justify-content: center !important;
    /* Centers horizontally */
    align-items: center !important;
    /* Centers vertically */
    height: 100vh !important;
    /* Optional: Adjust height as needed */
}

#pdf-canvas {
    max-width: 100% !important;
    /* Ensures canvas does not overflow */
    max-height: 100% !important;
    /* Ensures canvas fits within the container */
}
</style>
@endpush


@section('content')
<!-- BEGIN #content -->
<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Files</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Files</h1>
    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Directory tree</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                        class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                        class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body shadow">
            <div class="row ">
                <div class="col-md-3 bg-silver-400">
                    <div id="jstree-default">
                        <ul>
                            <li>
                                Mark Emil Dacoylo
                                <ul>
                                    <li data-jstree='{ "icon" : "fa fa-circle-plus text-gray-300" }'>
                                        <a href="#" class="add-new">Click New folder or file</a>
                                    </li>
                                    <li>Images
                                        <ul>
                                            <li data-jstree='{ "icon" : "fa fa-circle-plus text-gray-300" }'>
                                                <a href="#" class="add-new">Click New folder or file</a>
                                            </li>
                                            <li data-jstree='{ "icon" : "fa fa-image text-danger" }'>
                                                <a href="files/sample.pdf" target="_blank">pro.png</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-9 bg-black-100">
                    <canvas id="pdf-canvas" width="1900" height="600"></canvas>

                </div>
            </div>

        </div>
    </div>
    <!-- END panel -->
</div>
<!-- END #content -->

@endsection

@push('scripts')
<!-- ================== BEGIN page-js ================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="{{asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js')}}"></script>
<script src="{{asset('assets/js/demo/render.highlight.js')}}"></script>
<script src="{{asset('assets/plugins/jstree/dist/jstree.min.js')}}"></script>
<script src="{{asset('assets/js/demo/ui-tree.demo.js')}}"></script>
<!-- ================== END page-js ================== -->
<script>
$('#files-page').addClass('active');

$('#jstree-default').jstree({
    core: {
        check_callback: true
    }
});

$('#jstree-default').on('click', '.add-new', function (e) {
    e.preventDefault();

    const $parentLi = $(this).closest('li');
    const parentNodeId = $parentLi.attr('id') || $parentLi.closest('li').attr('id');

    console.log(parentNodeId);
    

    // Avoid duplicate input creation
    if ($parentLi.find('input.new-entry').length) return;

    // Create input field for file or folder name
    const $input = $('<input type="text" class="new-entry" placeholder="Enter name" style="margin-left: 10px;"/>');
    $parentLi.append($input);
    $input.focus();

    $input.on('blur keypress', function (event) {
        if (event.type === 'blur' || event.which === 13) {
            const name = $input.val().trim();
            if (!name) {
                $input.remove();
                return;
            }

            const newId = `${parentNodeId}_${Math.random().toString(36).substr(2, 9)}`;
            const isFile = name.includes('.');

            // Add new item node in jstree
            $('#jstree-default').jstree().create_node(parentNodeId, {
                id: newId,
                text: name,
                icon: isFile ? 'fa fa-file text-primary' : 'fa fa-folder text-success'
            });

            // Ensure the "Click New folder or file" remains
            const newPromptId = `${newId}_prompt`;
            $('#jstree-default').jstree().create_node(parentNodeId, {
                id: newPromptId,
                text: '<a href="#" class="add-new">Click New folder or file</a>',
                icon: 'fa fa-circle-plus text-gray-300'
            });

            $input.remove();
        }
    });
});

// app-sidebar-minified app-content-full-height
var url = '/pdf/MarkEmilDacoylo.pdf';

// Asynchronously downloads PDF.
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    renderPage(1);
});

function renderPage(num) {
    pdfDoc.getPage(num).then(function(page) {
        var canvas = document.getElementById("pdf-canvas");
        var context = canvas.getContext('2d');
        var viewport = page.getViewport({
            scale: 1
        });

        canvas.height = viewport.height;
        canvas.width = viewport.width;

        page.render({
            canvasContext: context,
            viewport: viewport
        });
    });
}

</script>
@endpush