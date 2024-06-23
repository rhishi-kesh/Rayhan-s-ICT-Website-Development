@extends('layouts.frontendMaster')
@section('title','Certificate')
@section('content')
    @push('css')
    <style>
        .certificateDetails{
            /* padding: 20px; */
            /* border: 3px dashed #E16127; */
            text-align: justify;
        }
        .certificateDetails .certificate-person-detaile{
            border-left: 3px solid #2C347E;
            padding: 8px;
            border-radius: 5px;
            background: #F3F4FF;
        }
        b{
            color: #000;
        }
        .result h4{
            font-size: 18px;
            font-weight: 600;
            color: #2C347E;
            margin-top: 19px;
            text-align: left;
        }
        .result svg{
            transform: rotate(90deg);
            margin-right: 10px;
            color: #E16127;
        }
        .single_course_header svg{
            color: #E16127;
        }
        .completedCourse h4{
            font-size: 18px;
            font-weight: 600;
            color: #2C347E;
            margin-top: 19px;
            text-align: left;
        }
        .courseBenifites{
            max-height: 180px;
            overflow: hidden;
            position: relative;
        }

        .courseBenifites::before{
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background-image: linear-gradient(to top, #fff, rgba(255, 255, 255, 0.6))
        }
        .completedCourse .single_course_header{
            background: transparent;
        }
        .single_course_header .detailes{
            text-decoration: none;
          color: var(--white);
          background: var(--blue);
          padding: 10px 20px;
          border-radius: 20px;
          transition: all 0.6s;
          overflow: hidden;
          position: relative;
          z-index: 1;
          display: inline-block;
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        @font-face {
            font-family: english_font;
            src: url('{{ storage_path('fonts/Montserrat-ExtraBoldItalic.ttf') }}') format("truetype");
        }

        .font-paragraph {
            font-family: english_font;
        }
        .certificate{
            width: 746px;
            position: relative;
            color: black;
            font-family: Georgia, serif;
            font-size: 18px;
            text-align: center;
            user-select: none;
            pointer-events: none;
        }

        .wrap-content {
            width: 75%;
            margin: 125px auto 0 auto;
        }

        .purpose {
            color: rgb(17, 17, 16);
            font-size: 80px;
            line-height: 50px;
        }

        .assignment {
            color: rgb(49, 42, 42);
            font-size: 40px;
        }

        .person {
            font-size: 30px;
            font-style: italic;
            color: #29397e;
            font-weight: 700;
            margin-bottom: 0;
        }

        .signature {
            border-top: 2px solid #525053;
            font-size: 20px;
            font-style: italic;
            width: 210px;
            margin-top: 70px;
            text-align: left;
        }

        .details {
            margin-bottom: 20px;
            text-align: justify;
        }

        .grade {
            margin-top: 40px;
            text-align: justify;
        }

        .img1 {
            top: 0;
            left: 0;
            position: absolute;
            width: 400px;
        }

        .img2 {
            bottom: 0;
            right: 0;
            position: absolute;
            width: 400px;
        }

        .qr {
            width: 100px;
            display: block;
            margin-bottom: 20px;
        }

        #peragraph {
            color: #39383a;
        }
        .certificate .logo{
            display: flex;
            justify-content: space-between;
        }
        .certificate .logo img{
            margin: 35px 0;
        }
        .certificate .logo1 {
            width: 150px;
        }
        .certificate .logo2 {
            width: 60px;
        }

        .certificate .bold {
            font-weight: 500;
        }

    </style>
    @endpush
    <section class="py-2 py-md-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 d-none d-md-block">
                    <div style="overflow-x: auto;">
                        <div class="certificate" style="border: 1px solid #000">
                            <img class="img1" src="{{ asset('frontend/img/RICT 1.png') }}" alt="" />
                            <div class="wrap-content">
                                <div class="logo">
                                    <img class="logo1" src="{{ asset('logo.png') }}" alt="Rayhan's_img" />
                                    <img class="logo2" src="{{ asset('frontend/img/2.png') }}" alt="Bteb_img" />
                                </div>
                                <div class="first-part">
                                    <p class="purpose font-paragraph mb-0" style="text-transform: uppercase;"> Certificate </p>
                                    <p id="peragraph" class="font-paragraph assignment mb-0" style="text-transform: uppercase;  margin-top: 10px;"> of Participation </p>
                                    <p id="peragraph" class="font-paragraph assignment mb-0"> Presented to: </p>
                                    <p class="person font-paragraph" style="margin-top: 20px;">{{ $data['name'] ?? '-' }}</p>
                                    <div style="height: 2px; background-color: #000; width: 70%; margin: 0px auto 5px auto;"></div>
                                    <p id="peragraph"> ID: <span> {{ $data['student_id'] ?? '-' }} </span> </p>
                                </div>
                                <div class="reason font-paragraph ">
                                    <p id="peragraph" class="details" style="margin-top: 20px;">
                                        This certificate is awarded to <span class="bold">{{ $data['name'] ?? '-' }}</span> <span> Son</span> of
                                        <span class="bold">{{ $data['fName'] ?? '-' }}</span>, who has successfully completed our <span class="bold">{{ $data['course']['name'] ?? '-' }} </span> course from <span class="bold">COURSE Start</span> to <span class="bold">COURSE End.</span>
                                    </p>
                                    <p id="peragraph" class="grade" style="margin-top: 20px;">
                                        <span> His</span> Grade was <span class="bold">A+</span> at under the Rayhan's ICT Limited.
                                    </p>
                                    <p id="peragraph" class="signature font-paragraph">
                                        Co-ordinator <br />
                                        Name <br>
                                        Date:...................
                                    </p>
                                    <img class="qr" src="">
                                </div>
                            </div>
                            <img class="img2" src="{{ asset('frontend/img/RICT 2.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="certificateDetails">
                        <p class="certificate-person-detaile"><b>Rhishi kesh Bhowmik</b> ১৪ এপ্রিল, ২০২৪ তারিখে <b>Full Stack Web Development</b> কোর্সটি সফলভাবে সম্পন্ন করেছেন <b>Rayhan's ICT</b> থেকে।</p>
                        <div class="result">
                            <h4>কোর্স চলাকালীন সময়ে ওনার একাডেমিক রেজাল্ট:</h4>
                            <div>
                                <p class="mb-0">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24" viewBox="0 0 24 24"  fill="none" stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" /><path d="M11 11.5v-2a1.5 1.5 0 1 1 3 0v2.5" /><path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" /><path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" /></svg>
                                    Homework - <b>70%</b>
                                </p>
                                <p class="mb-0">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" /><path d="M11 11.5v-2a1.5 1.5 0 1 1 3 0v2.5" /><path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" /><path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" /></svg>
                                    Attendance - <b>50%</b>
                                </p>
                                <p class="mb-0">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" /><path d="M11 11.5v-2a1.5 1.5 0 1 1 3 0v2.5" /><path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" /><path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" /></svg>
                                    Overall Result - <b>A+</b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="completedCourse">
                        <h4>সম্পন্নকৃত কোর্স:</h4>
                        <div class="single_course_header mt-0 pt-2" style="background-color: transparent;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-start">
                                        <div class="banner d-block">
                                            <img src="http://test.interiorbangladesh.com/storage/CourseDetails/1707811603.png" alt="" class="img-fluid">
                                        </div>
                                        <h3 class="fs-2 mb-0 mt-2">Web Design</h3>
                                        <h5 class="fw-bold my-3">৳15000</h5>
                                        <h4>এই কোর্স থেকে কি কি শিখবেন?:</h4>
                                        <div class="courseBenifites">
                                            <p class="mb-0">
                                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z"></path></svg>
                                                কোর্স শেষে ফ্রি ইন্টার্নশীপের সুযোগ।
                                            </p>
                                            <p class="mb-0">
                                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z"></path></svg>
                                                কোর্স শেষে ফ্রি ইন্টার্নশীপের সুযোগ।
                                            </p>
                                            <p class="mb-0">
                                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z"></path></svg>
                                                কোর্স শেষে ফ্রি ইন্টার্নশীপের সুযোগ।
                                            </p>
                                            <p class="mb-0">
                                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z"></path></svg>
                                                কোর্স শেষে ফ্রি ইন্টার্নশীপের সুযোগ।
                                            </p>
                                            <p class="mb-0">
                                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z"></path></svg>
                                                কোর্স শেষে ফ্রি ইন্টার্নশীপের সুযোগ।
                                            </p>
                                            <p class="mb-0">
                                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z"></path></svg>
                                                কোর্স শেষে ফ্রি ইন্টার্নশীপের সুযোগ।
                                            </p>
                                        </div>
                                        <p class="mb-1">
                                            <a href="" class="detailes">Details </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best-selling-course -->
    <section class="best-selling Course py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-0">Our Best Selling Course</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="course_items">
                        <div class="bestSelling">
                            @foreach ($bestSelling as $item)
                                <div class="col mt-4 mx-1">
                                    <div class="card">
                                        <a href="{{ route('singleCourse',$item->slug) }}" class="img">
                                            <img src="{{ asset('storage/CourseDetails/'. $item->courseDetails->thumbnail) }}" alt="">
                                        </a>
                                        <div class="card-body pb-2">
                                                    <h5>
                                                        <a href="{{ route('singleCourse',$item->slug) }}">{{ $item->name }}</a>
                                                    </h5>
                                                    <p><b>৳{{ $item->courseDetails->price }}</b></p>

                                                    <div class="row text-start other_detailes ps-2">
                                                        <div class="col-12 col-md-4 p-0">
                                                            <p class="text-start text-md-center" style="white-space: nowrap;"><i class="ti-time me-2 mt-1"></i> <span class="font-paragraph">সময়কাল:</span> {{ $item->courseDetails->duration }} <span class="font-paragraph">মাস</span></p>
                                                        </div>
                                                        <div class="col-12 col-md-4 p-0">
                                                            <p class="text-start text-md-center"><i class="ti-book me-2 mt-1"></i> <span class="font-paragraph">ক্লাস:</span> {{ $item->courseDetails->lecture }}</p>
                                                        </div>
                                                        @if(!empty($item->courseDetails->project))
                                                            <div class="col-12 col-md-4 p-0">
                                                                <p class="text-start"><i class="ti-target me-2 mt-1"></i> <span class="font-paragraph">প্রজেক্ট:</span> {{ $item->courseDetails->project }}+</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="d-block d-md-flex justify-content-between align-items-center text-center">
                                                        <p class="mb-1">
                                                            <a href="{{ route('demoClass') }}" class="buy-btn">Apply For Demo Class</a>
                                                        </p>
                                                        <p class="mb-1">
                                                            <a href="{{ route('singleCourse',$item->slug) }}" class="buy-btn">Details</a>
                                                        </p>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('jss')
        <script>
        // Disable right-click
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        function ctrlShiftKey(e, keyCode) {
        return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
        }

        document.onkeydown = (e) => {
        Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
        if (
            event.keyCode === 123 ||
            ctrlShiftKey(e, 'I') ||
            ctrlShiftKey(e, 'J') ||
            ctrlShiftKey(e, 'C') ||
            (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
        )
            return false;
        };

    </script>
    @endpush
@endsection
