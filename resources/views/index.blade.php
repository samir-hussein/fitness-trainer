@extends('layouts.main')

@section('style')
    <style>
        div.uk-position-relative ul li img {
            height: 100% !important;
            width: 100% !important;
        }

        div.uk-panel {
            height: 100% !important;
            text-align: center;
        }

        #about-img {
            cursor: pointer;
            transition: 1.5s transform;
        }

        #about-img:hover {
            transform: scale(1.1);
        }

        .btn-subscribe {
            padding: 1.5% 3.5%;
            border-radius: 10px;
            background-color: #FF0000 !important;
            border: none !important;
        }

        .btn-subscribe a {
            display: block;
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

        h1 {
            font-size: 55px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
            -webkit-text-stroke: 1px #f6f7f8;
            -webkit-text-fill-color: transparent;
        }

        @media (max-width: 575.98px) {
            #service-card-body {
                padding: 0 !important;
            }
        }
    </style>
@endsection

@section('content')
    <main>
        <!--? slider Area Start-->
        <div style="height: 600px" class="slider uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
            uk-slider="autoplay: true;sets: true">

            <ul class="h-100 uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
                @isset($slider)
                    @foreach ($slider as $img)
                        <li>
                            <div class="uk-panel">
                                <img src="/images/{{ $img->img }}" alt="ahmed saeid fitness"
                                    style="object-fit: contain;background: radial-gradient(circle at 24.1% 68.8%, rgb(50, 50, 50) 0%, rgb(0, 0, 0) 99.4%);">
                            </div>
                        </li>
                    @endforeach
                @endisset
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                uk-slider-item="next"></a>

        </div>
        <!-- slider Area End-->
        <!-- Traning categories Start -->
        <section class="traning-categories pt-5" id="traning-categories">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-0 wow fadeInUp" data-wow-duration="2s"
                            data-wow-delay=".1s">
                            <h1 class="text-center mb-0">Ahmed Saeid Fitness</h1>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-11 col-md-9 m-auto uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
                        @isset($services)
                            @foreach ($services as $service)
                                <div id="service-card-body">
                                    <div class="d-flex flex-column justify-content-between uk-border-rounded uk-box-shadow-medium uk-card uk-card-body"
                                        style="background-color: #FFE22D">


                                        <h3 class="uk-card-title text-center" style="font-weight: 900">{{ $service->name }}</h3>
                                        <p class="text-right">{{ $service->desc }}</p>
                                        <div>
                                            <h4 class="uk-card-title text-center" dir="rtl">{{ $service->price }} جنية مصرى
                                            </h4>
                                            <button class="btn btn-info m-auto d-block"><a
                                                    style="color: white;text-decoration:none"
                                                    href="{{ route('buy.form', ['id' => $service->name]) }}">اشترى
                                                    الان</a></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </section>
        <!-- Traning categories End-->

        <!--? Gallery Area Start -->
        <div class="gallery-area section-padding30 " id="gallery-area">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-55 wow fadeInUp" data-wow-duration="2s"
                            data-wow-delay=".1s">
                            <h2>النتائج</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 m-auto uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                        uk-slider="autoplay: true">

                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
                            @isset($result_slider)
                                @foreach ($result_slider as $item)
                                    <li>
                                        <div class="uk-panel h-100">
                                            <img class="uk-border-rounded uk-box-shadow-medium"
                                                src="/images/{{ $item->img }}" alt="ahmed saeid fitness results">

                                        </div>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                            uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                            uk-slidenav-next uk-slider-item="next"></a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery Area End -->
        <!-- Courses area start -->
        <section class="pricing-area section-padding40 fix" id="pricing-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-55 wow fadeInUp" data-wow-duration="2s"
                            data-wow-delay=".1s">
                            <h2>باقات المتابعه</h2>
                        </div>
                    </div>
                </div>
                <div class="row" dir="rtl">
                    @isset($packages)
                        @foreach ($packages as $package)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="properties mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                    <div class="properties__card">
                                        <div class="properties__caption" dir="rtl">
                                            <p class="month text-center">{{ $package->name }}</p>
                                            <span class="month d-block text-right">{{ $package->duration }}
                                                {{ $package->duration > '1' ? 'شهور' : 'شهر' }}</span>
                                            <p class="mb-25 text-right">{{ $package->price }} جنيه مصرى</p>
                                            <div class="single-features">
                                                <div class="features-icon">
                                                    <img src="assets/img/icon/check.svg" alt="icon">
                                                </div>
                                                <div class="features-caption mr-3">
                                                    <p>متابعة يوميا على الواتساب</p>
                                                </div>
                                            </div>
                                            <div class="single-features">
                                                <div class="features-icon">
                                                    <img src="assets/img/icon/check.svg" alt="icon">
                                                </div>
                                                <div class="features-caption mr-3">
                                                    <p>نظام غذائى مخصص لهدفك</p>
                                                </div>
                                            </div>
                                            <div class="single-features">
                                                <div class="features-icon">
                                                    <img src="assets/img/icon/check.svg" alt="icon">
                                                </div>
                                                <div class="features-caption mr-3">
                                                    <p>نظام تدريبى يومى خاص بك</p>
                                                </div>
                                            </div>
                                            <div class="single-features">
                                                <div class="features-icon">
                                                    <img src="assets/img/icon/check.svg" alt="icon">
                                                </div>
                                                <div class="features-caption mr-3">
                                                    <p>نظام فيتامينات خاص باحتياجاتك</p>
                                                </div>
                                            </div>
                                            <div class="single-features">
                                                <div class="features-icon">
                                                    <img src="assets/img/icon/check.svg" alt="icon">
                                                </div>
                                                <div class="features-caption mr-3">
                                                    <p>نظام مكملات على حسب اختيارك</p>
                                                </div>
                                            </div>
                                            <div class="single-features mb-20">
                                                <div class="features-icon">
                                                    <img src="assets/img/icon/check.svg" alt="icon">
                                                </div>
                                                <div class="features-caption text-right mr-3">
                                                    <p>يتم تغير البرنامج شهريا على حسب التغيرات</p>
                                                </div>
                                            </div>
                                            <a href="{{ route('buy.form', ['id' => $package->name]) }}"
                                                class="border-btn border-btn2">اشترك الان</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </section>
        <!-- Courses area End -->
        <!--? About Area-2 Start -->
        <section class="about-area2 fix pb-padding pt-50 pb-80" id="about-us">
            <div class="support-wrapper justify-content-center align-items-center" dir="rtl">
                <div class="right-content2" dir="rtl">
                    <!-- img -->
                    <div class="right-img wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                        <img src="/images/{{ $about->img }}" alt="ahmed saeid fitness"
                            class="d-block m-auto uk-border-rounded uk-box-shadow-medium"
                            style="width: 450px;height:600px; object-fit: contain;background: radial-gradient(circle at 24.1% 68.8%, rgb(50, 50, 50) 0%, rgb(0, 0, 0) 99.4%);"
                            id="about-img">
                    </div>
                </div>
                <div class="left-content2" dir="rtl">
                    <!-- section tittle -->
                    <div class="section-tittle2 mb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="front-text">
                            <h2 class="text-right">من نحن</h2>
                            <p class="text-right">{{ $about->body }}</p>
                            <a href="{{ route('buy.form') }}" class="border-btn">اشترك الان</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <!--? video_start -->
        <div class="video-area section-bg2">
            <video src="/videos/{{ $about->video }}" controls poster="/images/{{ $about->video_poster }}"
                class="d-block m-auto w-100 h-100"></video>
        </div>
        <!-- video_end -->
        <!-- ? services-area -->
        <section class="services-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="features-icon">
                                <img src="assets/img/icon/phone.png" alt="phone icon">
                            </div>
                            <div class="features-caption">
                                <h3>Phone</h3>
                                <p>{{ $about->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-40 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                            <div class="features-icon">
                                <img src="assets/img/icon/gmail.png" alt="gmail icon">
                            </div>
                            <div class="features-caption">
                                <h3>Email</h3>
                                <p>{{ $about->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
