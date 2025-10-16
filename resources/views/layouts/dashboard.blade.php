<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'เทศบาลตำบลท่าข้าม')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/template/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template/body.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <section class="header-section">
            <div class="header-container">
                <div class="header-text-left">
                    <a href="#"><img src="/image/home/LOGO.png" alt="โลโก้" class="header-logo"></a>
                    <div class="heard-title-box">
                        <div class="header-title-th">เทศบาลตำบลท่าข้าม</div>
                        <div class="header-box-contact">
                            <div class="header-text-eservice">ระบบยื่นคำร้องออนไลน์ </div>
                            <div class="header-img-eservice">
                                <img src="/image/home/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-text-right">
                    <div class="header-box-logout">
                        <div class="header-logout-title">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="text-blue-600 hover:text-blue-800">
                                <img src="/image/E-Service/Logout-Button.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="text-login">*คำแนะนำ* สมัครสมาชิกเพื่อติดตามสถานะการดำเนินการ</div>

                </div>
            </div>
        </section>

        <main class="py 4">
            @yield('content')
        </main>

        <section class="footer">
            <div class="footer-name">เทศบาลตำบลท่าข้าม จังหวัดฉะเชิงเทรา</div>
            <div class="footer-contact">
                <div class="footer-contact-one">
                    <img src="/image/home/Map-icon.png" alt="">
                    <div class="text-footer-one">
                        122 หมู่ที่ 3 ตำบลท่าข้าม อำเภอบางปะกงจังหวัดฉะเชิงเทรา 24130
                    </div>
                </div>
                <div class="footer-contact-two">
                    <img src="/image/home/Call-icon.png" alt="">
                    <div class="text-footer-two">
                        0-3857-3411-2 ต่อ 144
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>
