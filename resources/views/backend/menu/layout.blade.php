<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu/summernote-lite.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* --- Summernote Fullscreen Override --- */
        .note-editor.fullscreen {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #fff !important;
            z-index: 9999 !important;
            /* ให้ลอยบนสุด */
            display: flex !important;
            flex-direction: column !important;
        }

        /* Toolbar ด้านบน */
        .note-editor.fullscreen .note-toolbar {
            flex: 0 0 auto !important;
            border-bottom: 1px solid #ddd !important;
            background: #f8f9fa !important;
            z-index: 10000 !important;
        }

        /* เนื้อหาที่แก้ไข */
        .note-editor.fullscreen .note-editing-area {
            flex: 1 1 auto !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
        }

        .note-editor.fullscreen .note-editable {
            flex: 1 1 auto !important;
            height: auto !important;
            overflow-y: auto !important;
            padding: 15px !important;
            background: #fff !important;
        }

        /* Footer (status bar) */
        .note-editor.fullscreen .note-statusbar {
            flex: 0 0 auto !important;
            border-top: 1px solid #ddd !important;
            background: #f8f9fa !important;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">ท่าข้าม</div>

        <div class="profile" id="profileBtn">
            <img src="{{ asset('/image/home/LOGO.png') }}" alt="Profile">
            <div class="info">ผู้ใช้งาน ({{$Position->positions_name}})</div>
            <div class="profile-popup" id="profilePopup">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-blue-600 hover:text-blue-800">
                    ออกจากระบบ
                </a>
            </div>
        </div>

        <!-- เมนู -->
        @include('backend.menu.menuposition')
        
    </div>
    <div class="main-content">
        @yield('content')
    </div>

</body>
<script src="{{ asset('js/menu/main.js') }}"></script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ!',
            text: '{{ session('success') }}',
            confirmButtonText: 'ตกลง'
        });
    </script>
@endif


</html>
