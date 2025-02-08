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
            <div class="mailbox-content-body overflow-scroll">

                <div class="table-responsive">
                    <table class="table mb-0 ">

                        <tbody>
                            <tr style="text-align: center !important;">
                                <td width="2%" ></td>
                                <td width="17%" style="vertical-align: middle !important;  text-align: left !important;"> <strong>NAME</strong> </td>
                                <td width="20%" style="vertical-align: middle !important;  text-align: left !important;"> <strong>SUBJECT</strong>
                                </td>
                                <td width="40%" style="vertical-align: middle !important;  text-align: left !important;"><strong>MESSAGE</strong>
                                </td>
                                <td width="15%"></td>
                                <td width="8%"> </td>
                            </tr>

                            @if($data)

                            @foreach($data as $message)

                            <tr data-bs-toggle="collapse" data-bs-target="#completedBoard{{$message->sender_id}}" class="bg-silver-300"
                                style="text-align: center !important;">
                                <td width="2%">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="h-40px w-40px d-flex align-items-center justify-content-center position-relative">
                                            <img src="/letters/{{$message->sender_initial}}.png" class="mw-100 mh-100">

                                        </div>
                                    </div>
                                </td>
                                <td  width="15%" style="vertical-align: middle !important;  text-align: left !important;">{{$message->sender_name}}</td>
                                <td width="17%" style="vertical-align: middle !important;  text-align: left !important;">{{$message->channel_name}}</td>
                                <td width="45%" style="vertical-align: middle !important;  text-align: left !important;">
                                {{ Str::limit($message->sender_body, 60, '...') }}</td>
                                <td  width="15%" style="vertical-align: middle !important;  text-align: right !important;">    
                                    <p style="font-size: 10px !important;">
                                     {{$message->formatted_created_at}}  <br> {{$message->no_year_created_at}}
                                    </p>
                               

                                </td>
                                <td width="8%" style="vertical-align: middle !important;  text-align: right !important;">
                                    <div class="btn-toolbar">

                                        <div class="btn-group ms-auto me-2">
                                            <a href="javascript:;" class="btn btn-white btn-xs"><i
                                                    class="fa fa-fw fa-trash"></i> <span
                                                    class="d-none d-lg-inline"></span></a>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <tr class="collapse" id="completedBoard{{$message->sender_id}}">
                                <td colspan="6">

                                    <div class="mailbox" style="padding: 20px !important;">

                                        <div class="mailbox-content" style="max-width:100% !important">

                                            <div class="mailbox-content-body"
                                                style="font-family: 'Caveat', cursive !important;">

                                                <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
                                                    <div class="p-3">
                                                        <h4 class="mb-3">{{$message->channel_name}}</h4>
                                                        <div class="d-flex mb-3">
                                                            <a href="javascript:;">
                                                                <img class="rounded-pill" width="48" alt=""
                                                                    src="/letters/{{$message->sender_initial}}.png" />
                                                            </a>
                                                            <div class="ps-3">
                                                                <div
                                                                    class="email-from text-dark fs-14px mb-3px fw-bold">
                                                                    from {{$message->sender_email}}
                                                                </div>
                                                                <div class="mb-3px"><i class="fa fa-clock fa-fw"></i>
                                                                {{$message->formatted_created_at}}  {{$message->no_year_created_at}}</div>
                                                                <div class="email-to">
                                                                    To: admin@admin.com
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="bg-gray-500" />
                                                        {!! $message->sender_body !!}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </td>

                            </tr>

                            @endforeach


                            @else


                            @endif

                        </tbody>
                    </table>
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

<!-- 
<div class="mailbox">
                              
                                <div class="mailbox-content" style="max-width:100% !important">
                                    <div class="mailbox-content-header">
                                        <div class="btn-toolbar">
                                            <div class="btn-group me-2">
                                                <a href="javascript:;" class="btn btn-white btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> <span
                                                        class="d-none d-lg-inline">Delete</span></a>
                                                <a href="javascript:;" class="btn btn-white btn-sm"><i
                                                        class="fa fa-fw fa-archive"></i> <span
                                                        class="d-none d-lg-inline">Archive</span></a>
                                            </div>
                                            <div class="btn-group ms-auto me-2">
                                                <a href="/admin/inbox/" class="btn btn-white btn-sm"><i
                                                        class="fa fa-fw fa-times"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mailbox-content-body"
                                        style="font-family: 'Caveat', cursive !important;">
                                      
                                        <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
                                            <div class="p-3">
                                                <h4 class="mb-3">Subject</h4>
                                                <div class="d-flex mb-3">
                                                    <a href="javascript:;">
                                                        <img class="rounded-pill" width="48" alt=""
                                                            src="../assets/img/user/user-12.jpg" />
                                                    </a>
                                                    <div class="ps-3">
                                                        <div class="email-from text-dark fs-14px mb-3px fw-bold">
                                                            from support@wrapbootstrap.com
                                                        </div>
                                                        <div class="mb-3px"><i class="fa fa-clock fa-fw"></i> Today,
                                                            8:30 AM</div>
                                                        <div class="email-to">
                                                            To: nguoksiong@live.co.uk
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="bg-gray-500" />
                                                <ul class="attached-document clearfix">
                                                    <li class="fa-file">
                                                        <div class="document-file">
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf"></i>
                                                            </a>
                                                        </div>
                                                        <div class="document-name"><a href="javascript:;"
                                                                class="text-decoration-none">flight_ticket.pdf</a></div>
                                                    </li>
                                                    <li class="fa-camera">
                                                        <div class="document-file">
                                                            <a href="javascript:;">
                                                                <img src="../assets/img/gallery/gallery-11.jpg"
                                                                    alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="document-name"><a href="javascript:;"
                                                                class="text-decoration-none">front_end_mockup.jpg</a>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <p class="text-dark">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel
                                                    auctor nisi, vel auctor
                                                    orci. <br />
                                                    Aenean in pretium odio, ut lacinia tellus. Nam sed sem ac enim
                                                    porttitor vestibulum vitae at
                                                    erat.
                                                </p>
                                                <p class="text-dark">
                                                    Curabitur auctor non orci a molestie. Nunc non justo quis orci
                                                    viverra pretium id ut est.
                                                    <br />
                                                    Nullam vitae dolor id enim consequat fermentum. Ut vel nibh tellus.
                                                    <br />
                                                    Duis finibus ante et augue fringilla, vitae scelerisque tortor
                                                    pretium. <br />
                                                    Phasellus quis eros erat. Nam sed justo libero.
                                                </p>
                                                <p class="text-dark">
                                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                                    per inceptos
                                                    himenaeos.<br />
                                                    Sed tempus dapibus libero ac commodo.
                                                </p>
                                                <br />
                                                <br />
                                                <p class="text-dark">
                                                    Best Regards,<br />
                                                    Sean.<br /><br />
                                                    Information Technology Department,<br />
                                                    Senior Front End Designer<br />
                                                </p>
                                            </div>
                                        </div>
                    
                                    </div>

                                </div>
       
                            </div> 
                            
                            -->