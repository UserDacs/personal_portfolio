<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mark Emil Dacoylo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
    .toast-container {
        top: 20px !important;
        /* Adjust the distance from the top */
        right: 20px !important;
        /* Adjust the distance from the right */
        z-index: 1050 !important;
        /* Ensure it appears above other elements */
    }
    </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300"
    style="font-family: 'Ubuntu Mono', monospace !important;">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">{{$user_info->firstname}}</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
                    <li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="toast-container position-fixed p-3" style="top: 20px; right: 20px;">
        <!-- Toast -->
        <div id="myToast" class="toast text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body" id="toastBody">
                This is a success message.
            </div>
        </div>
    </div>
    <section id="home-section" class="hero">
        <div class="home-slider  owl-carousel">
            <div class="slider-item ">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img"
                            style="background-image:url({{$files[2]->url}});">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex  align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Hello!</span>
                                <h1 class="mb-4 mt-3">I'm <span>{{$user_info->firstname}}
                                        {{$user_info->lastname}}</span></h1>
                                <h2 class="mb-4">A {{$user_info->role}}</h2>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#"
                                        class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img"
                            style="background-image:url({{$files[2]->url}});">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Hello!</span>
                                <h1 class="mb-4 mt-3">I'm a <span>{{$user_info->role}}</span> based in Philippines</h1>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#"
                                        class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex align-self-stretch align-items-center"
                            style="background-image:url({{$files[2]->url}});">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h1 class="big">About</h1>
                            <h2 class="mb-4">About Me</h2>

                            <ul class="about-info mt-4 px-md-0 px-2">
                                <li class="d-flex"><span>Name:</span> <span>{{$user_info->firstname}}
                                        {{$user_info->middlename}} {{$user_info->lastname}}</span></li>
                                <li class="d-flex"><span>Date of birth:</span> <span>July 30, 1993</span></li>
                                <li class="d-flex"><span>Address:</span> <span>{{$user_contact->address}}</span></li>
                                <li class="d-flex"><span>Zip code:</span> <span>6325</span></li>
                                <li class="d-flex"><span>Email:</span> <span>{{$user_contact->emailaddress}}</span></li>
                                <li class="d-flex"><span>Phone: </span> <span>{{$user_contact->phone_number}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="counter-wrap ftco-animate d-flex mt-md-3">
                        <div class="text">
                            <!-- <p class="mb-4">
                                <span class="number" data-number="120">0</span>
                                <span>Project complete</span>
                            </p> -->
                            <p><a href="{{$files[3]->url}}" title="Resume"
                                    download="{{$user_info->firstname}} {{$user_info->middlename}} {{$user_info->lastname}} CV"
                                    class="btn btn-primary py-3 px-3">Download CV</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Resume</h1>
                    <h2 class="mb-4">Resume</h2>
                    {!! $user_profile->description !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Education</h3>
                </div>

                @foreach($user_education as $education)
                <div class="col-md-6">
                    <div class="resume-wrap ftco-animate">
                        <span class="date">{{$education->year}}</span>
                        <h2>{{$education->course}}</h2> 
                        <span class="position">{{$education->schoolname}}</span><br>
                        {!! $education->thesis !!}
                    </div>
                </div>

                @endforeach
               
                
               
                <div class="col-md-12">
                    <h3 class="mb-4">Experience</h3>
                </div>

                @foreach($user_experience as $experience)

                <div class="col-md-6">
                    <div class="resume-wrap ftco-animate">
                        <span class="date">{{$experience->year}}</span>
                        <h2>{{$experience->role}}</h2>
                        <span class="position">{{$experience->companyname}}</span>
                        {!! $experience->description !!}
                    </div>
                </div>

                @endforeach

                
                
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center ftco-animate">
                    <p> <p><a href="{{$files[3]->url}}" title="Resume"
                                    download="{{$user_info->firstname}} {{$user_info->middlename}} {{$user_info->lastname}} CV"
                                    class="btn btn-primary py-3 px-3">Download CV</a></p></p>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section" id="skills-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Skills</h1>
                    <h2 class="mb-4">My Skills</h2>
                    
                </div>
            </div>
            <div class="row">
               
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>Backend</h3>
                        {!! $user_skill->back_end !!}
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>Frontend</h3>
                        {!! $user_skill->front_end !!}
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>Server Side</h3>
                        {!! $user_skill->server_side !!}
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>Years Experience</h3>
                        {!! $user_skill->years_exp !!}
                    </div>
                </div>
                
            </div>
        </div>
    </section>







    <section class="ftco-section ftco-hireme img margin-top"
        style="background-image: url({{ asset('images/bg_1.jpg') }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>I'm <span>Available</span></h2>
                    
                    <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">Contact Me</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>

            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-4">Address</h3>
                        <p>{{$user_contact->address}} 6325</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="javascript:;">{{$user_contact->phone_number}}</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:{{$user_contact->emailaddress}}">{{$user_contact->emailaddress}}</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-4">Website</h3>
                        <p><a href="{{$user_contact->link_personal_portfolio}}" target="_blank">{{$user_contact->link_personal_portfolio}}</a></p>
                    </div>
                </div>
            </div>

            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form id="sendEmailForm" action="#" class="bg-light p-4 p-md-5 contact-form">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="recipient_email" class="form-control" placeholder="Your Email"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea id="body" cols="30" rows="7" class="form-control" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div class="img" style="background-image: url({{$files[2]->url}});"></div>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        {!! mb_strimwidth($user_profile->description, 0, 100, '....') !!}
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="https://www.facebook.com/dacoylomarkemilcajes" target="_blank" title="Facebook"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://t.me/emilago30" target="_blank"  title="Telegram"><span class="icon-telegram"></span></a></li>
                            <li class="ftco-animate"><a href="skype:live:.cid.2d6fe51e1998b004" target="_blank"  title="Skype"><span class="icon-skype"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                        </ul>
                    </div>
                </div>
               
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">{{$user_contact->address}} Philippines 6325</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{$user_contact->phone_number}} </span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">{{$user_contact->emailaddress}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    $(document).ready(function() {

        $('#sendEmailForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally
            var bodyContent = $('#body').val();
            var formattedContent = bodyContent.replace(/\n/g, '<br>');



            // Collect form data
            var formData = {
                name: $('#name').val(),
                recipient_email: $('#recipient_email').val(),
                subject: $('#subject').val() || $('#recipient_email').val(),
                body: formattedContent,
            };

            // Send AJAX request
            $.ajax({
                url: '/send-email', // Your API endpoint
                type: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        toast.success(" Send successfully!");

                        $('#name').val('')
                        $('#recipient_email').val('')
                        $('#subject').val('')
                        $('#body').val('')

                    } else {
                        // Display error message
                        toast.error("Send error");
                    }
                },
                error: function(xhr, status, error) {
                    toast.error(xhr);

                }
            });
        });
    });
    </script>
    <script>
    // Custom Toast Functions
    var toast = {
        success: function(message) {

            showToast({
                message: message,
                status: 'success'
            });
        },
        error: function(message) {

            showToast({
                message: message,
                status: 'error'
            });
        },
        warning: function(message) {

            showToast();
        },
        info: function(message) {

            showToast();
        }
    };

    // Show Toast Function
    function showToast(params) {
        Swal.fire({
            text: params.message,
            icon: params.status,
            confirmButtonText: 'OK'
        });
    }
    </script>



</body>

</html>