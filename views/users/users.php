<?php
require_once "../../login/check_session.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../public/images/index.png" type="image/x-icon" />
<title>Moph : MeetingRoom</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                    <a class="nav-link active">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
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
                <nav class="mt-4 position-relative">

                    <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item mt-3">
                            <a href="./users.html" class="nav-link active">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>ยื่นคำขอจองห้องประชุม
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="./user_status.html" class="nav-link active">
                                <i class="nav-icon fas fa-bell-exclamation"></i>
                                <p>สถานะการจอง</p>
                            </a>
                        </li>

                        <hr class="mt-5 mb-5" style="background-color:#fff">
                        <li class="nav-item ">
                            <a href="../../login/logout.php" class="btn btn-block btn-moph ">
                                <i class="nav-icon fas fa-sign-out-alt"></i>ออกจากระบบ
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
                <div class="row justify-content-center">
                        <div class="col-xl-8 col-md-12 ">
                            <div class="card shadow">
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

                                                <input type="text" class="form-control " id="de_name" name="de_name"  value="<?php echo $_SESSION['mt_de_name']; ?> " readonly />
                                            </div>
                                            <label class=" col-form-label">ตำแหน่ง :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="position" name="position" value="<?php echo  $_SESSION['mt_lv_name']."/".$_SESSION['mt_position']; ?> " readonly />
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
                                        <h1>เลือกห้องประชุม เพื่อทำการจอง</h1>
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
                                                    <div class="input-group date" id="datetimepicker1"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#datetimepicker1" />
                                                        <div class="input-group-append" data-target="#datetimepicker1"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ถึงเวลา :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker2"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#datetimepicker2" />
                                                        <div class="input-group-append" data-target="#datetimepicker2"
                                                            data-toggle="datetimepicker">
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
                                                    <div class="input-group date" id="datetimepicker3"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#datetimepicker3" />
                                                        <div class="input-group-append" data-target="#datetimepicker3"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ถึงวันที่ :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker4"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#datetimepicker4" />
                                                        <div class="input-group-append" data-target="#datetimepicker4"
                                                            data-toggle="datetimepicker">
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
                                                    <select class="form-control select2 select2-success"
                                                        data-dropdown-css-class="select2-success" id="room"
                                                        name="room" />
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">จำนวนคน : </label>
                                                <div class="col-md">
                                                    <input class="form-control " id="people" name="people" readonly />
                                                </div>
                                                <label class="col-md-2 col-form-label">บริเวณ : </label>
                                                <div class="col-md">
                                                    <input class="form-control " id="detail" name="detail" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <!--? /. Room  -->
                                        <!--? Style  -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">รูปแบบห้อง : </label>
                                                <div class="col-md">
                                                    <select class="form-control select2 select2-success"
                                                        data-dropdown-css-class="select2-success" id="style"
                                                        name="style" />
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--?/. Style  -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2">ยกเลิก</button>
                                            <button type="submit"
                                                class="col-md-4 btn btn-success mt-2">ลงทะเบียนการจอง</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card card-primary">
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
    <script src="../plugins/jquery/jquery.min.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.js"></script>
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
        $(function () {

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
    <!-- <script>
        $(document).ready(function () {
            var uid = '4';
            $.ajax({
                type: "get",
                dataType: "json",
                url: "",
                data: {
                    uid: uid,
                },
                success: function (result) {
                    var user = '';
                    for (ii in result) {
                        user += result[ii].uid;
                        if (result[ii].uid === uid) {
                            var prefix = result[ii].prefix;
                            var fname = result[ii].fname;
                            var lname = result[ii].lname;
                            var de_id = result[ii].de_id;
                            var level = result[ii].level;
                            if (level == 1) {
                                var lv = 'หัวหน้าแผนก';
                            } else if (level == 2) {
                                var lv = 'ธุรการ';
                            } else {
                                var lv = 'ผู้ปฏิบัติงาน';
                            }
                            break;
                        }

                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: "https://sarawut-pcru.github.io/Data/tbl_departments.json",
                            data: {
                                de_id: de_id,
                            },
                            success: function (data) {
                                var depart = '';
                                for (kk in data) {
                                    // depart += data[kk].de_id;
                                    if (data[kk].de_id === de_id) {
                                        var de_name = data[kk].de_name;
                                        break;
                                    }
                                }
                                $('#de_name').val(de_name);
                            }
                        });

                    }

                    $('#prefix').val(prefix);
                    $('#fname').val(fname);
                    $('#lname').val(lname);
                    $('#level').val(lv);

                }

            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: "https://sarawut-pcru.github.io/Data/tbl_styles.json",
                success: function (result) {
                    //  const json = JSON.stringify(response);
                    var user = '<option value="" selected disabled>-รูปแบบห้อง-</option>';
                    for (ii in result) {
                        user += '<option value="' + result[ii].st_id + '">' + result[ii]
                            .st_name +
                            '</option>';
                    }
                    // a simple user
                    $('#style').html(user);

                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: "https://sarawut-pcru.github.io/Data/tbl_rooms.json",
                success: function (result) {
                    var user = '<option value="" selected disabled>-ห้องประชุม-</option>';
                    for (ii in result) {
                        user += '<option value="' + result[ii].ro_id + '">' + result[ii]
                            .ro_name +
                            '</option>';
                    }
                    $('#room').html(user);

                }
            });
            $("#room").change(function () {
                var ro_id = $(this).val();
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: "https://sarawut-pcru.github.io/Data/tbl_rooms.json",
                    data: {
                        ro_id: ro_id,
                    },
                    success: function (result) {
                        var user = '';
                        for (ii in result) {
                            user += result[ii].ro_id;
                            if (result[ii].ro_id === ro_id) {
                                var people = result[ii].ro_people;
                                var detail = result[ii].ro_detail;
                            }
                        }
                        $('#people').val(people);
                        $('#detail').val(detail);
                    }
                });
            });

        });
    </script> -->
</body>

</html>