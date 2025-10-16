<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PDF Report</title>

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun-bold';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew-Bold.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', 'sarabun-bold', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            line-height: 1;
        }


        .regis_number {
            text-align: right;
            margin-right: 8px;
        }

        .title_doc {
            text-align: center;
        }

        .box_text {
            border: 1px solid rgb(255, 255, 255);
            text-align: center;
        }

        .box_text span {
            display: inline-flex;
            align-items: center;
            line-height: 1;
        }

        .box_text input[type="checkbox"] {
            width: 17px;
            /* ปรับขนาด checkbox ให้พอดีกับข้อความ */
            height: 17px;
            /* ปรับความสูงให้พอดีกับข้อความ */
            margin-right: 5px;
            margin-left: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
        }

        .box_text_border {
            margin-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            margin-bottom: 5px;
            border: 2px solid black;
            text-align: left;
            ;
        }

        .box_text_border span {
            display: inline-flex;
            align-items: left;
            line-height: 0.3;
        }

        .box_text_border input[type="checkbox"] {
            width: 17px;
            /* ปรับขนาด checkbox ให้พอดีกับข้อความ */
            height: 17px;
            /* ปรับความสูงให้พอดีกับข้อความ */
            margin-right: 5px;
            margin-left: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
        }

        .dotted-line {
            margin-left: 2px;
            color: blue;
            border-bottom: 2px dotted blue;
            word-wrap: break-word;

            overflow-wrap: break-word;
        }

        .footer {
            position: absolute;
            /* ทำให้ footer ยึดที่ด้านล่าง */
            bottom: -50px;
            font-size: 23px;
            /* ตั้งให้ footer อยู่ที่ด้านล่างสุดของหน้ากระดาษ */
            width: 100%;
            /* ให้ footer กว้างเต็มหน้ากระดาษ */
            text-align: center;
            /* จัดข้อความให้ตรงกลาง */
            padding: 5px 0;
            /* เพิ่มพื้นที่ด้านบนและล่างให้กับ footer */
        }
    </style>
</head>

<body>

    @php
        $dateParts = preg_split('/\s+/', trim($list->field_date));

        $day = $dateParts[0]; // 10
        $month = $dateParts[1]; // ตุลาคม
        $year = $dateParts[2]; // 2568

    @endphp

    <div class="title_doc">
            <strong>แบบฟอร์มคำร้องทั่วไป</strong>
    </div>
    <div class="box_text" style="text-align: right;">
        <span style="line-height: 0.7;">
            เขียนที่เทศบาลตำบลท่าข้าม <br>
            112 หมู่ 3 ตำบลท่าข้าม <br>
            อำเภอบางปะกง จังหวัดฉะเชิงเทรา
        </span>


        <div style="margin-right: 80px; margin-top: 10px;">
            <span>วันที่</span><span class="dotted-line" style="width: 5%; text-align: center;"> {{ $day }}</span>
            <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center;">{{ $month }}</span>
            <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center;">{{ $year }}</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>เรื่อง</span><span class="dotted-line"
            style="min-width: 95%; text-align: start; margin-left: 10px;">{{  $list->field_4 }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>เรียน นายกเทศบาลตำบลแสนภูดาษ</span>
    </div>
  
    <div class="box_text" style="text-align: left; margin-left:50px;">
        <span style="margin-left:2rem;">ด้วยข้าพเจ้า</span><span class="dotted-line"
            style="width: 80%; text-align: start; margin-left: 10px;"> {{  $list->field_1 }} {{  $list->field_2 }}</span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span>อายุ</span>
        <span class="dotted-line" style="width: 15%; text-align: center;">{{  $list->field_5 }}</span>
        <span>สัญชาติ</span>
        <span class="dotted-line" style="width: 17%; text-align: center;">{{  $list->field_6 }}</span>
        <span>อยู๋บ้านเลขที่</span>
        <span class="dotted-line" style="width: 20%; text-align: center;">{{  $list->field_7 }}</span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 20%; text-align: center;">{{  $list->field_8 }}</span>
        <span>ตำบล</span>
        <span class="dotted-line" style="width: 10%; text-align: center;">{{  $list->field_9 }}</span>
        <span>อำเภอ</span>
        <span class="dotted-line" style="width: 18%; text-align: center;">{{  $list->field_10 }}</span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 18%; text-align: center;">{{  $list->field_11 }}</span>
        <span>เบอร์โทรศัพท์</span>
        <span class="dotted-line" style="width: 19%; text-align: center;">{{  $list->field_3 }}</span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:5rem;margin-top:10px;">
        <span>ขอยื่นคำร้องดังต่อไปนี้</span><span class="dotted-line"
            style="min-width: 50%; text-align: start; margin-left: 10px;">{{  $list->field_12 }}</span>
    </div>
    
    <div class="box_text" style="text-align: center; ">
        <span style="margin-left:2rem;">จึงเรียนมาเพื่อโปรดพิจารณา</span>
    </div>

    <div class="box_text" style="text-align: center; margin-top:2rem; margin-bottom:2rem; margin-left: 30px;">
        <span>ขอแสดงความนับถือ</span>
    </div>
    <div class="box_text" style="text-align: center; margin-top:0.5rem; margin-bottom:1.5rem; ">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 35%; text-align: center;">{{  $list->field_2 }}
        </span>
        <span>ผู้ยื่นคำร้อง</span>
        <div style="margin-left: -30px;">
            <span>(</span>
            <span class="dotted-line"
                style="width: 35%; text-align: center;">{{  $list->field_1 }} {{  $list->field_2 }}</span>
            <span>)</span>
        </div>
        
    </div>
 

</body>

</html>
