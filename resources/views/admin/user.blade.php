@extends('layouts.admin.main')

@section('content')

<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><a href="#">Users</a></li>
            </ul>

        </div>
        <div class="ms-auto">
            <a href="/admin/user-admin" class="btn btn-primary btn-rounded px-4 rounded-pill"><i
                    class="fa fa-plus fa-lg me-2 ms-n2 "></i> Add User</a>
        </div>
    </div>

    <div class="card border-0 p-2">
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN input-group -->
                <div class="input-group mb-3">

                    <div class="flex-fill position-relative">
                        <div class="input-group">
                            <div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0 start-0"
                                style="z-index: 1;">
                                <i class="fa fa-search opacity-5"></i>
                            </div>
                            <input type="text" class="form-control px-35px bg-light" placeholder="Search ..." />
                        </div>
                    </div>
                </div>
                <!-- END input-group -->

                <!-- BEGIN table -->
                <div class="table-responsive mb-3">
                    <table class="table table-hover table-panel text-nowrap align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                
                                <th width="">Name</th>
                                <th width="15%">Created Date</th>
                                <th width="10%">Role</th>
                                <th width="10%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="user-table-body">
                            <!-- Data will be loaded here dynamically -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-md-flex align-items-center">
                    <div class="me-md-auto text-md-left text-center mb-2 mb-md-0" id="pagination-info">
                        Showing 1 to 10 of 57 entries
                    </div>
                    <ul class="pagination mb-0 justify-content-center" id="pagination-links">
                        <!-- Pagination Links Will Be Loaded Here -->
                    </ul>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection

@push('scripts')
<script>
// $('#app').addClass('app-content-full-height');
$('#users-page').addClass('active');
$(document).ready(function() {
    function fetchUsers(page = 1) {
        $.ajax({
            url: "{{ route('admin.users.list') }}",
            type: "GET",
            data: {
                page: page
            },
            success: function(response) {
                // Append users data to the table body
                let usersTable = "";
                response.data.forEach(function(user) {
                    usersTable += `
                        <tr>
                            
                            <td>${user.id}</td>
                            <td>${user.name}</td>
                            <td>${user.created_at}</td>
                            <td>${user.role}</td>
                            <td>
                                <span class='badge border border-${user.status === 'Active' ? 'success' : 'danger'} text-${user.status === 'Active' ? 'success' : 'danger'} px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center'>
                                    <i class='fa fa-circle fs-9px fa-fw me-5px'></i> ${user.status}
                                </span>
                            </td>
                            <td>
                                <a href='/admin/profile/${user.id}' class='btn btn-success btn-icon btn-circle btn-sm'><i class='fa fa-file'></i></a>
                                <a href='javascript:;' class='btn btn-warning btn-icon btn-circle btn-sm'><i class='fa fa-pencil'></i></a>
                                <a href='javascript:;' class='btn btn-danger btn-icon btn-circle btn-sm'><i class='fa fa-trash'></i></a>
                            </td>
                        </tr>
                    `;
                });

                // Insert new rows into table
                $('#user-table-body').html(usersTable);

                // Update pagination links and info
                $('#pagination-links').html(response.pagination);
                $('#pagination-info').text(response.paginationInfo);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("Failed to load users.");
            }
        });
    }

    fetchUsers(); // Initial fetch

    // Handle pagination click
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        let page = $(this).data("page");
        fetchUsers(page);
    });
});
// app-sidebar-minified app-content-full-height
</script>
@endpush