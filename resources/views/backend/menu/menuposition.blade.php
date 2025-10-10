<div class="menu">

    @if ($user->user_permission == 0 || $user->user_permission == 1)
        <div class="menu-item has-submenu">
            สำนักปลัด
            <i class='bx bx-chevron-right chevron'></i>
        </div>
        <div class="submenu level-1">
            <a href="/backend/articles/menu/1">คำร้องทั่วไป</a>
            <a href="/backend/articles/menu/1">คำร้องขอติดตั้งป้ายโฆษณาริมถนนสาธารณะ</a>
            <a href="/backend/articles/menu/1">คำร้องเรียนการทุจริตและประพฤติมิชอบของเจ้าหน้าที่</a>
            <a href="/backend/articles/menu/1">คำขอเครื่องหมายรับรองผู้ประกอบธุรกิจพาณิชย์อิเล็กทรอนิกส์ (DBD
                Registered)</a>
            <a href="/backend/articles/menu/1">คำขอจดทะเบียนพาณิชย์ (ใหม่/เปลี่ยนแปลง/ยกเลิก)</a>
            <a href="/backend/articles/menu/1">คำร้องทะเบียนพาณิชย์</a>
            <a href="/backend/articles/menu/1">คําขอตรวจค้นเอกสาร/รับรองสําเนาเอกสาร/ใบแทน</a>
        </div>
        <div class="menu-item has-submenu">
            กองช่าง
            <i class='bx bx-chevron-right chevron'></i>
        </div>
        <div class="submenu level-1">
            <a href="/backend/articles/menu/1">คำร้องทั่วไป (ซ่อมไฟฟ้าสาธารณะ , ซ่อมแซมถนน)</a>
            <a href="/backend/articles/menu/1">ใบแจ้งการขุดดินหรือถมดิน</a>
        </div>
        <div class="menu-item has-submenu">
            กองการศึกษา
            <i class='bx bx-chevron-right chevron'></i>
        </div>
        <div class="submenu level-1">
            <a href="/backend/articles/menu/1">ใบสมัครเรียน ศพด.บ้านท่าข้าม</a>
            <a href="/backend/articles/menu/1">ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดบางแสม</a>
            <a href="/backend/articles/menu/1">ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดคลองพานทอง</a>
        </div>
        <div class="menu-item has-submenu">
            กองยุทธศาสตร์และงบประมาณ
            <i class='bx bx-chevron-right chevron'></i>
        </div>
        <div class="submenu level-1">
            <a href="/backend/articles/menu/1">คำร้องขอข้อมูลข่าวสาร</a>
        </div>
        <div class="menu-item has-submenu">
            กองสาธารณสุขฯ
            <i class='bx bx-chevron-right chevron'></i>
        </div>
        <div class="submenu level-1">
            <a href="/backend/articles/menu/1">คำร้องขอถังขยะ</a>
        </div>
        <div class="menu-item has-submenu">
            กองสวัสดิการสังคม
            <i class='bx bx-chevron-right chevron'></i>
        </div>
        <div class="submenu level-1">
            <a href="/backend/articles/menu/1">คำร้องทั่วไปขอรับการช่วยเหลือ</a>
        </div>
    @else
        {{-- สำนักปลัด --}}

        @if ($user->user_position == 1)
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องทั่วไป</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องขอติดตั้งป้ายโฆษณาริมถนนสาธารณะ</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องเรียนการทุจริตและประพฤติมิชอบของเจ้าหน้าที่</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำขอเครื่องหมายรับรองผู้ประกอบธุรกิจพาณิชย์อิเล็กทรอนิกส์ (DBD Registered)</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำขอจดทะเบียนพาณิชย์ (ใหม่/เปลี่ยนแปลง/ยกเลิก)</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องทะเบียนพาณิชย์</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คําขอตรวจค้นเอกสาร/รับรองสําเนาเอกสาร/ใบแทน</div>
            </a>
        @endif

        {{-- กองช่าง --}}
        @if ($user->user_position == 2)
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องทั่วไป (ซ่อมไฟฟ้าสาธารณะ , ซ่อมแซมถนน)</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">ใบแจ้งการขุดดินหรือถมดิน</div>
            </a>
        @endif

        {{-- กองการศึกษา --}}
        @if ($user->user_position == 2)
            <a href="/backend/directory/menu/51">
                <div class="menu-item">ใบสมัครเรียน ศพด.บ้านท่าข้าม</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดบางแสม</div>
            </a>
            <a href="/backend/directory/menu/51">
                <div class="menu-item">ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดคลองพานทอง</div>
            </a>
        @endif

        {{-- กองยุทธศาสตร์และงบประมาณ --}}
        @if ($user->user_position == 2)
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องขอข้อมูลข่าวสาร</div>
            </a>
        @endif

        {{-- กองสาธารณสุขฯ --}}
        @if ($user->user_position == 2)
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องขอถังขยะ</div>
            </a>
        @endif

        {{-- กองสวัสดิการสังคม --}}
        @if ($user->user_position == 2)
            <a href="/backend/directory/menu/51">
                <div class="menu-item">คำร้องทั่วไปขอรับการช่วยเหลือ</div>
            </a>
        @endif
    @endif

</div>
