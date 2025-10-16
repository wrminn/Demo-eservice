            <section class="menu-bar">

                <nav class="menu-list">
                    <ul>
                        <li class="menu-item active">
                            <a href="/Requestforms">หน้าหลัก</a>
                        </li>

                        @auth
                            <li class="menu-item active">
                                <a href="/FormSubmissionHistory">ประวัติการส่งคำร้อง</a>
                            </li>
                            {{-- <li class="menu-item active">
                                <a href="/Profile">ข้อมูลส่วนตัว</a>
                            </li> --}}
                        @endauth

                        <li class="menu-item has-sub">
                            <a href="#">สำนักปลัด</a>
                            <ul class="submenu">
                                <li><a href="/FormeService/id/1">คำร้องทั่วไป</a></li>
                                <li><a href="/FormeService/id/">คำร้องขอติดตั้งป้ายโฆษณาริมถนนสาธารณะ</a></li>
                                <li><a href="/FormeService/id/">คำร้องเรียนการทุจริตและประพฤติมิชอบของเจ้าหน้าที่</a>
                                </li>
                                <li><a href="/FormeService/id/">คำขอเครื่องหมายรับรองผู้ประกอบธุรกิจพาณิชย์อิเล็กทรอนิกส์
                                        (DBD Registered)</a></li>
                                <li><a href="/FormeService/id/">คำขอจดทะเบียนพาณิชย์ (ใหม่/เปลี่ยนแปลง/ยกเลิก)</a></li>
                                <li><a href="/FormeService/id/">คำร้องทะเบียนพาณิชย์</a></li>
                                <li><a href="/FormeService/id/"> คําขอตรวจค้นเอกสาร/รับรองสําเนาเอกสาร/ใบแทน</a></li>
                                <li><a href="/FormeService/id/">หนังสือมอบอำนาจ</a></li>
                            </ul>
                        </li>
                        <li class="menu-item has-sub">
                            <a href="#">กองช่าง</a>
                            <ul class="submenu">
                                <li><a href="/FormeService/id/">คำร้องทั่วไป (ซ่อมไฟฟ้าสาธารณะ , ซ่อมแซมถนน)</a></li>
                                <li><a href="/FormeService/id/">ใบแจ้งการขุดดินหรือถมดิน</a></li>
                            </ul>
                        </li>
                        <li class="menu-item has-sub">
                            <a href="#">กองการศึกษา</a>
                            <ul class="submenu">
                                <li><a href="/FormeService/id/">ใบสมัครเรียน ศพด.บ้านท่าข้าม</a></li>
                                <li><a href="/FormeService/id/">ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดบางแสม</a></li>
                                <li><a href="/FormeService/id/">ใบสมัครเรียน ศพด.บ้านท่าข้าม วัดคลองพานทอง</a></li>
                            </ul>
                        </li>
                        <li class="menu-item has-sub">
                            <a href="#">กองยุทธศาสตร์และงบประมาณ</a>
                            <ul class="submenu">
                                <li><a href="/FormeService/id/">คำร้องขอข้อมูลข่าวสาร</a></li>

                            </ul>
                        </li>

                        <li class="menu-item has-sub">
                            <a href="#">กองสาธารณสุขฯ</a>
                            <ul class="submenu">
                                <li><a href="/FormeService/id/">คำร้องขอถังขยะ</a></li>
                            </ul>
                        </li>
                        <li class="menu-item has-sub">
                            <a href="#">กองสวัสดิการสังคม</a>
                            <ul class="submenu">
                                <li><a href="/FormeService/id/">คำร้องทั่วไปขอรับการช่วยเหลือ</a></li>

                            </ul>
                        </li>
                        {{-- <li class="menu-item">
                            <a href="/FormeService/id/">ติดต่อเรา</a>
                        </li> --}}
                    </ul>
                </nav>
            </section>
