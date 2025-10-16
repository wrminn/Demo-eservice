@php
    if (!auth()->check()) {
        $layout = 'layouts.app';
    } else {
        $layout = 'layouts.dashboard';
    }
@endphp
@extends($layout)

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template/eservice.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template/menueser.css') }}">

    <style>
        .chat-box {
            max-height: 400px;
            overflow-y: auto;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
        }

        .message {
            display: flex;
            margin-bottom: 10px;
        }

        .message.left {
            justify-content: flex-start;
        }

        .message.right {
            justify-content: flex-end;
        }

        .bubble {
            max-width: 70%;
            padding: 10px 15px;
            border-radius: 15px;
            position: relative;
            background: #e4e6eb;
            color: #333;
        }

        .message.right .bubble {
            background: #4caf50;
            color: white;
        }

        .time {
            font-size: 12px;
            opacity: 0.6;
            margin-top: 3px;
            text-align: right;
        }
    </style>

    <section class="eservice-content">
        <div class="button-go-back">
            <a href="">
                <img class="Back-Button" src="/image/E-Service/Back-Button.png" alt="">
            </a>
        </div>
        <div class="b-detail">

            @include('layouts.menueser')
            <div class="form-wrapper">
                <h4 class="mb-4 text-center">ประวัติการส่งคำร้อง</h4>
                <table class="table caption-top" id="myTable" style="text-align: center;">

                    <thead>
                        <tr>
                            <th scope="col" class="col-1" style="width: 12%;">วันที่</th>
                            <th scope="col"class="col-2" style="width: 20%;">ผู้ดำเนินการ</th>
                            <th scope="col"class="col-2" style="width: 28%;">แบบฟอร์ม</th>
                            <th scope="col"class="col-2" style="width: 10%;">สถานะ</th>
                            <th scope="col"class="col-2" style="width: 20%;">จัดการคำร้อง</th>
                            <th scope="col"class="col-2" style="width: 10%;">แนบไฟล์เพิ่ม</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($list->isEmpty())
                            <tr>
                                <td colspan="5" align="center">ไม่มีข้อมูลในหัวข้อนี้</td>
                            </tr>
                        @else
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->field_date }}</td>
                                    <td>
                                        @if ($item->form_status === 'C')
                                            <span class="badge bg-success rounded-pill px-3 py-2">
                                                ● {{ $NameUser[$item->form_user_update] ?? 'Admin .' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->form_name }}

                                    </td>
                                    <td>
                                        @if ($item->form_status === 'P')
                                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                                ● รอดำเนินการ
                                            </span>
                                        @elseif ($item->form_status === 'C')
                                            <span class="badge bg-success rounded-pill px-3 py-2">
                                                ● ดำเนินการแล้ว
                                            </span>
                                        @elseif ($item->form_status === 'N')
                                            <span class="badge bg-secondary rounded-pill px-3 py-2">
                                                ● admin ขอข้อมูลเพิ่มเติม
                                            </span>
                                        @elseif ($item->form_status === 'M')
                                            <span class="badge bg-warning rounded-pill px-3 py-2">
                                                ● รอการตรวจสอบ
                                            </span>
                                        @endif
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary btn-sm btn-info-detail"
                                            data-bs-toggle="modal" data-bs-target="#infoModal"
                                            data-uploads="{{ json_encode($item->file) }}"
                                            data-status="{{ $item->form_status }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-richtext" viewBox="0 0 16 16">
                                                <path
                                                    d="M7 4.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0m-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208M5 9a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z" />
                                                <path
                                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
                                            </svg>
                                        </button>

                                        <a href="{{ route('GeneralRequestsAdminExportPDF', ['form' => $item->gennerricforms_id, 'id' => $item->form_id]) }}"
                                            target="_black">
                                            <button type="button" class="btn btn-danger btn-sm" fdprocessedid="sivkwg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </a>
                                        @if ($item->form_status != 'C')
                                            <button type="button" class="btn btn-success btn-sm btn-show-chat btn-reply"
                                                data-bs-toggle="modal" data-bs-target="#chatModal"
                                                data-id="{{ $item->form_id }}" data-form="{{ $item->gennerricforms_id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                </svg>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->form_status === 'N')
                                            <button type="button" class="btn btn-primary btn-sm btn-attach-file"
                                                data-bs-toggle="modal" data-bs-target="#attachModal"
                                                data-id="{{ $item->form_id }}" data-form="{{ $item->gennerricforms_id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark-arrow-up"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z" />
                                                    <path
                                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                </svg>
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>
            </div>

        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายละเอียดคำร้อง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>สถานะ:</strong> <span id="modal-status"></span></p>
                    <ul id="modal-files"></ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="chatModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">การสนทนา</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="chat-box" class="chat-box">


                    </div>

                    <form id="chatForm" method="POST" action="{{ route('eservice.reply') }}" class="mt-3 d-flex">
                        @csrf
                        <input type="hidden" name="form_id" id="modal-form-id">
                        <input type="text" name="reply_message" class="form-control me-2"
                            placeholder="พิมพ์ข้อความ..." required>
                        <button type="submit" class="btn btn-success">ส่ง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="attachModal" tabindex="-1" aria-labelledby="attachModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attachModalLabel">แนบไฟล์เพิ่มเติม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                <div class="modal-body">
                    <form id="attachForm" method="POST" action="{{ route('upload.file.user') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form_id" id="attachFormId">
                        <input type="hidden" name="generic_id" id="attachGenericId">

                        <div class="mb-3">
                            <label for="attachFile" class="form-label">เลือกไฟล์ที่ต้องการแนบ (สูงสุด 2 ไฟล์ รวมไม่เกิน 5
                                GB)</label>
                            <input class="form-control" type="file" id="attachFile" name="file[]" multiple required>
                            <small id="fileInfo" class="text-muted d-block mt-1"></small>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">อัปโหลด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-info-detail');

            buttons.forEach(button => {
                button.addEventListener('click', function() {

                    const statusEl = document.getElementById('modal-status');
                    const fileList = document.getElementById('modal-files');

                    if (!statusEl || !fileList) {
                        console.error('Modal elements not found');
                        return;
                    }

                    // set text

                    const statusCode = this.dataset.status;
                    let statusText = '';
                    let statusColor = '';

                    switch (statusCode) {
                        case 'P':
                            statusText = 'รอดำเนินการ';
                            statusColor = 'text-danger';
                            break;
                        case 'C':
                            statusText = 'ดำเนินการแล้ว';
                            statusColor = 'text-success';
                            break;
                        case 'N':
                            statusText = 'กำลังขอข้อมูลเพิ่มเติม';
                            statusColor = 'text-warning';
                            break;
                        case 'M':
                            statusText = 'มีข้อมูลเพิ่มเติมจากประชาชน';
                            statusColor = 'text-info';
                            break;
                        default:
                            statusText = 'ไม่ทราบสถานะ';
                            statusColor = 'text-secondary';
                    }

                    statusEl.textContent = `● ${statusText}`;
                    statusEl.className = `badge rounded-pill px-3 py-2 ${statusColor}`;


                    fileList.innerHTML = '';
                    let uploads = JSON.parse(this.dataset.uploads || '[]');

                    if (uploads.length > 0) {
                        uploads.forEach((file, index) => {
                            let extraText = file.form_type === 'N' ?
                                '<small class="text-muted ms-1">(ไฟล์แนบเพิ่มเติม)</small>' :
                                '';

                            let li = document.createElement('li');
                            li.innerHTML =
                                `<a href="{{ asset('storage') }}/${file.form_path}" target="_blank">ไฟล์แนบ ${index + 1}</a> ${extraText}`;
                            fileList.appendChild(li);
                        });
                    } else {
                        let li = document.createElement('li');
                        li.textContent = 'ไม่มีไฟล์แนบ';
                        fileList.appendChild(li);
                    }


                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-show-chat").forEach(button => {
                button.addEventListener("click", function() {
                    const formId = this.getAttribute("data-id");
                    const formType = this.getAttribute("data-form");

                    document.getElementById("modal-form-id").value = formId;
                    document.getElementById("chatForm").dataset.formType = formType;

                    fetch(`/eservice/chatuser/${formId}`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById("chat-box").innerHTML = html;
                        });
                });
            });

            // เมื่อกดส่งข้อความ
            document.getElementById("chatForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formId = document.getElementById("modal-form-id").value;
                const message = this.querySelector("[name='reply_message']").value;
                const formType = this.dataset.formType;

                fetch("{{ route('eservice.reply.user') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            form_id: formId,
                            reply_message: message,
                            form: formType
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // โหลดข้อความใหม่
                            fetch(`/eservice/chatuser/${formId}`)
                                .then(r => r.text())
                                .then(html => {
                                    document.getElementById("chat-box").innerHTML = html;
                                    document.querySelector("[name='reply_message']").value = '';
                                });
                        }
                    });
            });
        });
    </script>

    <script>
        document.getElementById('attachFile').addEventListener('change', function() {
            const files = this.files;
            const info = document.getElementById('fileInfo');
            info.textContent = '';

            // ✅ จำกัดจำนวนไฟล์
            if (files.length > 2) {
                alert('สามารถเลือกไฟล์ได้ไม่เกิน 2 ไฟล์เท่านั้น');
                this.value = '';
                return;
            }

            // ✅ คำนวณขนาดรวม
            let totalSize = 0;
            for (let file of files) {
                totalSize += file.size;
            }

            const maxSize = 5 * 1024 * 1024 * 1024; // 5 GB
            if (totalSize > maxSize) {
                alert('ขนาดรวมของไฟล์ต้องไม่เกิน 5 GB');
                this.value = '';
                return;
            }

            // ✅ แสดงข้อมูลไฟล์
            const sizeGB = (totalSize / (1024 * 1024 * 1024)).toFixed(2);
            info.textContent = `เลือก ${files.length} ไฟล์ รวมขนาด ${sizeGB} GB`;
        });
    </script>

    <script>
        document.querySelectorAll('.btn-attach-file').forEach(button => {
            button.addEventListener('click', function() {
                const formId = this.getAttribute('data-id');
                const genericId = this.getAttribute('data-form');
                document.getElementById('attachFormId').value = formId;
                document.getElementById('attachGenericId').value = genericId;
            });
        });
    </script>

@endsection
