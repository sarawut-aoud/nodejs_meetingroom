<?php
function adddata($ward, $duty)
{
    if ($ward == 69 && $duty == 2) {
        $adddata = '  <hr class="mt-3" style="background-color:#fff">
                        <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> ตั้งค่า</li>
                        <li class="nav-item ">
                            <a href="insertdata.php" class="nav-link active">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>เพิ่มข้อมูล</p>
                            </a>
                        </li> 
                        <li class="nav-item  ">
                            <a href="showdata.php" class="nav-link active">
                                <i class="nav-icon  fa-solid fa-table"></i>
                                <p>แก้ไขข้อมูล & ลบข้อมูล</p>
                            </a>
                        </li>';
    } else {
        $adddata = '  <hr class="mt-3" style="background-color:#fff">
                    <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> ตั้งค่า</li>
                    <li class="nav-item ">
                        <a href="addtool.php" class="nav-link active">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>เพิ่มข้อมูลอุปกรณ์</p>
                        </a>
                    </li> 
                    <li class="nav-item  ">
                        <a href="showtools.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-table"></i>
                            <p>แก้ไขข้อมูลอุปกรณ์</p>
                        </a>
                    </li>';
    }
    return $adddata;
}


function status($ward, $duty)
{
    if ($duty == 2 && $ward != 48) {
        $stm = ' <li class="nav-item  ">
                <a href="room_reserve_ward.php" class="nav-link active">
                    <i class="nav-icon fas fa-ballot"></i>
                    <p>รายการจองทั้งหมด</p>
                </a>
            </li>';
    } else if ($duty != 2 && $ward != 48) {
        $stm = ' <hr class="mt-4 mb-4" style="background-color:#fff">
            <li class="nav-item mt-3 ">
                <a href="user_status.php" class="nav-link active">
                    <i class="nav-icon fa-regular fa-bells"></i>
                    <p>แจ้งเตือน </p> <span id="uun1"></span>
                </a>
            </li>';
    }
    return $stm;
}
function appove($ward, $duty)
{
    if ($ward != 48 && $duty == 2) {
        $link = '  <li class="nav-item  ">
                    <a href="room_approve.php" class="nav-link active">
                        <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                        <p>รายการที่ต้องอนุมัติ </p> <span id="bage" class="badge badge-primary "></span>
                    </a>
                </li>';
    } else if ($ward == 48 && $duty == 2) {
        $link = '  <li class="nav-item  ">
                    <a href="room_approve.php" class="nav-link active">
                        <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                        <p>รายการที่ต้องอนุมัติ</p> <span id="bage" class="badge badge-primary "></span><center>(หัวหน้า)</center>
                    </a>
                 </li>
                 <li class="nav-item">
                    <a href="staff_request.php" class="nav-link active">
                        <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                        <p>รายการที่ต้องอนุมัติ</p> <span id="bage1" class="badge badge-primary" ></span><center>(ผู้ปฏิบัติงาน) </center>
                    </a>
                 </li>  
                 <li class="nav-item  ">
                    <a href="room_reserve_all.php" class="nav-link active">
                        <i class="nav-icon fas fa-ballot"></i>
                        <p>รายการจองทั้งหมด</p>
                    </a>
                </li>';
    } else if ($ward == 48 && $duty != 2) {
        $link = '<li class="nav-item">
                    <a href="staff_request.php" class="nav-link active">
                        <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                        <p>รายการที่ต้องอนุมัติ </p> <span class="badge badge-primary" id="bage"></span>
                    </a>
                </li>  
                <li class="nav-item  ">
                    <a href="room_reserve_all.php" class="nav-link active">
                        <i class="nav-icon fas fa-ballot"></i>
                        <p>รายการจองทั้งหมด</p>
                    </a>
                </li>';
    }
    return $link;
}
// หัวหน้า
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

    <!-- Brand Logo -->
    <a href="_index.php" class="brand-link">
        <img src="../public/images/logo.png" alt="Logo" class="w-75" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar mt-3 ">
        <!-- Sidebar Menu -->
        <nav class=" position-relative">

            <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="_index.php" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>หน้าแรก</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="report_tool.php" class="nav-link active">
                        <i class="nav-icon fa-solid fa-toolbox"></i>
                        <p>จัดเตียมอุปกรณ์</p>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="room.php" class="nav-link active">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>ห้องประชุม</p>
                    </a>
                </li>

                <?php echo  adddata($_SESSION['mt_ward_id'], $_SESSION['mt_duty_id']); ?>

                <hr class="mt-3 mb-3" style="background-color:#fff">
                <li class="mb-2 nav-header text-white"> จองห้องประชุม</li>

                <li class="nav-item ">
                    <a href="showreserveroom.php" class="nav-link active">
                        <i class="nav-icon  fa-solid fa-calendar-check"></i>
                        <p>จองห้องประชุม</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="room_reserve.php" class="nav-link active">
                        <i class="nav-icon fa-regular fa-list-radio"></i>
                        <p>รายการจอง</p>
                    </a>
                </li>

                <?php echo appove($_SESSION['mt_ward_id'], $_SESSION['mt_duty_id']); ?>
                <?php echo status($_SESSION['mt_ward_id'], $_SESSION['mt_duty_id']); ?>

                <hr class="mt-4 mb-4" style="background-color:#fff">
                <li class="nav-item ">
                    <a href="../login/logout.php" class="btn btn-block btn-moph text-white ">
                        <i class="nav-icon fas fa-sign-out"></i>ออกจากระบบ
                    </a>
                </li>
            </ul>

        </nav>
    </div>
    <!-- /.sidebar -->
</aside>