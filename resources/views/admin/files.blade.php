@extends('layouts.admin.main')


@push('style')

<!-- ================== BEGIN page-css ================== -->
<link href="{{asset('assets/plugins/blueimp-gallery/css/blueimp-gallery.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/blueimp-file-upload/css/jquery.fileupload.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/blueimp-file-upload/css/jquery.fileupload-ui.css')}}" rel="stylesheet" />
<style>
    #alert-box {
        position: fixed !important;
        top: 20px !important;
        right: 20px !important;
        z-index: 1050 !important; /* Ensures it stays above other elements */
        width: auto !important;
        max-width: 300px !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
    }
</style>

<!-- ================== END page-css ================== -->
@endpush


@section('content')
@if(session('success'))
    <div id="alert-box" class="alert alert-primary alert-dismissible fade show">
    {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <script>
    setTimeout(() => {
        let alertBox = document.getElementById("alert-box");
        if (alertBox) {
            alertBox.classList.remove("show"); // Bootstrap fade-out effect
            setTimeout(() => alertBox.remove(), 500); // Remove from DOM after fade-out
        }
    }, 3000); // 3 seconds
</script>

@endif

<!-- BEGIN #content -->
<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">File Upload</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">File Upload <small></small></h1>
    <!-- END page-header -->

    <!-- BEGIN form-file-upload -->
    <form id="fileupload" action="/admin/uploadMulti" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- BEGIN panel -->
        <div class="panel panel-inverse">
            <!-- BEGIN panel-heading -->
           

            <div class="panel-body">
                <div class="row fileupload-buttonbar">
                    <div class="col-xl-7">
                        <span class="btn btn-primary fileinput-button me-1">
                            <i class="fa fa-fw fa-plus"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple>
                        </span>
                        <button type="submit" class="btn btn-primary start me-1">
                            <i class="fa fa-fw fa-upload"></i>
                            <span>Start upload</span>
                        </button>
                        <!-- <button type="reset" class="btn btn-default cancel me-1">
                            <i class="fa fa-fw fa-ban"></i>
                            <span>Cancel upload</span>
                        </button> -->
                        <button type="button" class="btn btn-default delete me-1">
                            <i class="fa fa-fw fa-trash"></i>
                            <span>Delete</span>
                        </button>
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-xl-5 fileupload-progress fade d-none d-xl-block">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- END panel-body -->
            <!-- BEGIN table -->
            <div class="table-responsive">
                <table class="table table-panel text-nowrap mb-0">
                    <thead>
                        <tr>
                            <th width="10%">PREVIEW</th>
                            <th>FILE INFO</th>
                            <th>UPLOAD PROGRESS</th>
                            <th width="1%"></th>
                        </tr>
                    </thead>
                    <tbody class="files">
                        <tr data-id="empty">
                            <td colspan="4" class="text-center text-gray-500 py-30px">
                                <div class="mb-10px"><i class="fa fa-file fa-3x"></i></div>
                                <div class="fw-bold">No file selected</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- END panel -->
    </form>
    <!-- END form-file-upload -->
</div>
<!-- END #content -->

@endsection

@push('scripts')
<!-- ================== BEGIN page-js ================== -->

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-upload fade show">
			<td>
				<span class="preview"></span>
			</td>
			<td>
				<div class="bg-light rounded p-3 mb-2">
					<dl class="mb-0">
						<dt class="text-dark">File Name:</dt>
						<dd class="name">{%=file.name%}</dd>
						<hr />
						<dt class="text-dark mt-10px">File Size:</dt>
						<dd class="size mb-0">Processing...</dd>
                        
					</dl>
				</div>
				<strong class="error text-danger h-auto d-block text-left"></strong>
			</td>
			<td>
				<dl>
					<dt class="text-dark mt-3px">Progress:</dt>
					<dd class="mt-5px">
						<div class="progress progress-sm progress-striped active rounded-pill"><div class="progress-bar progress-bar-primary" style="width:0%; min-width: 40px;">0%</div></div>
					</dd>
				</dl>
			</td>
			<td nowrap>
				{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-primary start w-100px pe-20px mb-2 d-block" disabled>
						<i class="fa fa-upload fa-fw text-dark"></i>
						<span>Start</span>
					</button>
				{% } %}
				{% if (!i) { %}
					<button class="btn btn-default cancel w-100px pe-20px d-block">
						<i class="fa fa-trash fa-fw text-muted"></i>
						<span>Cancel</span>
					</button>
				{% } %}
			</td>
		</tr>
		{% } %}
	</script>

<!-- The template to display files available for download -->
<!-- Assuming this is the Blade view that renders the file upload template -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %} 
        <tr class="template-download fade show">
            <td width="1%">
            <span class="preview">
                {% if (file.thumbnailUrl) { %} 
                    <a href="/storage/profiles/{%= file.name %}" class="text-gray-600" target="_blank" title="{%= file.name %}" download="{%= file.name %}" data-gallery>
                        <img src="{%= file.thumbnailUrl %}" class="rounded" style="min-width: 350px; max-width: 350px; min-height: 145px; max-height: 145px; width: auto; height: auto; object-fit: contain">
                    </a>
                {% } else if (file.name) { %}
                    {% 
                        var fileName = file.name; 
                        var fileExtension = fileName.split('.').pop().toLowerCase();
                    %}
                    
                    {% if (fileExtension === 'mp4') { %}
                        <a href="/storage/profiles/{%= file.name %}" class="text-gray-600" target="_blank" title="{%= file.name %}" download="{%= file.name %}" data-gallery>
                            <video width="350" height="145" controls>
                                <source src="{%= file.url %}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    {% } else if (fileExtension === 'pdf' || fileExtension === 'docx') { %}
                        <a href="/storage/profiles/{%= file.name %}" class="text-gray-600" target="_blank" title="{%= file.name %}" download="{%= file.name %}" data-gallery>
                            <div class="mb-10px" style="display: flex; justify-content: center; align-items: center; height: 145px;">
                                <i class="fa fa-file-pdf fa-3x"></i>
                            </div>
                        </a>
                    {% } else { %}
                        <a href="/storage/profiles/{%= file.name %}" class="text-gray-600" target="_blank" title="{%= file.name %}" download="{%= file.name %}" data-gallery>
                            <img src="{%= file.thumbnailUrl %}" class="rounded" style="min-width: 350px; max-width: 350px; min-height: 145px; max-height: 145px; width: auto; height: auto; object-fit: contain">
                        </a>
                    {% } %}
                {% } %}
            </span>
            </td>
            <td>
                <div class="bg-light p-3 mb-2">
                    <dl class="mb-0">
                        <dt class="text-dark">File Name:</dt>
                        <dd class="name">
                            {% if (file.url) { %} 
                                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                            {% } else { %} 
                                <span>{%=file.name%}</span>
                            {% } %} 
                        </dd>
                        <hr />
                        <dt class="text-dark mt-10px">File Size:</dt>
                        <dd class="size mb-0">{%=o.formatFileSize(file.size)%}</dd>
                        <dd class="size mb-0">
                            <form class="row row-cols-lg-auto g-3 align-items-center" action="/admin/updateStatus" method="POST">
                             @csrf
                                <input type="hidden" name="id" value="{%=file.id%}">
								<div class="col-12">
									 <select id="defaultSelect2" class="default-select2 form-control mt-2" style="width:150px !important;" name="role_type" >
                                        <option value="">-- select type --</option>    
                                        <option value="profile">profile</option>
                                        <option value="cover">cover</option>
                                        <option value="aboutme">aboutme</option>
                                        <option value="project">project</option>
                                    </select>
								</div>
								<div class="col-12">
									<select id="statusSelect2" class="status-select2 form-control mt-2" style="width:90px !important;" name="status">
                                        <option value="active" data-color="blue">Active</option>
                                        <option value="unactive" data-color="red">Unactive</option>
                                    </select>
								</div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm w-80px rounded-pill" style="margin-top:15px !important;">Edit</button>
                                </div>
								
							</form>
                        </dd>
                    </dl>
                    {% if (file.error) { %} 
                        <hr />
                        <div><span class="badge bg-danger me-1">ERROR</span> {%=file.error%}</div>
                    {% } %} 
                </div>
            </td>
            <td></td>
            <td>
                {% if (file.deleteUrl) { %} 
                    <form action="/admin/users/{%=file.name%}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100px mb-2 pe-20px">
                        <i class="fa fa-trash float-start fa-fw text-dark mt-2px"></i>
                        <span>Delete</span>
                    </button>
                    </form>

                   
                {% } else { %} 
                    <button class="btn btn-default cancel w-100px me-3px pe-20px">
                        <i class="fa fa-trash float-start fa-fw text-muted mt-2px"></i>
                        <span>Cancel</span>
                    </button>
                {% } %} 
            </td>
        </tr>
    {% } %} 
</script>
<!-- ================== BEGIN page-js ================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tmpl/1.0.0/jquery.tmpl.min.js"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-tmpl/js/tmpl.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-load-image/js/load-image.all.min.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js')}}"></script>
<script src="{{asset('assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js')}}"></script>
<script src="{{asset('assets/js/demo/form-multiple-upload.demo.js')}}"></script>
<script src="{{asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js')}}"></script>
<script src="{{asset('assets/js/demo/render.highlight.js')}}"></script>
<!-- ================== END page-js ================== -->
<script>
// Fetch the uploaded files data from PHP to JavaScript
var uploadedFiles = @json($files); // Convert the PHP files array to JavaScript

// Format the files for Blueimp template
var formattedFiles = uploadedFiles.map(function(file) {
    var fileExtension = file.name.split('.').pop().toLowerCase();
    return {
        id: file.id,
        name: file.name,
        size: file.size,
        url: file.url, // Adjust to your column storing the file URL
        thumbnailUrl: file.url, // Adjust thumbnail logic as needed
        deleteUrl: "/admin/users/" + file.name,
        deleteType: 'DELETE',
        fileExtension: fileExtension,
        type: file.type,
        status: file.status
    };
});

// Function to render the table rows dynamically
function renderTableRow(file) {
    return `
        <tr class="template-download fade show in">
            <td width="1%">
                <span class="preview">
                    <a href="/storage/profiles/${file.name}" class="text-gray-600" target="_blank" title="${file.name}" download="${file.name}" data-gallery>
                    ${
                        (file.fileExtension === 'mp4') ? 
                        `<video width="350" height="145" controls>
                            <source src="${file.url}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>` :
                        (file.fileExtension === 'pdf' || file.fileExtension === 'docx') ? 
                        `<div class="mb-10px" style="display: flex; justify-content: center; align-items: center; height: 145px;">
                            <i class="fa fa-file-pdf fa-3x"></i>
                        </div>` :
                        `<img src="${file.thumbnailUrl}" class="rounded" style="min-width: 350px; max-width: 350px; min-height: 145px; max-height: 145px; width: auto; height: auto; object-fit: contain">`
                    }
                </a>
                </span>
            </td>
            <td>
                <div class="bg-light p-3 mb-2">
                    <dl class="mb-0">
                        <dt class="text-dark">File Name:</dt>
                        <dd class="name">
                            <a href="/storage/profiles/${file.name}" title="${file.name}" download="${file.name}">
                                ${file.name}
                            </a>
                        </dd>
                        <hr>
                        <dt class="text-dark mt-10px">File Size:</dt>
                        <dd class="size mb-0">${formatFileSize(file.size)}</dd>
                        <hr>
                        <dd class="size mb-0">
                             <form class="row row-cols-lg-auto g-3 align-items-center" action="/admin/updateStatus" method="POST">
                             @csrf
                                <input type="hidden" name="id" value="${file.id}">
								<div class="col-12">
									 <select id="defaultSelect2" class="default-select2 form-control mt-2" style="width:150px !important;" name="role_type" >
                                        <option value="">-- select type --</option>    
                                        <option ${(file.type == 'profile') ? 'selected' : ''} value="profile">profile</option>
                                        <option ${(file.type == 'cover') ? 'selected' : ''} value="cover">cover</option>
                                        <option ${(file.type == 'aboutme') ? 'selected' : ''} value="aboutme">aboutme</option>
                                        <option ${(file.type == 'project') ? 'selected' : ''} value="project">project</option>
                                    </select>
								</div>
								<div class="col-12">
									<select id="statusSelect2" class="status-select2 form-control mt-2" style="width:90px !important;" name="status">
                                        <option ${(file.status == 'active') ? 'selected' : ''} value="active" data-color="blue">Active</option>
                                        <option ${(file.status == 'unactive') ? 'selected' : ''}  value="unactive" data-color="red">Unactive</option>
                                    </select>
								</div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm w-80px rounded-pill" style="margin-top:15px !important;">Edit</button>
                                </div>
								
							</form>
                        </dd>
                    </dl>
                </div>
            </td>
            <td></td>
            <td>
                <form action="/admin/users/${file.name}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100px mb-2 pe-20px">
                        <i class="fa fa-trash float-start fa-fw text-dark mt-2px"></i>
                        <span>Delete</span>
                    </button>
                </form>
                
            </td>
        </tr>
    `;
}

function formatFileSize(bytes) {
    if (bytes === 0) return "0 Bytes";
    const sizes = ["Bytes", "KB", "MB", "GB", "TB"];
    const i = Math.floor(Math.log(bytes) / Math.log(1024));
    return (bytes / Math.pow(1024, i)).toFixed(2) + " " + sizes[i];
}

	
	

// Clear the table body before appending new data
$('.files').empty();

// Render and append the rows to the table
formattedFiles.forEach(function(file) {
    var row = renderTableRow(file);
    $('.files').append(row);

});
</script>
<script>
$('#files-page').addClass('active');
</script>

@endpush