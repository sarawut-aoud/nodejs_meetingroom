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
            <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> ตั้งค่า</li>
            <li class="nav-item ">
                <a href="./admintemplate.php" class="nav-link active">
                    <i class="nav-icon fas fa-plus-circle"></i>
                    <p>เพิ่มข้อมูล</p>
                </a>
            </li>
            <li class="nav-item mt-3 ">
                <a href="./admindata.php" class="nav-link active">
                    <i class="nav-icon  fa-solid fa-table"></i>
                    <p>ดูข้อมูล</p>
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
            <li class="nav-item mt-3 ">
                <a href="./room_reserve.php" class="nav-link active">
                    <i class="nav-icon fas fa-ballot"></i>
                    <p>รายการจอง</p>
                </a>
            </li>
            <li class="nav-item mt-3 ">
                <a href="./room_approve.php" class="nav-link active">
                <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                    <p>รายการที่ต้องอนุมัติ </p> <span class="badge badge-danger">1</span>
                </a>
            </li>
            <li class="nav-item mt-3 ">
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