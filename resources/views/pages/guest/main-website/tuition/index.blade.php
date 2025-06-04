@section('title', 'Tuition')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/tuition/classroom.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tuition and Fees</li>
                        </ul>
                        <h2 class="section-title">Tuition and Fees</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- tution fee -->
    <div class="page-content-top pt--120 pt__md--80">
        <div class="container">
            <div class="row">
                <h3 class="rts-section-title">Tuition & Fees</h3>
            </div>
        </div>
    </div>
    <!-- program fee chart -->
    <div class="semister-fee pb--120 pb__md--80">
        <div class="container">
            <div class="row">
                <div class="semister-fee__content">
                    <h5 class="rts-section-title">Special Care Nursing Program</h5>
                    <!-- tab item -->
                    <div class="rts-fee-chart">

                        <div class="rts-fee-chart__content">
                            <div class="fade show active">
                                <table class="table">
                                    <thead class="table-theme">
                                        <tr>
                                            <th></th>
                                            <th> First Installment</th>
                                            <th>Second Installment</th>
                                            <th>Third Installment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="3">One Year Progam</td>
                                            <td>100,000 FCFA</td>
                                            <td>100,000 FCFA</td>
                                            <td>50,000 FCFA</td>
                                        </tr>
                                        

                                        <tr class="table-theme">
                                            <td>Total: </td>
                                            <td colspan="2">250,000 FCFA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="semister-fee__content v_2 mt--80">
                    <h5 class="rts-section-title">HND in Nursing/Midwifery Program</h5>
                    <!-- tab item -->
                    <div class="rts-fee-chart">

                        <div class="rts-fee-chart__content">
                            <div class="fade show active">
                                <table class="table">
                                    <thead class="table-theme">
                                        <tr>
                                            <th></th>
                                            <th> Registration</th>
                                            <th> First Installment</th>
                                            <th>Second Installment</th>
                                            <th>Internship Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- First Year starts-->
                                        <tr>
                                            <td rowspan="2">First Year</td>
                                            <td>50,000 FCFA</td>
                                            <td>100,000 FCFA</td>
                                            <td>100,000 FCFA</td>
                                            <td>50,000 FCFA</td>
                                        </tr>
                                        <tr class="table-theme">
                                            <td>Total: </td>
                                            <td colspan="3">300,000 FCFA</td>
                                        </tr>
                                        <!-- first year ends -->

                                        <!-- Second Year starts-->
                                        <tr>
                                            <td rowspan="2">Second Year</td>
                                            <td>--</td>
                                            <td>200,000 FCFA</td>
                                            <td>100,000 FCFA</td>
                                            <td>50,000 FCFA</td>
                                        </tr>
                                        <tr class="table-theme">
                                            <td>Total: </td>
                                            <td colspan="3">350,000 FCFA</td>
                                        </tr>
                                        <!-- second year ends -->

                                                                                
                                        <!-- Third Year starts-->
                                        <tr>
                                            <td rowspan="2">Third Year</td>
                                            <td>--</td>
                                            <td>200,000 FCFA</td>
                                            <td>100,000 FCFA</td>
                                            <td>50,000 FCFA</td>
                                        </tr>
                                        <tr class="table-theme">
                                            <td>Total: </td>
                                            <td colspan="3">350,000 FCFA</td>
                                        </tr>
                                        <!-- Third year ends -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="semister-fee__content v_2 mt--80">
                    <h5 class="rts-section-title">Bachelor's Degree in Nursing/Midwifery</h5>
                    <!-- tab item -->
                    <div class="rts-fee-chart">

                        <div class="rts-fee-chart__content">
                            <div class="fade show active">
                                <table class="table">
                                    <thead class="table-theme">
                                        <tr>
                                            <th></th>
                                            <th> First Installment</th>
                                            <th>Second Installment</th>
                                            <th>Internship Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2">Fourth Year</td>
                                            <td>200,000 FCFA</td>
                                            <td>150,000 FCFA</td>
                                            <td>50,000 FCFA</td>
                                        </tr>
                                        <tr class="table-theme">
                                            <td>Total: </td>
                                            <td colspan="2">400,000 FCFA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tution fee end -->
</x-guest-layout>