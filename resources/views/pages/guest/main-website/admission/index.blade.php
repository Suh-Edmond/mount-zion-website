@section('title', 'Admission')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/banner/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Apply Admission</li>
                        </ul>
                        <h2 class="section-title">Apply to Mount Zion University</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- admission page content -->
    <div class="rts-page-content rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="admission-content-top">
                        <h3 class="rts-section-title">
                            First-Year Applicants
                        </h3>

                        <div class="admission-big-thumb">
                            <img src="assets/images/course/admission-bg.jpg" alt="admission">
                        </div>

                        <div class="requirement-deadline">
                            <h3 class="rts-section-title">Requirements and Deadlines</h3>
                            <div class="requirement-deadline__content">
                                <ul>
                                    <li class="single-requirement">$90 nonrefundable application fee or fee waiver request</li>
                                    <li class="single-requirement">ACT or SAT test scores (test optional)</li>
                                    <li class="single-requirement">School Report form and counselor letter of recommendation </li>
                                    <li class="single-requirement">Official transcript(s) or academic results</li>
                                    <li class="single-requirement">Letters of recommendation from two teachers</li>
                                    <li class="single-requirement">Midyear transcript (due by February 15)</li>
                                    <li class="single-requirement">$90 nonrefundable application fee or fee waiver request</li>
                                    <li class="single-requirement">ACT or SAT test scores (test optional)</li>
                                    <li class="single-requirement">School Report form and counselor letter of recommendation </li>
                                    <li class="single-requirement">Official transcript(s) or academic results</li>
                                    <li class="single-requirement">Letters of recommendation from two teachers</li>
                                    <li class="single-requirement">Midyear transcript (due by February 15)</li>
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
                                            <td>{{$admissionSession->end_date ? 'ACTIVE': 'IN_ACTIVE'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p> Mount Zion reserves the right to evaluate an application and render a final decision even if all pieces of the application have not been received.</p>
                                <p class="w-95 mx-0">Applicants are limited to a total of three applications for undergraduate admission, whether for first-year admission, transfer admission or a <br>combination of both. If you have submitted fewer than three applications to Mount Zion, you may reapply.
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
                            <form method="post" action="">

                                <div class="single-form-part">
                                    <h5 class="form-title">Personal Information</h5>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="email2">Enter your mail</label>
                                            <input type="email" name="email" placeholder="Enter your mail" required>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="phone">Enter Phone Number</label>
                                            <input type="tel" name="telephone" placeholder="Enter Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" name="dob" placeholder="dd/mm/yy" required>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="pob">Place of Birth</label>
                                            <input type="text" name="pob" placeholder="Buea" required>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="gender">Gender</label>
                                            <select name="gender" required>
                                                @foreach($genders as $key => $gender)
                                                    <option value="{{$gender}}">{{$gender}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="region">Select your Region </label>
                                            <select name="region" id="region" placeholder="Region of origin" required>
                                                @foreach($regions as $key => $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="gender">Select Program</label>
                                            <select name="program_id" required>
                                                @foreach($programs as $key => $program)
                                                    <option value="{{$program->id}}">{{$program->name}} - {{$program->duration}} year(s)</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="single-input-item">
                                            <label for="sub">Application Files:</label>
                                            <input type="file" name="files">
                                        </div>
                                    </div>
                                </div>

                                <div class="single-form-part">
                                    <h5 class="form-title">Agreement and Submission</h5>
                                    <p>By submitting this application, I confirm that all information provided is accurate and complete. I understand that any false
                                        information may result in the disqualification of my application.
                                    </p>

                                    <div class="d-flex align-items-center single-checkbox mt--20">
                                        <input type="checkbox" name="has_agreed" required>
                                        <label for="exampleCheck1">By submitting this form, you agree to the Mount Zion University Privacy Notice</label>
                                    </div>
                                </div>
                                <button type="submit" class="rts-theme-btn primary with-arrow submit">Submit Application<span><i class="fa-thin fa-arrow-right"></i></span></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- admission page content end -->
</x-guest-layout>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.submit', function(e){
        e.preventDefault();

        var fname = $("input[name=fname]").val();
        var lname = $("input[name=lname]").val();
        var telephone = $("input[name=telephone]").val();
        var email = $("input[name=email]").val();
        var region = $("select[name=region]").val();
        var gender = $("input[name=gender]").val();
        var has_agreed = $("input[name=has_agreed]").val();
        var dob = $("input[name=dob]").val();
        var pob = $("input[name=pob]").val();
        var program_id = $("select[name=program_id]").val();


        $.ajax({
            url: "{{route('main.admission.applicant.store', ['admission_year_id' => $admissionSession->id])}}",
            type: "POST",
            data: {
                "fname" : fname,
                "lname": lname,
                "telephone": telephone,
                "email": email,
                "region" :region,
                "gender": gender,
                "has_agreed":has_agreed,
                "address":"address",
                "dob":dob,
                "pob": pob,
                "program_id":program_id
            },
            success: function(data){
                console.log(data)	// here comes the login form
            },
            error: function(data){
            },
        });
    });
</script>
