<?php

if ($_SESSION['mt_lv_id'] == 1) { // admin
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

        <!-- Brand Logo -->
        <a href="./_index.php" class="brand-link">
            <img src="../public/images/logo.png" alt="Logo" class="w-75" style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar mt-3 ">
            <!-- Sidebar Menu -->
            <nav class=" position-relative">

                <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item ">
                        <a href="./_index.php" class="nav-link active">
                            <i class="nav-icon fas fa-home"></i>
                            <p>หน้าแรก</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room.php" class="nav-link active">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>ห้องประชุม</p>
                        </a>
                    </li>
                    <hr class="mt-3" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-user"></i> จัดการ</li>
                    <li class="nav-item ">
                        <a href="./frm_user.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-user-pen"></i>
                            <p>ข้อมูลส่วนตัว</p>
                        </a>
                    </li>
                    <hr class="mt-3" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> ตั้งค่า</li>
                    <li class="nav-item ">
                        <a href="./admintemplate.php" class="nav-link active">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>เพิ่มข้อมูล</p>
                        </a>
                    </li>

                    <li class="nav-item mt-2 ">
                        <a href="./admindata.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-table"></i>
                            <p>ดูข้อมูล</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./user_all.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-hospital-user"></i>
                            <p>ข้อมูลผู้ใช้งาน</p>
                        </a>
                    </li>
                    <hr class="mt-3 mb-3" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"> จองห้องประชุม</li>

                    <li class="nav-item ">
                        <a href="./adminroom.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-calendar-check"></i>
                            <p>จองห้องประชุม</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_reserve.php" class="nav-link active">
                            <i class="nav-icon fa-regular fa-list-radio"></i>
                            <p>รายการจอง</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_approve.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                            <p>รายการที่ต้องอนุมัติ </p> <span id="bage" class="badge badge-primary "></span>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_reserve_all.php" class="nav-link active">
                            <i class="nav-icon fas fa-ballot"></i>
                            <p>รายการจองทั้งหมด</p>
                        </a>
                    </li>
                    <hr class="mt-4 mb-4" style="background-color:#fff">
                    <!-- 
            <li class="mb-2 nav-header text-white"> ข้อมูล</li>
            <li class="nav-item ">
                <a href="" class="nav-link active">
                    <i class="nav-icon  fa-solid fa-award"></i>
                    <p>ระดับสิทธิ์</p>
                </a>
            </li>
           
            <li class="nav-item mt-3 ">
                <a href="./room_reserve_all.php" class="nav-link active">
                    <i class="nav-icon fas fa-ballot"></i>
                    <p>รายการจองทั้งหมด</p>
                </a>
            </li>
            <hr class="mt-5 mb-5" style="background-color:#fff"> -->
                    <li class="nav-item ">
                        <a href="../../login/logout.php" class="btn btn-block btn-moph text-white ">
                            <i class="nav-icon fas fa-sign-out"></i>ออกจากระบบ
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>
<?php
} else if ($_SESSION['mt_lv_id'] == 4) { // Manager
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

        <!-- Brand Logo -->
        <a href="./_index.php" class="brand-link">
            <img src="../public/images/logo.png" alt="Logo" class="w-75" style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar mt-3 ">
            <!-- Sidebar Menu -->
            <nav class=" position-relative">

                <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item ">
                        <a href="./_index.php" class="nav-link active">
                            <i class="nav-icon fas fa-home"></i>
                            <p>หน้าแรก</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room.php" class="nav-link active">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>ห้องประชุม</p>
                        </a>
                    </li>
                    <hr class="mt-3" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-user"></i> จัดการ</li>
                    <li class="nav-item ">
                        <a href="./frm_user.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-user-pen"></i>
                            <p>ข้อมูลส่วนตัว</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./user_all.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-hospital-user"></i>
                            <p>ข้อมูลผู้ใช้งาน</p>
                        </a>
                    </li>
                    <hr class="mt-3 " style="background-color:#fff">

                    <li class="mb-2 nav-header text-white"> จองห้องประชุม</li>

                    <li class="nav-item ">
                        <a href="./manager_room.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-calendar-check"></i>
                            <p>จองห้องประชุม</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_reserve.php" class="nav-link active">
                            <i class="nav-icon fa-regular fa-list-radio"></i>
                            <p>รายการจอง</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./manager_approve.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                            <p>รายการที่ต้องอนุมัติ </p> <span id="bage" class="badge badge-primary"></span>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_reserve_all.php" class="nav-link active">
                            <i class="nav-icon fas fa-ballot"></i>
                            <p>รายการจองทั้งหมด</p>
                        </a>
                    </li>
                    <hr class="mt-4 mb-4" style="background-color:#fff">
                    <!-- 
            <li class="mb-2 nav-header text-white"> ข้อมูล</li>
            <li class="nav-item ">
                <a href="" class="nav-link active">
                    <i class="nav-icon  fa-solid fa-award"></i>
                    <p>ระดับสิทธิ์</p>
                </a>
            </li>
           
            <li class="nav-item mt-3 ">
                <a href="./room_reserve_all.php" class="nav-link active">
                    <i class="nav-icon fas fa-ballot"></i>
                    <p>รายการจองทั้งหมด</p>
                </a>
            </li>
            <hr class="mt-5 mb-5" style="background-color:#fff"> -->
                    <li class="nav-item ">
                        <a href="../../login/logout.php" class="btn btn-block btn-moph text-white ">
                            <i class="nav-icon fas fa-sign-out"></i>ออกจากระบบ
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>

<?php
} else if ($_SESSION['mt_lv_id'] == 2) { //todo:  user
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

        <!-- Brand Logo -->
        <a href="./_index.php" class="brand-link">
            <img src="../public/images/logo.png" alt="Logo" class="w-75" style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar mt-3 ">
            <!-- Sidebar Menu -->
            <nav class=" position-relative">

                <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item mt-3">
                        <a href="./_index.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-home "></i>
                            <p>หน้าแรก</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room.php" class="nav-link active">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>ห้องประชุม</p>
                        </a>
                    </li>
                    <hr class="mt-3 " style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-user"></i> จัดการ</li>
                    <li class="nav-item ">
                        <a href="./frm_user.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-user-pen"></i>
                            <p>ข้อมูลส่วนตัว</p>
                        </a>
                    </li>
                    <hr class="mt-4 mb-4" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"> จองห้องประชุม</li>

                    <li class="nav-item ">
                        <a href="./users_room.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-calendar-check"></i>
                            <p>จองห้องประชุม</p>
                        </a>
                    </li>
                    <li class="nav-item mt-3 ">
                        <a href="./user_reserve.php" class="nav-link active">
                            <i class="nav-icon fa-regular fa-list-radio"></i>
                            <p>รายการจอง</p>
                        </a>
                    </li>
                    <hr class="mt-4 mb-4" style="background-color:#fff">
                    <li class="nav-item mt-3 ">
                        <a href="./user_status.php" class="nav-link active">
                            <i class="nav-icon fa-regular fa-bells"></i>
                            <p>แจ้งเตือน </p>  <span id="uun1"></span>
                        </a>
                    </li>

                    <hr class="mt-4 mb-4" style="background-color:#fff">
                    <!-- 
            <li class="mb-2 nav-header text-white"> ข้อมูล</li>
            <li class="nav-item ">
                <a href="" class="nav-link active">
                    <i class="nav-icon  fa-solid fa-award"></i>
                    <p>ระดับสิทธิ์</p>
                </a>
            </li>
           
            <li class="nav-item mt-3 ">
                <a href="./room_reserve_all.php" class="nav-link active">
                    <i class="nav-icon fas fa-ballot"></i>
                    <p>รายการจองทั้งหมด</p>
                </a>
            </li>
            <hr class="mt-5 mb-5" style="background-color:#fff"> -->
                    <li class="nav-item ">
                        <a href="../../login/logout.php" class="btn btn-block btn-moph text-white ">
                            <i class="nav-icon fas fa-sign-out"></i>ออกจากระบบ
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>
<?php
} else if($_SESSION['mt_lv_id'] == 3) { //todo : staff
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

        <!-- Brand Logo -->
        <a href="./_index.php" class="brand-link">
            <img src="../public/images/logo.png" alt="Logo" class="w-75" style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar mt-3 ">
            <!-- Sidebar Menu -->
            <nav class=" position-relative">

                <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item mt-3">
                        <a href="./_index.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-home "></i>
                            <p>หน้าแรก</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room.php" class="nav-link active">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>ห้องประชุม</p>
                        </a>
                    </li>
                    <hr class="mt-3 " style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-user"></i> จัดการ</li>
                    <li class="nav-item ">
                        <a href="./frm_user.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-user-pen"></i>
                            <p>ข้อมูลส่วนตัว</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./user_all.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-hospital-user"></i>
                            <p>ข้อมูลผู้ใช้งาน</p>
                        </a>
                    </li>
                    <hr class="mt-3" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"> จองห้องประชุม</li>

                    <li class="nav-item ">
                        <a href="./staff_room.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-calendar-check"></i>
                            <p>จองห้องประชุม</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_reserve.php" class="nav-link active">
                            <i class="nav-icon fa-regular fa-list-radio"></i>
                            <p>รายการจอง</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./showTool.php" class="nav-link active">
                            <i class="nav-icon fas fa-ballot"></i>
                            <p>จัดเตรียมอุปกรณ์ <span id="uun1"></span></p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./room_reserve_all.php" class="nav-link active">
                            <i class="nav-icon fas fa-ballot"></i>
                            <p>รายการจองทั้งหมด</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2 ">
                        <a href="./staff_request.php" class="nav-link active">
                            <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                            <p>รายการที่ต้องอนุมัติ </p> <span class="badge badge-primary" id="bage"></span>
                        </a>
                    </li>

                    <hr class="mt-4 mb-4" style="background-color:#fff">
                    <!-- 
            <li class="mb-2 nav-header text-white"> ข้อมูล</li>
            <li class="nav-item ">
                <a href="" class="nav-link active">
                    <i class="nav-icon  fa-solid fa-award"></i>
                    <p>ระดับสิทธิ์</p>
                </a>
            </li>
           
           
            <hr class="mt-5 mb-5" style="background-color:#fff"> -->
                    <li class="nav-item ">
                        <a href="../../login/logout.php" class="btn btn-block btn-moph text-white ">
                            <i class="nav-icon fas fa-sign-out"></i>ออกจากระบบ
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>
<?php
}
?>