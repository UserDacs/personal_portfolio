@extends('layouts.admin.main')

@section('content')
<div id="content" class="app-content p-0">
    <!-- BEGIN mailbox -->
    <div class="mailbox">
        <!-- BEGIN mailbox-sidebar -->

        <!-- END mailbox-sidebar -->
        <!-- BEGIN mailbox-content -->
        <div class="mailbox-content" style="max-width:100% !important">
            <div class="mailbox-content-header">
                <!-- BEGIN btn-toolbar -->
                <div class="btn-toolbar align-items-center">

                    <div class="dropdown me-2">
                        <button class="btn btn-white btn-sm" data-bs-toggle="dropdown">
                            View All <span class="caret ms-3px"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2"></i>
                                All</a>
                            <a href="javascript:;" class="dropdown-item"><i
                                    class="fa fa-circle fs-9px fa-fw me-2 text-muted"></i> Unread</a>
                            <a href="javascript:;" class="dropdown-item"><i
                                    class="fa fa-circle fs-9px fa-fw me-2 text-blue"></i> Contacts</a>
                            <a href="javascript:;" class="dropdown-item"><i
                                    class="fa fa-circle fs-9px fa-fw me-2 text-success"></i> Groups</a>
                            <a href="javascript:;" class="dropdown-item"><i
                                    class="fa fa-circle fs-9px fa-fw me-2 text-warning"></i> Newsletters</a>
                            <a href="javascript:;" class="dropdown-item"><i
                                    class="fa fa-circle fs-9px fa-fw me-2 text-danger"></i> Social updates</a>
                            <a href="javascript:;" class="dropdown-item"><i
                                    class="fa fa-circle fs-9px fa-fw me-2 text-indigo"></i> Everything else</a>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-white me-2"><i class="fa fa-redo"></i></button>
                    <div class="w-100 d-sm-none d-block mb-2 hide" data-email-action="divider"></div>
                    <!-- BEGIN btn-group -->
                    <div class="btn-group">
                        <button class="btn btn-sm btn-white hide" data-email-action="delete"><i
                                class="fa fa-times me-1"></i> <span class="hidden-xs">Delete</span></button>
                        <button class="btn btn-sm btn-white hide" data-email-action="archive"><i
                                class="fa fa-folder me-1"></i> <span class="hidden-xs">Archive</span></button>
                        <button class="btn btn-sm btn-white hide" data-email-action="archive"><i
                                class="fa fa-trash me-1"></i> <span class="hidden-xs">Junk</span></button>
                    </div>
                    <!-- END btn-group -->
                    <!-- BEGIN btn-group -->
                    <div class="btn-group ms-auto">
                        <button class="btn btn-white btn-sm">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-white btn-sm">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <!-- END btn-group -->
                </div>
                <!-- END btn-toolbar -->
            </div>

            <div class="mailbox-content-body">
                <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
                    <!-- BEGIN list-email -->
                    <ul class="list-group list-group-lg no-radius list-email">
                        <li class="list-group-item bg-gray-100">

                            <a href="email_detail.html" class="email-user bg-gray-100 h-40px w-40px">

                            </a>
                            <div class="email-info">
                                <a href="email_detail.html">
                                    <span class="email-sender"><strong style="color: #263238 !important;"
                                            class="">NAME</strong></span>
                                    <span class="email-title"><strong style="color: #263238 !important;"
                                            class="">SUBJECT</strong></span>
                                    <span class="email-desc"><strong style="color: #263238 !important;"
                                            class="">MESSAGE</strong></span>
                                    <span class="email-time" style="width: 220px !important;"><strong
                                            style="color: #263238 !important;" class="">DATE TIME</strong></span>
                                </a>
                            </div>
                        </li>
                        @if($data)
                        @foreach($data as $message)

                        <li class="list-group-item unread">

                            <div class="d-flex align-items-center">
                                <div
                                    class="h-40px w-40px d-flex align-items-center justify-content-center position-relative">
                                    <img src="/letters/{{$message->sender_name_letter}}.png" class="mw-100 mh-100">
                                    @if($message->unread_count != 0)
                                    <span
                                        class="w-20px h-20px p-0 d-flex align-items-center justify-content-center badge bg-danger text-white position-absolute end-0 top-0 fw-bold fs-12px rounded-pill mt-n2 me-n2">{{$message->unread_count}}</span>

                                    @endif

                                </div>
                            </div>
                            -
                            <div class="email-info">
                                <a href="/admin/inbox/detail/{{$message->channel_name}}/{{$message->email_subject}}">
                                    <span class="email-sender">{{$message->sender_name}}</span>
                                    <span class="email-title">{{$message->channel_name}}</span>
                                    <span class="email-desc">
                                        {{ strip_tags(str_replace("<br>", ' ', $message->email_body)) }}
                                    </span>
                                    <span class="email-time"
                                        style="width: 220px !important;">{{$message->formatted_created_at}}
                                        {{$message->no_year_created_at}}</span>

                                </a>
                            </div>

                        </li>

                        @endforeach

                        @else

                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            No data
                        </li>

                        @endif
    
                    </ul>
                    <!-- END list-email -->
                </div>
            </div>
            <div class="mailbox-content-footer d-flex align-items-center">
                <div class="text-dark fw-bold">1,232 messages</div>
                <div class="btn-group ms-auto">
                    <button class="btn btn-white btn-sm">
                        <i class="fa fa-fw fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-white btn-sm">
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- END mailbox-content -->
    </div>
    <!-- END mailbox -->
</div>

@endsection

@push('scripts')
<script>
$('#app').addClass('app-content-full-height');
$('#inbox-page').addClass('active');

// app-sidebar-minified app-content-full-height
</script>
@endpush