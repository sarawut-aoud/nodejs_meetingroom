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
<!-- sweetalert2 -->
<link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
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
                    <a href="./_index.php" class="nav-link">หน้าแรก</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active">จองห้องประชุม</a>
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

        <!-- Sidebar -->
        <?php require_once './sidebar/asidebar.php'; ?>
        <!-- Sidebar -->


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
                                    <div id="showcolor">
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
                                <form method="POST" action="">
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
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="00:00" id="timeStart" />
                                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ถึงเวลา :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="00:00" id="timeEnd" />
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
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" placeholder="00/00/0000" id="dateStart" />
                                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ถึงวันที่ :</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="00/00/0000" id="dateEnd" />
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
                                        <!--? /. Room  -->
                                        <!--? Style /  ผู้เข้าร่วม-->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-2 col-form-label">จำนวนคนที่เข้าประชุม : </label>
                                                <div class="col-md">
                                                    <input type="number" class="form-control " id="people" name="people" />
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
                                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" multiple="multiple" id="tool" data-placeholder="-เพิ่มเติม-" disabled />

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
                                            <button type="submit" id="btnAproveRoom" name="btnAproveRoom" class="col-md-4 btn btn-success mt-2 ">ลงทะเบียนการจอง</button>
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
                                        <h4> ปฏิทินการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h4>
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
    <?php require_once './sidebar/footer.php'; ?>
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
    <!-- Sweetalert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
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
            
            $('#btnAproveRoom').click(function(e) {
                e.preventDefault();
                var ev_title = $('#title').val();
                var ev_starttime = $('#timeStart').val();
                var ev_endtime = $('#timeEnd').val();
                var ev_startdate = $('#dateStart').val();
                var ev_enddate = $('#dateEnd').val();
                var ro_id = $('#ro_name').val();
                var ev_people = $('#people').val();
                var st_id = $('#style').val();
                var id = <?php echo $_SESSION['mt_id']; ?>;
                var level = <?php echo $_SESSION['mt_lv_id']; ?>;

                $.ajax({
                    type: "POST",
                    url: path + "/event",
                    dataType: "json",
                    data: {
                        ev_title: ev_title,
                        ev_starttime: ev_starttime,
                        ev_endtime: ev_endtime,
                        ev_startdate: ev_startdate,
                        ev_enddate: ev_enddate,
                        ev_people: ev_people,
                        st_id: st_id,
                        ro_id: ro_id,
                        id: id,
                        level: level,

                    },
                    success: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: result.message

                        })
                        // $("#frmTools")[0].reset();
                        // $("#to_name")[0].focus();
                    }
                    // ,
                    // error: function(result) {
                    //     const Toast = Swal.mixin({
                    //         toast: true,
                    //         position: 'top-end',
                    //         showConfirmButton: false,
                    //         timer: 3000,
                    //     })
                    //     Toast.fire({
                    //         icon: 'warning',
                    //         title: 'ไม่สามารถบันทึกข้อมูลได้'

                    //     })
                    //     // .then((result) => {
                    //     //     location.reload();

                    //     // })

                    // }
                });

                function clear_tools(msg) {
                    $("#frmTools")[0].reset();
                    $("#to_name")[0].focus();
                }

            });

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
                }
            });
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/rooms",
                success: function(result) {
                    var data = data = '<div class="form-group row">' +
                        '<div class="input-group">';
                    for (i in result) {
                        data += '<label class="col-md-3 col-form-label">' + result[i].ro_name + '  :</label> <div class="col-md-3 ">'
                        data += "<div class='rounded h-75 w-100'  style =\"background-color : " + result[i].ro_color + "\"></div>";
                        data += '</div>';
                    }
                    $('#showcolor').html(data);
                }
            });
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
                    $('#tool').val(null).trigger("change");
                });

                $('#tool').prop('disabled', false);
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: path + "/tools",
                    success: function(result) {
                        var data = '';
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