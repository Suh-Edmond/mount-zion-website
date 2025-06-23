@section('title', 'Admission')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url(assets/images/elligibility/inside.png);">
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
                        <h4 class="rts-section-title">Requirements and Application</h4>

                        <div class="admission-big-thumb" style="max-height: 400px;">
                            <img src="assets/images/elligibility/outside.png" alt="admission"
                                style="height:400px !important;width:150rem !important; object-fit: cover;">
                        </div>

                        <div class="requirement-deadline">
                            <div class="requirement-deadline__content">
                                <h6 class="form-title">Health Care Assistant (Special Care Nursing) - 1 Year </h6>
                                <ul>
                                    <li class="single-requirement">Ability to read and write (minimum requirement)</li>
                                    <li class="single-requirement">First school leaving certificate (FSLC) or GCE OL/AL
                                        Levels or Bachelor Degree</li>
                                    <li class="single-requirement">Identifying Documents (ID Card,Passport etc)</li>
                                </ul>
                                <h6 class="my-5 form-title">Higher National Diploma in Nursing / Midwifery -3 Years
                                </h6>
                                <ul>
                                    <li class="single-requirement">GCE Advanced levels certificate or an equivalent for
                                        international students (minimum requirement)</li>
                                    <li class="single-requirement">One year health care assistant training (Not
                                        Mandatory)</li>
                                    <li class="single-requirement">Identifying Documents (ID Card,Passport etc)</li>
                                </ul>
                                <h6 class="my-5 form-title">Bachelor's Degree in Nursing/Midwifery - 4 Years</h6>
                                <ul>
                                    <li class="single-requirement">GCE Advanced levels certificate or an equivalent for
                                        international students (minimum requirement)</li>
                                    <li class="single-requirement">Higher National Diploma in Nursing (Students with
                                        completed HND only do one extra year of training)</li>
                                    <li class="single-requirement">Identifying Documents (ID Card,Passport etc)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="application-deadline">
                            <h4 class="rts-section-title">Application Policy</h4>
                            <div class="application-deadline__content">
                                <p>
                                    Mount Zion Higher Institute for Nursing and Midwifery retains the right to review
                                    and make a final decision on any application, even if some required materials are
                                    still pending at the time of review.

                                    Please note that applicants may submit up to three applications in total—this
                                    includes first-time applications, transfer applications, or a mix of both. If you
                                    have submitted fewer than three applications, you are welcome to apply again.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row sticky-coloum-wrap g-5 mt--45">
                <div class="col-lg-12">
                    <div class="rts-ap-section">
                        <h4 class="rts-section-title mb--30">Application Details</h4>
                        @if(session('status'))
                        <div class="alert alert-success">
                            {!! session('status') !!}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                        @endif
                        <div class="rts-application-form">
                            <form method="post" action="{{route('main.admission.applicant.store')}}"
                                enctype="multipart/form-data" id="application-form">
                                @csrf
                                <div class="single-form-part">
                                    <h5 class="form-title">Personal Information</h5>
                                    <p style="padding-bottom: 10px; font-size: medium">All fields with <span
                                            style="color: red">*</span> are required</p>

                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="first_name">First Name <span style="color: red">*</span></label>
                                            <input type="text" id="first_name" name="first_name"
                                                placeholder="First name" required value="{{old('first_name')}}">
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('first_name')}}
                                            </small>
                                            @endif
                                        </div>
                                        <div class="single-input-item">
                                            <label for="last_name">Last Name <span style="color: red">*</span></label>
                                            <input type="text" id="last_name" name="last_name" placeholder="Last name"
                                                value="{{old('last_name')}}" required>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('last_name')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="email2">Email <span style="color: red">*</span></label>
                                            <input type="email" id="email" name="email" placeholder="Enter your mail"
                                                value="{{old('email')}}" required>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('email')}}
                                            </small>
                                            @endif
                                        </div>
                                        <div class="single-input-item">
                                            <label for="phone">Phone Number <span style="color: red">*</span></label>
                                            <input type="tel" id="telephone" name="telephone"
                                                value="{{old('telephone')}}" placeholder="Enter Phone Number" required>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('telephone')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="dob">Date of Birth <span style="color: red">*</span></label>
                                            <input type="date" id="dob" name="dob" placeholder="dd/mm/yy" required
                                                value="{{old('dob')}}">
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('dob')}}
                                            </small>
                                            @endif
                                        </div>
                                        <div class="single-input-item">
                                            <label for="pob">Place of Birth <span style="color: red">*</span></label>
                                            <input type="text" id="pob" name="pob" placeholder="Enter place of birth" required
                                                value="{{old('pob')}}">
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('pob')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="gender">Gender <span style="color: red">*</span></label>
                                            <select name="gender" id="gender" required>
                                                @foreach($genders as $key => $gender)
                                                <option value="{{$gender}}" {{old('gender')==$gender ? 'selected' : ''
                                                    }}>{{$gender}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('gender')}}
                                            </small>
                                            @endif
                                        </div>
                                        <div class="single-input-item">
                                            <label for="region">Select your Region <span
                                                    style="color: red">*</span></label>
                                            <select name="region" id="region" placeholder="Region of origin" required>
                                                @foreach($regions as $key => $value)
                                                <option value="{{$value}}" {{old('region')==$value ? 'selected' : '' }}>
                                                    {{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('region')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="school_id">School <span style="color: red">*</span></label>
                                            <select id="school_id" name="school_id" required>
                                                <option value="">Choose school</option>
                                                @foreach($schools as $key => $school)
                                                <option value="{{$school->id}}" {{old('schoold_id')==$school->id ?
                                                    'selected': ''}}>{{$school->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('school_id')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="program_id">Program <span style="color: red">*</span></label>
                                            <select id="program_id" name="program_id" required>
                                                <option value="#">Choose program</option>
                                            </select>
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('program_id')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="sub">ID Card/Passport <span style="color: red">*</span></label>
                                            <input type="file" id="id_card" name="id_card" required
                                                accept="image/png, image/jpg, image/jpeg, application/pdf">
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('id_card')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="sub">GCE Advance Level Result</label>
                                            <input type="file" id="gce_cert" name="gce_cert"
                                                accept="image/png, image/jpg, image/jpeg, application/pdf">
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('gce_cert')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="sub">HND Result</label>
                                            <input type="file" id="hnd_cert" name="hnd_cert"
                                                accept="image/png, image/jpg, image/jpeg, application/pdf">
                                            @if($errors->any())
                                            <small class="text-red" style="color: red">
                                                {{$errors->first('hnd_cert')}}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="single-form-part">
                                    <h5 class="form-title">Agreement and Submission</h5>
                                    <p>By submitting this application, I confirm that all information provided is
                                        accurate and complete. I understand that any false
                                        information may result in the disqualification of my application.
                                    </p>

                                    <div class="d-flex align-items-center single-checkbox mt--20">
                                        <input type="checkbox" id="has_agreed" name="has_agreed" value="true">
                                        <label for="has_agreed">By submitting this form, you agree to the Mount Zion
                                            University Privacy Notice</label>
                                    </div>
                                    @if($errors->any())
                                    <small class="text-red" style="color: red">
                                        {{$errors->first('has_agreed')}}
                                    </small>
                                    @endif
                                </div>
                                <button type="submit" class="rts-theme-btn primary with-arrow  app_button">Submit
                                    Application
                                    <span><i class="fa-thin fa-arrow-right button_icon"></i></span>
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
            repeating-conic-gradient(#0000 0deg, #000 1deg 20deg, #0000 21deg 36deg),
            radial-gradient(farthest-side, #0000 calc(100% - var(--b) - 1px), #000 calc(100% - var(--b)));
        -webkit-mask-composite: destination-in;
        mask-composite: intersect;
        animation: l4 1s infinite steps(10);
    }

    @keyframes l4 {
        to {
            transform: rotate(1turn)
        }
    }

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

        var url = "{{route('main.schools.programs.fetch-active-programs', ':id')}}";

        url = url.replace(':id', school_id);

        $.ajax({
            url: url,
            method: 'GET',
            data: {},

            success: function(data) {
                let option = "<option value=''>Choose program</option>";
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
    });


    


    
</script>