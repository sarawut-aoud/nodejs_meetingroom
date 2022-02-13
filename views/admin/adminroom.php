<?php
require_once "../../login/check_session.php";
if ($_SESSION['mt_lv_id'] == 1) {
} else {

    echo "<script>
            window.setTimeout(function() {
                window.location = '../page-404.html';
            }, 0);
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../public/images/index.png" type="image/x-icon" />
<title>Moph : MeetingRoom</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-pro6/css/all.css" />
<!-- bt5 -->
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
<!-- daterange picker -->
<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.css">
<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
<!-- fullCalendar Style -->
<link rel="stylesheet" href="../public/styles/calendar.css">
<!-- Theme style -->
<link rel="stylesheet" href="../public/styles/adminlte.min.css">
<link rel="stylesheet" href="../public/styles/styleindex.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active">ยื่นคำขอจองห้องประชุม</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

            <!-- Brand Logo -->
            <a href="" class="brand-link">
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
                            <a href="./admindata.php" class="nav-link active">
                                <i class="nav-icon fas fa-ballot"></i>
                                <p>รายการจอง</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="./admindata.php" class="nav-link active">
                                <i class="nav-icon fas fa-ballot"></i>
                                <p>รายการที่ต้องอนุมัติ </p> <span class="badge badge-danger">1</span>
                            </a>
                        </li>
                        <hr class="mt-3 mb-3" style="background-color:#fff">

                        <li class="mb-2 nav-header text-white"> ข้อมูล</li>
                        <li class="nav-item ">
                            <a href="" class="nav-link active">
                                <i class="nav-icon  fa-solid fa-award"></i>
                                <p>ระดับสิทธิ์</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-ballot"></i>
                                <p>รายการที่ต้องอนุมัติ</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-ballot"></i>
                                <p>รายการจองทั้งหมด</p>
                            </a>
                        </li>
                        <hr class="mt-5 mb-5" style="background-color:#fff">
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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4><i class="fa-solid fa-id-card"></i> ข้อมูลส่วนตัว</h4>
                                    </div>
                                </div>
                                <div class="card-body mb-0">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <label class=" col-form-label">คำนำหน้า :</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control " id="prefix" name="prefix" value="<?php echo $_SESSION['mt_prefix']; ?> " readonly />
                                            </div>
                                            <label class=" col-form-label">ชื่อ - นามสกุล :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="name" name="name" value="<?php echo $_SESSION['mt_name']; ?> " readonly />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="input-group">
                                            <label class=" col-form-label">แผนก :</label>
                                            <div class="col-md">

                                                <input type="text" class="form-control " id="de_name" name="de_name" value="<?php echo $_SESSION['mt_de_name']; ?> " readonly />
                                            </div>
                                            <label class=" col-form-label">ตำแหน่ง :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="position" name="position" value="<?php echo  $_SESSION['mt_lv_name'] . "/" . $_SESSION['mt_position']; ?> " readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4><i class="fa-solid fa-fill-drip"></i> สีประจำห้องประชุม</h4>
                                    </div>
                                </div>
                                <div class="card-body mb-0">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <label class="col-form-label"></label>
                                            <div class="col-md-2" id="showcolor">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4>เลือกห้องประชุม เพื่อทำการจอง</h4>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="POST">
                                    <div class="card-body">
                                        <!--? Title Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">ชื่อโครงการ :</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control " id="title" name="title" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--? /.Title Name -->
                                        <!--? Input Time -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">เวลา :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="00:00" />
                                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ถึงเวลา :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="00:00" />
                                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--? /.Input Time -->
                                        <!--? InputDate -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">วันที่ :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" placeholder="00/00/0000" />
                                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ถึงวันที่ :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="00/00/0000" />
                                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--? /.InputDate -->
                                        <!--? Room  -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">ห้องประชุม : </label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" id="ro_name" />
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">จำนวนคนที่บรรจุได้ : </label>
                                                <div class="col-md">
                                                    <input class="form-control " id="ro_people" name="ro_people" readonly />
                                                </div>
                                                <label class="col-md-2 col-form-label">บริเวณ : </label>
                                                <div class="col-md">
                                                    <input class="form-control " id="ro_detail" name="ro_detail" readonly />
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--? /. Room  -->
                                        <!--? Style /  ผู้เข้าร่วม-->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">จำนวนคนที่เข้าประชุม : </label>
                                                <div class="col-md">
                                                    <input type="number" class="form-control " id="people" name="people" />
                                                    <!-- <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" id="people" disabled="disabled" />
                                                    </select> -->
                                                </div>
                                                <label class="col-md-2 col-form-label">รูปแบบห้อง : </label>
                                                <div class="col-md">
                                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" id="style" name="style" />
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--? Style /  ผู้เข้าร่วม-->
                                        <!--? Tool -->
                                        <div class="form-group row ">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">อุปกรณ์ :</label>
                                                <div class="col-md-4  d-flex ">
                                                    <div class="icheck-success ">
                                                        <input type="radio" id="checktool1" name="r1" checked>
                                                        <label for="checktool1"> ไม่ต้องการ
                                                        </label>

                                                    </div>
                                                    <div class="icheck-success ml-3">
                                                        <input type="radio" id="checktool" name="r1">
                                                        <label for="checktool"> ต้องการ
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" multiple id="tool" disabled />
                                                    <option value="" selected disabled>--เพิ่มเติม--</option>
                                                    </select>

                                                </div>

                                            </div>
                                        </div>
                                        <!--? Tool -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2">ยกเลิก</button>
                                            <button type="submit" class="col-md-4 btn btn-success mt-2">ลงทะเบียนการจอง</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card ">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4> ปฏิทินการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h5>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/fontawesome-pro6/js/all.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/inputmask.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <!-- date-range-picker -->
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/javascript/adminlte.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="../public/javascript/maincalendar.js"></script>
    <script src='../public/javascript/calendar.js'></script>

    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2();
            //timepicker
            $('#datetimepicker1').datetimepicker({
                format: 'H:mm'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'H:mm'
            });
            $('#datetimepicker3').datetimepicker({
                format: 'L'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'L'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var path = 'http://127.0.0.1:4500';


            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/rooms",
                success: function(result) {
                    var data = '<option value="" selected disabled>-- เลือกห้องประชุม --</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].ro_id + '" > ' + result[i].ro_name + ' (จำนวน ' + result[i].ro_people + ' คน)</option>';
                    }
                    $('#ro_name').html(data);

                    // $("#ro_name").change(function() {
                    //     $('#people').prop('disabled', false);
                    //     var ro_id = $(this).val();
                    //     $.ajax({
                    //         type: "GET",
                    //         dataType: "json",
                    //         url: path + "/rooms",
                    //         data: {
                    //             ro_id: ro_id,
                    //         },
                    //         success: function(result) {
                    //              var row = '';
                    //             for (ii in result) {
                    //                 if (result[ii].ro_id == ro_id) {
                    //                     var people = result[ii].ro_people;
                    //                     var detail = result[ii].ro_detail;

                    //                 }
                    //             }
                    //             $('#ro_people').val(people);
                    //             $('#ro_detail').val(detail);

                    //         }
                    //     });
                    // });
                }
            });
            // $.ajax({
            //     type: 'GET',
            //     dataType: 'json',
            //     url: path + "/rooms",
            //     success: function(result) {
            //         var data = '';
            //         for (i in result) {
            //             data +=  '<div class="w-50 rounded border style="background-color:'+ result[i].ro_color +';"></div>'
            //         }
                   
            //         $('#showcolor').html(data);
            //         // <div class="col-md-2">
            //         // </div>
            //     }
            // });
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/style",
                success: function(result) {
                    var data = '<option value="" selected disabled>--เลือกรูปแบบห้องประชุม--</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].st_id + '" > ' + result[i].st_name + '</option>';
                    }
                    $('#style').html(data);
                }
            });

            $("#checktool").change(function() {

                $("#checktool1").change(function() {
                    $('#tool').prop('disabled', true);
                });

                $('#tool').prop('disabled', false);
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: path + "/tools",
                    success: function(result) {
                        var data = '<option value="" selected disabled>--เพิ่มเติม--</option>';
                        for (i in result) {
                            data += '<option value="' + result[i].to_id + '" > ' + result[i].to_name + '</option>';
                        }
                        $('#tool').html(data);
                    }
                });
            });




        });
    </script>
</body>

</html>