@extends('layouts.app')

@section('content')
    <section class="main-content">

        <div class="left-section">
            <div class="mayor-box">
                <img src="/image/home/นายก.png" alt="นางสมจิตร">
                {{-- <div class="mayor-info">
                    <h3>นางสมจิตร พันธุ์สุวรรณ</h3>
                    <p>นายกเทศมนตรีตำบลท่าข้าม</p>
                    <p>038-573411 ต่อ 111</p>
                </div> --}}
            </div>

            <div class="license-box">
                <a href="">
                    <img src="/image/home/Buton-1.png" alt="Smart City">
                </a>
            </div>
            <div class="image-top">
                <img src="/image/home/Object.png" alt="">
            </div>
        </div>

        <div class="center-section">

            <div class="phone-box">
                <img class="Phone" src="/image/home/Phone.png" alt="โทรศัพท์มือถือ">
                <div class="phone-overlay">
                    <img class="In-Phone-Banner" src="/image/home/In-Phone-Banner.png" alt="ตราเทศบาล">
                    <a href=""><img class="E-Service-Button" src="/image/home/E-Service-Button.png"
                            alt="e-service"></a>
                    <div class="phone-links">
                        <a href=""><img src="/image/home/Phone-Button-1.png" alt="e-service"></a>
                        <a href=""><img src="/image/home/Phone-Button-2.png" alt="e-service"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-section">
            <div class="image-top-center-section">
                <img src="/image/home/1.png" alt="">
            </div>
            <div class="onestop-box">
                <a href=""><img class="Button-2" src="/image/home/Button-2.png" alt=""></a>
            </div>

            <div class="report-box">
                <img class="Banner-box-1" src="/image/home/Banner.png" alt="">
                <div class="Button-box">
                    <a href=""><img class="Banner-box" src="/image/home/Button-3.png" alt=""></a>
                    <a href=""><img class="Banner-box" src="/image/home/Button-4.png" alt=""></a>
                    <a href=""><img class="Banner-box" src="/image/home/Button-5.png" alt=""></a>
                </div>

            </div>
            <div class="Button-box-last">
                <a href=""><img class="Button-img-last" src="/image/home/Button-6.png" alt=""></a>
                <a href=""><img class="Button-img-last" src="/image/home/Button-7.png" alt=""></a>
            </div>
        </div>
    </section>
@endsection
