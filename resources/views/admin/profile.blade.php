@extends('layouts.admin.main')

@push('style')
<link href="{{asset('assets/plugins/photoswipe/dist/photoswipe.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/lity/dist/lity.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" />
@endpush

@section('content')

<div id="content" class="app-content p-0">
    <!-- BEGIN profile -->
    <div class="profile">
        <div class="profile-header">
            <!-- BEGIN profile-header-cover -->
            <div class="profile-header-cover"
                style="background-image: url({{asset('assets/css/material/images/cover.png')}}) !important;"></div>
            <!-- END profile-header-cover -->
            <!-- BEGIN profile-header-content -->
            <div class="profile-header-content">
                <!-- BEGIN profile-header-img -->
                <div class="profile-header-img" id="profileImageContainer" style="cursor: pointer;">
                    <img src="{{ Auth::user()->profile_image_path ?? '/assets/img/user/user-12.jpg' }}"
                        alt="Profile Image" id="profileImagePreview" />
                </div>

                <input type="file" id="profileImageInput" style="display: none;" accept="image/*">
                <!-- END profile-header-img -->

                <!-- BEGIN profile-header-info -->
                <div class="profile-header-info ml-5" style="padding-left: 140px !important;">
                    <h4 class="mt-0 mb-1 head_fullname">
                        <?= isset($user_info->firstname) ? $user_info->firstname : 'Firsname' ?>
                        <?= isset($user_info->lastname) ? $user_info->lastname : 'Lastname' ?></h4>
                    <p class="mb-2 head_role"><?= isset($user_info->role) ? $user_info->role : 'Role' ?></p>
                    <a href="#" class="btn btn-xs btn-yellow" id="editProfileBtn">Edit Profile</a>
                </div>
                <!-- END profile-header-info head_fullname head_role -->
            </div>

            <!-- END profile-header-content -->
            <!-- BEGIN profile-header-tab -->
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile-about" class="nav-link active" data-bs-toggle="tab"></a>
                </li>

            </ul>
            <!-- END profile-header-tab -->
        </div>
    </div>

    <!-- END profile -->
    <!-- BEGIN profile-content -->
    <div class="profile-content">

        <!-- BEGIN tab-content -->
        <div class="table-responsive form-inline">

            <div id="profile-sections">
                <!-- Sections will be dynamically inserted here -->
                <table class="table table-profile align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="field"><strong class="text-danger">INFORMATION</strong>
                            </td>
                            <td><a href="javascript:;" class="btn btn-primary btn-xs save-btn"
                                    data-section="information">Save</a></td>
                        </tr>
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="id"><?= isset($user_info->id) ? $user_info->id : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Firstname</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="firstname"><?= isset($user_info->firstname) ? $user_info->firstname : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Middlename</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="middlename"><?= isset($user_info->middlename) ? $user_info->middlename : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Lastname</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="lastname"><?= isset($user_info->lastname) ? $user_info->lastname : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Role</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="role"><?= isset($user_info->role) ? $user_info->role : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-profile align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="field"><strong class="text-danger">CONTACT</strong>
                            </td>
                            <td><a href="javascript:;" class="btn btn-primary btn-xs save-btn"
                                    data-section="contact">Save</a></td>
                        </tr>
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="id"><?= isset($user_contact->id) ? $user_contact->id : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Address</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="address"><?= isset($user_contact->address) ? $user_contact->address : '<i class="fa fa-square-plus text-danger"></i>' ?></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Mobile Number</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="phone_number"><?= isset($user_contact->phone_number) ? $user_contact->phone_number : '<i class="fa fa-square-plus text-danger"></i>' ?></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Personal Email</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="emailaddress"><?= isset($user_contact->emailaddress) ? $user_contact->emailaddress : '<i class="fa fa-square-plus text-danger"></i>' ?></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Github Link</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="link_github"><?= isset($user_contact->link_github) ? $user_contact->link_github : '<i class="fa fa-square-plus text-danger"></i>' ?></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Portfolio Link</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="link_personal_portfolio"><?= isset($user_contact->link_personal_portfolio) ? $user_contact->link_personal_portfolio : '<i class="fa fa-square-plus text-danger"></i>' ?></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-profile align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="field"><strong class="text-danger">PROFILE</strong>
                            </td>
                            <td><a href="javascript:;" class="btn btn-primary btn-xs save-btn"
                                    data-section="profile">Save</a></td>
                        </tr>
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="id"><?= isset($user_profile->id) ? $user_profile->id : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Description</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="description"><?= isset($user_profile->description) ? $user_profile->description : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Image Path</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="imagepath"><?= isset($user_profile->imagepath) ? $user_profile->imagepath : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-profile align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="field"><strong class="text-danger">EDUCATION</strong>
                            </td>
                            <td><a href="javascript:;" class="btn btn-primary btn-xs save-btn"
                                    data-section="education">Save</a> <a href="javascript:;" class="add-education"
                                    data-num="1"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        @if($user_education->isEmpty())
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1id"><i class="fa fa-square-plus text-danger"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">School Name</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1schoolname"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <td class="field">School Address</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1schooladdress"><i class="fa fa-square-plus text-danger"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Course</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1course"><i class="fa fa-square-plus text-danger"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Major</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1major"><i class="fa fa-square-plus text-danger"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Year</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1year"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <td class="field">Thesis</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1thesis"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        @else
                        <?php $count = 1; ?>
                        @foreach($user_education as $education)
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td>
                                <a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}id">{{ $education->id ?? '<i class="fa fa-square-plus text-danger"></i>' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">School Name</td>
                            <td>
                                <a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}schoolname">{{ $education->schoolname ?? '<i class="fa fa-square-plus text-danger"></i>' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">School Address</td>
                            <td>
                                <a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}schooladdress">{{ $education->schooladdress ?? '<i class="fa fa-square-plus text-danger"></i>' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Course</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}course">{{ $education->course ?? '<i class="fa fa-square-plus text-danger"></i>' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Major</td>
                            <td>
                                <a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}major">{{ $education->major ?? '<i class="fa fa-square-plus text-danger"></i>' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Year</td>
                            <td>
                                <a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}year">{{ $education->year ?? '<i class="fa fa-square-plus text-danger"></i>' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Thesis</td>
                            <td>
                                <a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count}}thesis">{!! $education->thesis ?? '<i class="fa fa-square-plus text-danger"></i>' !!}</a>
                            </td>
                        </tr>
                        @if ($loop->last)

                        @else
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        @endif

                        <?php $count++; ?>
                        @endforeach
                        @endif


                    </tbody>
                </table>
                <table class="table table-profile align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="field"><strong class="text-danger">EXPERIENCE</strong>
                            </td>
                            <td><a href="javascript:;" class="btn btn-primary btn-xs save-btn"
                                    data-section="experience">Save</a> <a href="javascript:;" class="add-experience"
                                    data-num="1"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        @if($user_experience->isEmpty())
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1id"><i class="fa fa-square-plus text-danger"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Role</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1role"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <td class="field">Company Name</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1companyname"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <td class="field">Company Address</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1address"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <td class="field">Description</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1description"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <td class="field">Year Start - End</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="1year"><i class="fa fa-square-plus text-danger"></i></a></td>
                        </tr>
                        @else
                        <?php $count_ex = 1; ?>
                        @foreach($user_experience as $experience)
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count_ex}}id"><?= isset($experience->id) ? $experience->id : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Role</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count_ex}}role"><?= isset($experience->role) ? $experience->role : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Company Name</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count_ex}}companyname"><?= isset($experience->companyname) ? $experience->companyname : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Company Address</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count_ex}}address"><?= isset($experience->address) ? $experience->address : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Description</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count_ex}}description"><?= isset($experience->description) ? $experience->description : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Year Start - End</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="{{$count_ex}}year"><?= isset($experience->year) ? $experience->year : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>

                        @if ($loop->last)

                        @else
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        @endif

                        <?php $count_ex++; ?>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <table class="table table-profile align-middle">
                    <tbody>
                        <tr class="highlight">
                            <td class="field"><strong class="text-danger">SKILLS</strong></td>
                            <td><a href="javascript:;" class="btn btn-primary btn-xs save-btn"
                                    data-section="skills">Save</a></td>
                        </tr>
                        <tr class="d-none">
                            <td class="field">id</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="id"><?= isset($user_skill->id) ? $user_skill->id : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Backend</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="back_end"><?= isset($user_skill->back_end) ? $user_skill->back_end : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Frontend</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="front_end"><?= isset($user_skill->front_end) ? $user_skill->front_end : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Server Side</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="server_side"><?= isset($user_skill->server_side) ? $user_skill->server_side : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Years Exp</td>
                            <td><a href="javascript:;"
                                    class="add-btn text-gray-900 text-decoration-none "
                                    data-field="years_exp"><?= isset($user_skill->years_exp) ? $user_skill->years_exp : '<i class="fa fa-square-plus text-danger"></i>' ?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
        <!-- END tab-content -->
    </div>
    <!-- END profile-content -->
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/plugins/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.addd').click(function() {
        var textareaValue = $('textarea').html(); // Get the value of the textarea
        console.log(textareaValue);

        alert("Textarea Value: " + textareaValue); // Display in an alert
    });
});
// $('#app').addClass('app-content-full-height');
// $('#profile-page').addClass('active');
$('#users-page').addClass('active');
$(document).ready(function() {
    let educationData = [];
    let experienceData = [];


    // Adding Education Section
    $(document).on("click", ".add-education", function() {


        let num = parseInt($(this).attr('data-num')) || 0;
        let tol = num + 1;
        $(this).attr('data-num', tol);


        let educationSectionHtml = `
                <tr class="d-none">
                    <td class="field">id</td>
                    <td><a href="javascript:;" class="add-btn text-gray-900 text-decoration-none " data-field="${tol}id"><i class="fa fa-square-plus text-danger"></i></a></td>
                </tr>
                <tr class="education-section">
                    <td class='field'>School Name</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}schoolname'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="education-section">
                    <td class='field'>School Address</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}schooladdress'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr>
                    <td class="field">Course</td>
                    <td><a href="javascript:;"
                            class="add-btn text-gray-900 text-decoration-none "
                            data-field="${tol}course"><i class="fa fa-square-plus text-danger"></i></a>
                    </td>
                </tr>
                <tr class="education-section">
                    <td class='field'>Major</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}major'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="education-section">
                    <td class='field'>Year</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}year'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="education-section">
                    <td class='field'>Thesis</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}thesis'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            `;
        $(this).closest("tr").after(educationSectionHtml);
    });

    // Adding Experience Section
    $(document).on("click", ".add-experience", function() {
        let num = parseInt($(this).attr('data-num')) || 0;
        let tol = num + 1;
        $(this).attr('data-num', tol);

        let experienceSectionHtml = `
                <tr class="d-none">
                    <td class="field">id</td>
                    <td><a href="javascript:;" class="add-btn text-gray-900 text-decoration-none " data-field="${tol}id"><i class="fa fa-square-plus text-danger"></i></a></td>
                </tr>
                <tr class="experience-section">
                    <td class='field'>Role</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}role'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="experience-section">
                    <td class='field'>Company Name</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}companyname'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="experience-section">
                    <td class='field'>Company Address</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}address'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="experience-section">
                    <td class='field'>Description</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}description'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr class="experience-section">
                    <td class='field'>Year start - end</td>
                    <td><a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${tol}year'><i class='fa fa-square-plus text-danger'></i></a></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            `;
        $(this).closest("tr").after(experienceSectionHtml);
    });

    $(document).on("click", ".save-btn", function() {
        let section = $(this).data("section");
        let user_id = '{{$user_id ?? null}}'; // Ensure the user ID is properly set

        if (section === "education" || section === "experience") {
            let dataFields = {
                education: ["schoolname", "schooladdress", "course", "major", "year", "thesis",
                    "id"],
                experience: ["role", "companyname", "address", "description",
                    "year", "id"
                ]
            };

            let formData = {
                section: section,
                user_id: user_id,
                [section]: []
            };

            let rawData = {};

            // Collect data from fields inside the closest table
            $(this).closest("table").find(".add-btn").each(function() {
                let field = $(this).data("field");

                if (field.endsWith("thesis") || field.endsWith("description") || field === 'back_end' || field === 'front_end' || field === 'server_side' || field === 'years_exp') {
                    rawData[field] = $(this).html();
                }else{
                    rawData[field] = $(this).text().trim();
                }

            });

            // Group data by index
            let groupedData = {};
            Object.keys(rawData).forEach(key => {
                let match = key.match(/^(\d+)(\w+)$/);
                if (match) {
                    let index = match[1];
                    let field = match[2];

                    if (!groupedData[index]) {
                        groupedData[index] = {};
                    }
                    groupedData[index][field] = rawData[key];

                    
                }
            });

            // Process grouped data
            Object.keys(groupedData).sort((a, b) => a - b).forEach(index => {
                let entry = groupedData[index];
                let hasValue = dataFields[section].some(key => entry[key] && entry[key] !== '');

                if (hasValue) {
                    formData[section].push(entry);
                }
            });

            if (formData[section].length > 0) {
                console.log(`Saving ${section}:`, formData);

                add_data_array(formData)
                // add_data(formData);
            } else {
                console.log(`No valid ${section} data found.`);
            }

        } else {
            // Handle other sections
            let formData = {
                section: section,
                user_id: user_id
            };

            $(this).closest("table").find(".add-btn").each(function() {
                let field = $(this).data("field");
                if (field.endsWith("thesis") || field.endsWith("description") || field === 'back_end' || field === 'front_end' || field === 'server_side' || field === 'years_exp') {
                    formData[field] = $(this).html();
                }else{
                    formData[field] = $(this).text().trim();
                }
            });

            console.log(`Saving ${section}:`, formData);
            add_data(formData);
        }
    });

    function add_data_array(params) {
        $.ajax({
            url: "{{route('admin.store.user')}}",
            type: "POST",
            data: params,
            dataType: 'json',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(response) {

                toast.success(params.section + " saved successfully!");
            },
            error: function(xhr) {
                toast.error("Error saving data.");
            }
        });
    }

    function add_data(params) {
        $.ajax({
            url: "{{route('admin.store.user')}}",
            type: "POST",
            data: params,
            dataType: 'json',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(response) {
                if (params.section == 'information') {
                    $('.head_fullname').html(response.firstname + ' ' + response.lastname);
                    $('.head_role').html(response.role);
                }
                toast.success(params.section + " saved successfully!");
            },
            error: function(xhr) {
                toast.error("Error saving data.");
            }
        });
    }
    $(document).on("click", ".add-btn", function () {
        let field = $(this).data("field");
        let value = $(this).html();
        let newContent = (value == '<i class="fa fa-square-plus text-danger"></i>') ? '' : value;
        console.log(field);

        let txarea = `
            <textarea id="editor1" name="editor1"  data-field='${field}' class="textarea-field">${newContent}</textarea>
        `;

        let inputField = `
            <input type='text' class='w-25 form-control form-control-sm input-field' 
            data-field='${field}' placeholder='Enter...' value='${newContent}'>
        `;

        if (field.endsWith("thesis") || field.endsWith("description") || field === 'back_end' || field === 'front_end' || field === 'server_side' || field === 'years_exp') {
            $(this).parent().html(txarea); // Insert textarea

            // Ensure textarea exists before initializing CKEditor
           
                let textarea = document.querySelector("#editor1");
                if (textarea) {
                    ClassicEditor.create(textarea)
                        .then(editor => {
                            // Handle content change
                            editor.model.document.on("change:data", () => {
                                console.log("Content changed:", editor.getData());
                            });

                            // Handle blur event
                            editor.editing.view.document.on("blur", () => {
                                let content = editor.getData().trim();
                                let newContent = content ? content : `<i class='fa fa-square-plus text-danger'></i>`;
                                $(textarea).parent().html(
                                    `<a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${field}'>${newContent}</a>`
                                );
                                editor.destroy(); // Destroy editor instance after blur
                            });
                        })
                        .catch(error => console.error("CKEditor error:", error));
                }
            
        } else {
            $(this).parent().html(inputField);
            $(".input-field").focus();
        }
    });


    // Handle input blur
    $(document).on("blur", ".input-field", function() {
        let field = $(this).data("field");
        let value = $(this).val().trim();
        let newContent = value ? value : `<i class='fa fa-square-plus text-danger'></i>`;
        $(this).parent().html(
            `<a href='javascript:;' class='add-btn text-gray-900 text-decoration-none ' data-field='${field}'>${newContent}</a>`
        );
    });

    // Handle Enter key for input field
    $(document).on("keyup", ".input-field", function(e) {
        if (e.key === "Enter") {
            $(this).blur();
        }
    });
});


var handleCkeditor = function () {
    let elm = document.querySelector("#editor1");
    if (elm) {
        ClassicEditor.create(elm, {
            toolbar: false, // Empty toolbar configuration
            heading: false
        }).catch(error => console.error(error));
    }
};

var FormWysihtml = function () {
    "use strict";
    return {
        init: function () {
            handleCkeditor();
        }
    };
}();

$(document).ready(function () {
    FormWysihtml.init();
});


$(document).ready(function() {
    // Trigger file selection when clicking profile image or Edit Profile button
    $("#profileImageContainer, #editProfileBtn").on("click", function() {
        $("#profileImageInput").click();
    });

    $("#profileImageInput").on("change", function() {
        var file = this.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#profileImagePreview").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);

            // Upload the image via AJAX
            var formData = new FormData();
            formData.append("profile_image", file);
            formData.append("user_id", '{{ request()->segment(3) }}');

            $.ajax({
                url: "{{ route('admin.upload.profile.image') }}", // Laravel route upload.profile.image
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        $("#profileImagePreview").attr("src", response.imageUrl);
                        toast.success("Change profile saved successfully!");
                    } else {
                        toast.error("Image upload failed.");
                    }
                },
                error: function() {
                    toast.error("Error uploading image. Please try again.");

                }
            });
        }
    });
});
// app-sidebar-minified app-content-full-height
</script>
@endpush