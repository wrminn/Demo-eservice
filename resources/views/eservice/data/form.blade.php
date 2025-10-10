@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/template/eservice.css') }}">
    <!-- Masonry.js -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <section class="eservice-content">
        <div class="button-go-back">
            <a href="">
                <img class="Back-Button" src="/image/E-Service/Back-Button.png" alt="">
            </a>
        </div>
        <div class="box-form">
            {{-- สำนักปลัด --}}
            <div class="box-list form-table-1">
                
                <img class="Back-Button" src="/image/E-Service/2.png" alt=""> 
                <div class="list-title">
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องทั่วไป
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องขอติดตั้งป้ายโฆษณาริมถนนสาธารณะ
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องเรียนการทุจริตและประพฤติมิชอบของเจ้าหน้าที่
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำขอเครื่องหมายรับรองผู้ประกอบธุรกิจพาณิชย์อิเล็กทรอนิกส์ (DBD Registered)
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำขอจดทะเบียนพาณิชย์ (ใหม่/เปลี่ยนแปลง/ยกเลิก)
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องทะเบียนพาณิชย์
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คําขอตรวจค้นเอกสาร/รับรองสําเนาเอกสาร/ใบแทน
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        หนังสือมอบอำนาจ
                    </a>
                </div>
            </div>

            {{-- กองคลัง --}}
            {{-- <div class="box-list form-table-2">
                
                <img class="Back-Button" src="/image/E-Service/6.png" alt="">
                <div class="list-title">
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        (ภ.ป.๑) แนบแสดงรายการป้ายภาษี
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        หนังสือขอผ่อนชำระเงินภาษีที่ดินและสิ่งปลูกสร้าง
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        (ภ.ด.ส.๑๐) คำร้องคัดค้านการประเมินภาษีหรือการเรียนเก็บภาษีที่ดินและสิ่งปลูกสร้าง
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        (ภ.ป.ส.๕) แบบแจ้งการเปลี่ยนแปลงการใช้ประโยชน์ที่ดินหรือสิ่งปลูกสร้าง
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        (ภ.ป.ส.๙) คำร้องขอรับเงินภาษีที่ดินและสิ่งปลูกสร้างคืน
                    </a>


                </div>
            </div> --}}

             {{-- กองช่าง --}}
            <div class="box-list form-table-3">
               
                <img class="Back-Button" src="/image/E-Service/3.png" alt="">
                <div class="list-title">
                    <a href="" class="table-form"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องทั่วไป (ซ่อมไฟฟ้าสาธารณะ , ซ่อมแซมถนน)
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        ใบแจ้งการขุดดินหรือถมดิน
                    </a>
                </div>
            </div>

            {{-- กองการศึกษา --}}
            <div class="box-list form-table-4">
                
                <img class="Back-Button" src="/image/E-Service/5.png" alt="">
                <div class="list-title">
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        ใบสมัครเรียน  ศพด.บ้านท่าข้าม
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดบางแสม
                    </a>
                    <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดคลองพานทอง
                    </a>
                </div>
            </div>
            
            {{-- กองยุทธศาสตร์และงบประมาณ --}}
            <div class="box-list form-table-5">
                
                <img class="Back-Button" src="/image/E-Service/8.png" alt="">
                <div class="list-title">
                   <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องขอข้อมูลข่าวสาร
                    </a>
                   
                </div>
            </div>

            {{-- กองสาธารณสุขฯ --}}
            <div class="box-list form-table-5">
                
                <img class="Back-Button" src="/image/E-Service/4.png" alt="">
                <div class="list-title">
                   <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องขอถังขยะ
                    </a>
                   
                </div>
            </div>

            {{-- กองสวัสดิการสังคม --}}
            <div class="box-list form-table-5">
                
                <img class="Back-Button" src="/image/E-Service/7.png" alt="">
                <div class="list-title">
                   <a href="" class="table-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        คำร้องทั่วไปขอรับการช่วยเหลือ
                    </a>
                   
                </div>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var grid = document.querySelector('.box-form');
            var msnry = new Masonry(grid, {
                itemSelector: '.box-list',
                columnWidth: '.box-list',
                percentPosition: true,
                gutter: 20
            });
        });
    </script>
@endsection
