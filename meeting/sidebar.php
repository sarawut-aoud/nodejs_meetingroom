<?php
function adddata($ward)
{
    if ($ward == 48) {
        $adddata = '  <hr class="mt-3" style="background-color:#fff">
                        <li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> ตั้งค่า</li>
                        <li class="nav-item ">
                        <a href="setstatus.php" class="nav-link active">
                            <i class="nav-icon  fa-solid fa-unlock"></i>
                            <p>เปิดสิทธ์การเพิ่มอุปกรณ์</p>
                        </a>
                    </li> 
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
    }
    return $adddata;
}


function status($ward, $duty)
{
    if ($duty >= 2  && $ward != 48) {
        $stm = ' <li class="nav-item  ">
                <a href="room_reserve_ward.php" class="nav-link active">
                    <i class="nav-icon fas fa-ballot"></i>
                    <p>รายการจองทั้งหมด</p>
                </a>
            </li>';
    } else if ($duty < 2 && $ward != 48) {
        $stm = ' <hr class="mt-3 mb-3" style="background-color:#fff">
            <li class="nav-item mt-3 ">
                <a href="user_status.php" class="nav-link active">
                    <i class="nav-icon fa-regular fa-bells"></i>
                    <p>แจ้งเตือน </p> <span id="uun1"></span>
                </a>
            </li>';
    } else if ($duty < 2 && $ward != 48) {
        $stm = '';
    }
    return $stm;
}
function appove($ward, $duty)
{
    if ($ward != 48 && $duty >= 2) {
        $link = '  <li class="nav-item  ">
                    <a href="room_approve.php" class="nav-link active">
                        <i class="nav-icon fa-solid fa-calendar-exclamation"></i>
                        <p>รายการที่ต้องอนุมัติ </p> <span id="bage" class="badge badge-primary "></span>
                    </a>
                </li>';
    } else if ($ward == 48 && $duty >= 2) {
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
                        <p>รายการที่ต้องอนุมัติ </p> <span class="badge badge-primary" id="bage1"></span>
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
<aside class="main-sidebar sidebar-light-white  elevation-4 " style="background: rgb(111,190,255);
background: linear-gradient(180deg, rgba(111,190,255,1) 40%, rgba(59,255,103,1) 100%);">

    <!-- Brand Logo -->
    <a href="_index.php" class="brand-link">
        <center>
            <img src="../public/images/logo.png" alt="Logo" class="w-75 rounded-3 elevation-3 bg-white">
            <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
        </center>

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

                <?php echo  adddata($_SESSION['mt_ward_id']); ?>

                <li class="nav-item" id="menu">

                </li>
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
                <li class="nav-item " id="menuward"></li>
                <hr class="mt-4 mb-4" style="background-color:#fff">
                <li class="nav-item ">
                    <a href="../login/logout.php" class=" fixed-bottom mb-2 ml-3 btn btn-block btn-moph text-white ">
                        <i class="nav-icon fas fa-sign-out"></i>ออกจากระบบ
                    </a>
                </li>
            </ul>

        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
<script src="../plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var path = '<?php echo $_SESSION['mt_path']; ?>';
        var ward_id = "<?php echo $_SESSION['mt_ward_id']; ?>";
        var de_id = "<?php echo $_SESSION['mt_de_id']; ?>";
        var fac_id = "<?php echo $_SESSION['mt_faction_id']; ?>";
        $.ajax({
            type: "get",
            dataType: "json",
            url: path + "/setstatus/menu",
            data: {
                ward_id: ward_id,
                fac_id: fac_id,
                depart_id: de_id,
            },
            success: function(result) {
                var msg1 = '<hr class="mt-3" style="background-color:#fff">' +
                    '<li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> เพิ่มอุปกรณ์</li>';
                var menu = '';
                for (i in result) {
                    var status = result[i].setstatus;
                }
                if (status == "Y") {
                    menu = '<a href="addtool.php" class="nav-link active">' +
                        '<i class="nav-icon fas fa-plus-circle"></i> ' +
                        "<p>เพิ่มข้อมูลอุปกรณ์</p>" +
                        " </a>" +
                        ' <a href="showtools.php" class="nav-link active">' +
                        '<i class="nav-icon  fa-solid fa-table"></i>' +
                        " <p>แก้ไขข้อมูลอุปกรณ์</p>" +
                        " </a>";
                } else {
                    msg1 = "";
                }
                $("#menu").html(msg1 + menu);
            }
        });

        $.ajax({
            type: "get",
            dataType: "json",
            url: path + "/setstatus/menuward",
            data: {
                ward_id: ward_id,
                fac_id: fac_id,
                depart_id: de_id,
            },
            success: function(result) {
                var msg1 = '<hr class="mt-3" style="background-color:#fff"><li class="mb-2 nav-header text-white"><i class="fa-solid fa-folder-gear"></i> รายการจองของกลุ่มงาน</li>';
                var menu = '';
                for (i in result) {
                    var status = result[i].status;
                }
                if (status > 0) {
                    menu = '<a href="room_reserveward.php" class="nav-link active">' +
                        '<i class="nav-icon fas fa-plus-circle"></i> ' +
                        "<p>รายการจองของกลุ่มงาน</p>" +
                        " </a>";
                } else {
                    msg1 = "";
                }
                $("#menuward").html(msg1 + menu);
            }
        })

    })
</script>