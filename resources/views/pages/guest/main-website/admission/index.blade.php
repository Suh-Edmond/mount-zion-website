@section('title', 'Admission')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/banner/mount_zion_admission_main.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Apply Admission</li>
                        </ul>
                        <h2 class="section-title">Apply to Mount Zion Higher Institutes</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- admission page content -->
    <div class="rts-page-content rts-section-padding" id="eligibility">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="admission-content-top">
                       <h3 class="rts-section-title">Requirements and Deadlines</h3>

                        <div class="admission-big-thumb">
                            <img src="assets/images/course/admission_image.jpeg" alt="admission">
                        </div>

                        <div class="requirement-deadline">
                            <div class="requirement-deadline__content">
                                <ul>
                                    <li class="single-requirement">Health Care Assistant (Special Care Nursing) - 1 Year
                                        <ul>
                                            <li class="single-requirement">Ability to read and write (minimum requirement)</li>
                                            <li class="single-requirement">First school leaving certificate (FSLC) or GCE OL/AL Levels or Bachelor Degree</li>
                                            <li class="single-requirement">Identifying Documents (ID Card,Passport etc)</li>
                                        </ul>
                                    </li>
                                    <li class="single-requirement">Higher National Diploma in Nursing / Midwifery -3 Years
                                         <ul>
                                            <li class="single-requirement">GCE Advanced levels certificate or an equivalent for international students (minimum requirement)</li>
                                            <li class="single-requirement">One year health care assistant training (Not Mandatory)</li>
                                            <li class="single-requirement">Identifying Documents (ID Card,Passport etc)</li>
                                        </ul>
                                    </li>

                                    <li class="single-requirement">Bachelor's Degree in Nursing/Midwifery - 4 Years
                                         <ul>
                                            <li class="single-requirement">GCE Advanced levels certificate or an equivalent for international students (minimum requirement)</li>
                                            <li class="single-requirement">Higher National Diploma in Nursing (Students with completed HND only do one extra year of training)</li>
                                            <li class="single-requirement">Identifying Documents (ID Card,Passport etc)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="application-deadline">
                            <h3 class="rts-section-title">Application Deadlines</h3>
                            <div class="application-deadline__content">
                                <div class="application-deadline__content--table">
                                    <table class="table">
                                        <thead class="table-theme">
                                        <tr>
                                            <td>Name</td>
                                            <td>Year</td>
                                            <td>Start Date</td>
                                            <td>End Date</td>
                                            <td>Status</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$admissionSession->name}}</td>
                                            <td>{{$admissionSession->year}}</td>
                                            <td>{{$admissionSession->start_date}}</td>
                                            <td>{{$admissionSession->end_date}}</td>
                                            <td style="{{$admissionSession->status ? 'color:green':'color:red'}} ">{{$admissionSession->status ? 'ACTIVE': 'IN_ACTIVE'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="rts-section-title">Application Policy</h3>
                                <p> 
                Mount Zion Higher Institute for Nursing and Midwifery retains the right to review and make a final decision on any application, even if some required materials are still pending at the time of review.

Please note that applicants may submit up to three applications in total—this includes first-time applications, transfer applications, or a mix of both. If you have submitted fewer than three applications, you are welcome to apply again.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row sticky-coloum-wrap g-5 mt--45">
                <div class="col-lg-12">
                    <div class="rts-ap-section">
                        <h3 class="rts-section-title mb--30">Application Details</h3>
                        <div class="rts-application-form">
                            <form method="post" action="" id="application-form">
                                <div class="single-form-part">
                                    <h5 class="form-title">Personal Information</h5>
                                    <p style="padding-bottom: 10px; font-size: medium">All fields with <span style="color: red">*</span> are required</p>

                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>


                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="first_name">First Name <span style="color: red">*</span></label>
                                            <input type="text" id="first_name"  name="first_name" placeholder="First name" required>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="last_name">Last Name <span style="color: red">*</span></label>
                                            <input type="text" id="last_name" name="last_name" placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="email2">Email <span style="color: red">*</span></label>
                                            <input type="email" id="email" name="email" placeholder="Enter your mail" required>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="phone">Phone Number <span style="color: red">*</span></label>
                                            <input type="tel" id="telephone" name="telephone" placeholder="Enter Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="dob">Date of Birth <span style="color: red">*</span></label>
                                            <input type="date" id="dob" name="dob" placeholder="dd/mm/yy" required>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="pob">Place of Birth <span style="color: red">*</span></label>
                                            <input type="text" id="pob" name="pob" placeholder="Buea" required>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="gender">Gender <span style="color: red">*</span></label>
                                            <select name="gender" id="gender" required>
                                                @foreach($genders as $key => $gender)
                                                    <option value="{{$gender}}">{{$gender}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="region">Select your Region <span style="color: red">*</span></label>
                                            <select name="region" id="region" placeholder="Region of origin" required>
                                                @foreach($regions as $key => $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="school_id">School <span style="color: red">*</span></label>
                                            <select id="school_id" name="school_id" required>
                                                <option value="#">Choose school</option>
                                                @foreach($schools as $key => $school)
                                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="program_id">Program <span style="color: red">*</span></label>
                                            <select id="program_id" name="program_id" required>
                                                <option value="#">Choose program</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="sub">Application Files <span style="color: red">*</span></label>
                                            <input type="file" id="file" name="files">
                                        </div>
                                    </div>
                                </div>

                                <div class="single-form-part">
                                    <h5 class="form-title">Agreement and Submission</h5>
                                    <p>By submitting this application, I confirm that all information provided is accurate and complete. I understand that any false
                                        information may result in the disqualification of my application.
                                    </p>

                                    <div class="d-flex align-items-center single-checkbox mt--20">
                                        <input type="checkbox" id="has_agreed" name="has_agreed" required value="true">
                                        <label for="exampleCheck1">By submitting this form, you agree to the Mount Zion University Privacy Notice</label>
                                    </div>
                                </div>
                                <button type="submit" class="rts-theme-btn primary with-arrow submit app_button">Submit Application
                                    <span><i class="fa-thin fa-arrow-right button_icon"></i></span>
                                </button> <span class="success_msg fw-bold text-lg" style="display: none">Your application was submitted successfully. A copy was sent to your email address</span>
                                <button type="submit" class="rts-theme-btn primary with-arrow submit loader_button" style="display: none">
                                    Submitting... <span class="application_spinner"></span>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- admission page content end -->
</x-guest-layout>

<style type="text/css">
    .application_spinner {
        width: 30px;
        --b: 8px;
        aspect-ratio: 1;
        border-radius: 50%;
        padding: 1px;
        background: conic-gradient(#0000 10%, #edf2f7) content-box;
        -webkit-mask:
            repeating-conic-gradient(#0000 0deg,#000 1deg 20deg,#0000 21deg 36deg),
            radial-gradient(farthest-side,#0000 calc(100% - var(--b) - 1px),#000 calc(100% - var(--b)));
        -webkit-mask-composite: destination-in;
        mask-composite: intersect;
        animation:l4 1s infinite steps(10);
    }
    @keyframes l4 {to{transform: rotate(1turn)}}

    .success_msg {
        color: green;
        display: none;
    }

</style>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '#school_id', function (e){
        e.preventDefault();
        var school_id = ($(this).val());

        $('#program_id').find('option').not(':first').remove();

        var url = "{{route('main.schools.programs.fetch-all', ':id')}}";

        url = url.replace(':id', school_id);

        $.ajax({
            url: url,
            method: 'GET',
            data: {},

            success: function(data) {
                let option = "";
                let yearslabel = "year(s)"
                for (var i = 0; i < data.data.length; i++){
                    option += '<option value="'+data.data[i].id+'">'+data.data[i].name+ ' - '+ data.data[i].duration+ yearslabel +' </option>';
                }
                $('#program_id').html('');
                $('#program_id').html(option);

            },
            error: function(data){
            },

        });
    })

    $(document).on('click', '.submit', function(e){
        e.preventDefault();

        var fname = $("input[name=first_name]").val();
        var lname = $("input[name=last_name]").val();
        var telephone = $("input[name=telephone]").val();
        var email = $("input[name=email]").val();
        var region = $("select[name=region]").val();
        var gender = $("input[name=gender]").val();
        var has_agreed = $("input[name=has_agreed]").val();
        var dob = $("input[name=dob]").val();
        var pob = $("input[name=pob]").val();
        var program_id = $("select[name=program_id]").val();
        var school_id = $("select[name=school_id]").val();

        $(".app_button").css("display", "none");
        $(".loader_button").css("display", "inline-block");
        $(".application_spinner").css('display', 'inline-block')


        $.ajax({
            url: "{{route('main.admission.applicant.store', ['admission_year_id' => $admissionSession->id])}}",
            type: "POST",
            data: {
                "first_name" : fname,
                "last_name": lname,
                "telephone": telephone,
                "email": email,
                "region" :region,
                "gender": gender,
                "has_agreed":has_agreed,
                "address":"address",
                "dob":dob,
                "pob": pob,
                "school_id": school_id,
                "program_id":program_id
            },
            success: function(data){
                $('#application-form').find(".print-error-msg").css("display", "none");
                $(".app_button").css("display", "inline-block");
                $(".loader_button").css("display", "none");
                $(".success_msg").css("display", "inline-block")
                $(".application_spinner").css('display', 'none')
            },
            error: function(response){
                $(".app_button").css("display", "inline-block");
                $(".loader_button").css("display", "none");

                $('#application-form').find(".print-error-msg").find("ul").html('');
                $('#application-form').find(".print-error-msg").css('display','block');
                $.each( response.responseJSON.errors, function( key, value ) {
                    $('#application-form').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            },
        });
    });
</script>
