@section('title', 'Donate')

<x-guest-layout>

    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/donate/building.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Donation</li>
                        </ul>
                        <h2 class="section-title">Donate </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <div class="rts-scholarship rts-section-padding">
        <div class="container">
            <div class="rts-scholarship-description">
                <div class="row sticky-coloum-wrap justify-content-md-center justify-content-start">
                    <div class="col-lg-8 col-md-11">
                        <div class="program-description-area">
                            <div class="program-about">
                                <h4 class="title">Your generous donation enables us to</h4>
                            </div>
                            <div class="repeating-content">
                                <div class="row g-5">
                                    <div class="col">
                                        <div class="single-information-box rt-theme-bg">
                                            <div class="single-info">

                                                <div class="si__list">
                                                    <ul class="list-unstyled">
                                                        <li class="si__list--single">
                                                            <h4 class="title">Offer affordable healthcare to underserved communities</h4>
                                                        </li>
                                                        <li class="si__list--single">
                                                            <h4 class="title">Train the next generation of nurses, midwives, and healthcare leaders</h4>
                                                        </li>
                                                        <li class="si__list--single">
                                                            <h4 class="title">Provide life-saving treatment, medication, and outreach</h4>
                                                        </li>
                                                        <li class="si__list--single">
                                                            <h4 class="title">Expand our facilities and resources for both medical and educational impact</h4>
                                                        </li>
                                                        <li class="si__list--single">
                                                            <h4 class="title">
                                                                Support our pro-life mission by offering free antenatal care and safe deliveries to single mothers in crisis,
                                                                helping them choose life by removing financial barriers and providing compassionate, ongoing support
                                                            </h4>
                                                        </li>
                                                </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="single-information-box rt-primary-bg big-box">
                                        <div class="single-info">
                                            <h4 class="title"></h4>
                                            <div class="single-info-content">
                                                <p>
                                                    Every year, we counsel young women considering abortion—many of whom feel financially
                                                    unprepared to continue their pregnancies. Your support helps us offer real alternatives
                                                    through free medical care, encouragement, and hope.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- second item -->
                        <div class="repeating-content mt--50">
                            <h5 class="title">How to Donate</h5>
                            <p>
                                We welcome donations from partners and supporters across the globe.
                                You can give using the methods below
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="rts-contact-info">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="rt-theme-bg">
                        <div class="single-info">
                            <div class="single-donation-info">
                                <div>
                                    <img class="donation-channel-image" src="{{asset('/assets/images/payment/western_union.svg')}}" alt="">
                                    <img class="donation-channel-image" src="{{asset('/assets/images/payment/ria.png')}}" alt="">
                                    <img class="donation-channel-image" src="{{asset('/assets/images/payment/moneygram.png')}}" alt="">
                                </div>
                                <h4 class="title"> International Donors (via Western Union / RIA / MoneyGram)</h4>

                                <p class="amount"><u>Receiver:</u>Atem Paul</p>
                                <p class="amount"><u>City:</u>Bamenda, Cameroon</p>
                                <p class="amount"><u>Tel:</u>+237 677770177 / +237 696953664</p>
                                <p class="amount"><u>Email:</u>dratempaul2015@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rt-theme-bg">
                        <div class="single-info">
                            <div class="single-donation-info">
                                <div>
                                    <img class="donation-channel-image" src="{{asset('/assets/images/payment/mtn_momo.jpg')}}" alt="">
                                </div>
                                <h4 class="title"> African Donors (via MTN Mobile Money – MoMo)</h4>
                                <p class="amount"><u>Receiver:</u>Comfort Atem (Financial Manager)</p>
                                <p class="amount"><u>City:</u>Bamenda, Cameroon</p>
                                <p class="amount"><u>Tel:</u>+237 670237210</p>
                                <p class="amount"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rt-theme-bg">
                        <div class="single-info">
                            <div class="single-donation-info">
                                <div>
                                    <img class="donation-channel-image" src="{{asset('/assets/images/payment/paypal.jpg')}}" alt="">
                                </div>
                                <h4 class="title"> PayPal donations can be sent to</h4>
                                <p class="amount"><u>Receiver:</u>Peace Atem (Assistant Financial Manager)</p>
                                <img src="{{asset('/assets/images/payment/paypal_qr.jpg')}}" alt="paypal payment QR code">
                                <p class="amount"></p>
                                <p class="amount"></p>
                                <p class="amount"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt--50">
                <div class="col-lg-6">
                    <div class="rt-theme-bg">
                        <div class="single-info">
                            <a href="https://a.co/d/5qm8mTi" target="_blank" class="single-donation-info">
                                <div class="single-donation-info">
                                    <h4 class="title"> Buy the book - Support the mission</h4>
                                    <p>
                                        Another powerful way to support us is by purchasing the inspirational book written by Dr. Atem Paul:
                                        “Divine Prescriptions: Exploring the Spiritual and Medical Benefits of Worship."
                                    </p>
                                    <p>
                                        All proceeds from the book go directly toward supporting Mount Zion’s work
                                    </p>
                                </div>
                                <img src="{{asset('/assets/images/payment/book_cover.jpg')}}" alt="paypal payment QR code">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="rts-section-padding"></section>
</x-guest-layout>