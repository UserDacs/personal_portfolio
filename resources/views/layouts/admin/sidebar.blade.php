<div id="sidebar" class="app-sidebar" data-disable-slide-animation="true" data-bs-theme="dark">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">



            <div class="menu-item" id="dashboard">
                <a href="/admin" class="menu-link">
                    <div class="menu-icon">
                        <i class="material-icons">home</i>
                    </div>
                    <div class="menu-text">Dashboard </div>
                </a>
            </div>
            <div class="menu-item" id="inbox-page">
                <a href="{{ route('admin.inbox') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="material-icons">inbox</i>
                    </div>
                    <div class="menu-text">Inbox</div>
                </a>
            </div>

            <!-- <div class="menu-item" id="profile-page">
                <a href="/admin/profile" class="menu-link">
                    <div class="menu-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="menu-text">Profile page</div>
                </a>
            </div> -->


            <div class="menu-item" id="files-page">
                <a href="/admin/files" class="menu-link">
                    <div class="menu-icon">
                        <i class="material-icons">folder</i>
                    </div>
                    <div class="menu-text">Files</div>
                </a>
            </div>

            <div class="menu-item" id="users-page">
                <a href="/admin/users" class="menu-link">
                    <div class="menu-icon">
                        <i class="material-icons">groups</i>
                    </div>
                    <div class="menu-text">Users</div>
                </a>
            </div>

            <div class="menu-item" id="settings-page">
                <a href="/admin/settings" class="menu-link">
                    <div class="menu-icon">
                        <i class="material-icons">settings</i>
                    </div>
                    <div class="menu-text">Settings</div>
                </a>
            </div>


            <!-- BEGIN minify-button -->
            <div class="menu-item d-flex">
                <a href="javascript:;"
                    class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none"
                    data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>
            <!-- END minify-button -->
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>