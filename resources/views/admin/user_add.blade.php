@extends('layouts.admin.main')

@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><a href="#">Add User</a></li>
            </ul>

        </div>
        <div class="ms-auto">
            <a href="/admin/users" class="btn btn-danger btn-rounded px-4 rounded-pill"><i
                    class="fas fa-lg fa-fw me-10px fa-angle-left "></i> Back</a>
        </div>

    </div>

    <div class="card border-0 p-2">
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <!-- BEGIN panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Rergister</h4>
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
            <!-- END panel-heading -->
            <!-- BEGIN panel-body -->
            <div class="panel-body">
                <form id="register-form" method="POST" action="{{ route('admin.register') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required>
                            <span class="text-danger error-text name_error"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required>
                            <span class="text-danger error-text email_error"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                            <span class="text-danger error-text password_error"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="profile"
                            class="col-md-4 col-form-label text-md-end">{{ __('Upload Profile') }}</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="profile" id="profile">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END panel-body -->

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// $('#app').addClass('app-content-full-height');
$('#settings-page').addClass('active');

// app-sidebar-minified app-content-full-height
$(document).ready(function() {
    $('#register-form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formData = new FormData(this); // Use FormData to handle file uploads

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            contentType: false, // Important for file upload
            processData: false, // Important for file upload
            beforeSend: function() {
                $('.error-text').text(''); // Clear previous errors
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = response.redirect; // Redirect after success
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) { // Validation errors
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]); // Display errors
                    });
                } else {
                    alert("Something went wrong. Please try again.");
                }
            }
        });
    });
});
</script>
@endpush