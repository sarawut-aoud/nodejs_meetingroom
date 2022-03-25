<?php
require_once "../login/check_session.php";
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
<link rel="stylesheet" href="../plugins/bootstrap5/css/bootstrap.min.css" />
<!-- daterange picker -->
<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../public/styles/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.css">
<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Sweetalert2 -->
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
                    <a class="nav-link active">หน้าแรก</a>
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

        <?php require_once '../sidebar.php';  ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid ">
                    <div class="row mt-3 mb-4 ">
                        <center>
                            <div class="col-xl-6 col-md-12 ">
                                <h1>ปฏิทินการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h1>
                            </div>
                        </center>
                    </div>
                    <div class="row mb-4 justify-content-center">
                        <div class="col-xl-2 col-md-12 ">
                            <center>
                                <a href="adminroom.php" style="font-size: 25px;" class="btn btn-lg btn-info"><i style="font-size: 25px;" class=" fa-regular fa-calendar-check"></i> จองห้องประชุม</a>
                            </center>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4> <i class="fa-regular fa-calendar-days"></i> การประชุมประจำวัน</h4>
                                    </div>
                                </div>
                                <div class="card-body mb-0">
                                    <div id="showDate"></div>
                                    <div id="today" class="mt-2"></div>

                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-md-12 ">
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
                                                <input type="text" class="form-control " id="prefix" name="prefix" value="" readonly />
                                            </div>
                                            <label class=" col-form-label">ชื่อ - นามสกุล :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="name" name="name" value=" " readonly />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="input-group">
                                            <label class=" col-form-label">แผนก :</label>
                                            <div class="col-md">

                                                <input type="text" class="form-control " id="de_name" name="de_name" value=" " readonly />
                                            </div>
                                            <label class=" col-form-label">ตำแหน่ง :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="position" name="position" value=" " readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4> <i class="fa-regular fa-calendars"></i>ปฏิทินการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h4>
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
                        <div class="col-xl-4 col-md-12 ">
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
                    <?php require_once '../modalcalendar.php'; ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <?php require_once '../footer.php'; ?>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap5/js/bootstrap.min.js"></script>
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
    <script src="../public/javascript/moment-with-locales.js"></script>
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

            var path = "<?php echo $_SESSION['mt_path']; ?>";
            var lv_id = '<?php echo $_SESSION['mt_lv_id']; ?>'
            var id = '<?php echo $_SESSION['mt_id']; ?>';
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/user",
                data: {
                    id: id,
                },
                success: function(results) {
                    for (i in results) {
                        var prefix = results[i].prefix;
                        var fname = results[i].firstname;
                        var lname = results[i].lastname;
                        var pos = results[i].position;
                        var dename = results[i].de_name;
                        var level = results[i].level;
                    }
                    $('#name').val(fname + ' ' + lname);
                    $('#prefix').val(prefix);
                    $('#de_name').val(dename);
                    $('#position').val(pos + "/" + level);
                }
            })
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/count",
                data: {
                    level: lv_id,
                },
                success: function(result) {
                    var bage = 0;

                    for (ii in result) {
                        if (result[ii].bage > 0) {
                            bage++;
                        }
                    }
                    $("#bage").html(bage);

                }

            });


            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/rooms",
                success: function(result) {
                    var data = '<option value="" selected disabled>-- เลือกห้องประชุม --</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].ro_id + '" > ' + result[i].ro_name + '</option>';
                    }
                    $('#ro_name').html(data);

                    $("#ro_name").change(function() {
                        $('#people').prop('disabled', false);
                        var ro_id = $(this).val();
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: path + "/rooms",
                            data: {
                                ro_id: ro_id,
                            },
                            success: function(result) {
                                var row = '';
                                for (ii in result) {
                                    if (result[ii].ro_id == ro_id) {
                                        var people = result[ii].ro_people;
                                        var detail = result[ii].ro_detail;
                                        for (x = 1; x <= people; x++) {
                                            row += '<option value="' + x + '" > ' + x + '</option>';
                                        }
                                    }
                                }
                                $('#ro_people').val(people);
                                $('#ro_detail').val(detail);
                                $('#people').html(row);
                            }
                        });
                    });
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

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/rooms",
                success: function(result) {
                    data = '';
                    // var data = '<div class="form-group row">' +
                    //     '<div class="input-group">'
                    for (i in result) {
                        data += '<div class="form-group row">' +
                            '<div class="input-group">'
                        data += '<label class="col-md col-form-label">' + result[i].ro_name + '  :</label> <div class="col-md ">'
                        data += "<div class=' h-75 w-75 mt-2 rounded '  style =\"background-color : " + result[i].ro_color + "\"></div>";
                        data += '</div>';
                        data += '</div></div>';
                    }

                    $('#showcolor').html(data);
                }
            });

            function toThaiDateString(date) {
                let monthNames = [
                    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
                    "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
                    "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                ];

                let year = date.getFullYear() + 543;
                let month = monthNames[date.getMonth()];
                let numOfDay = date.getDate();

                let hour = date.getHours().toString().padStart(2, "0");
                let minutes = date.getMinutes().toString().padStart(2, "0");
                let second = date.getSeconds().toString().padStart(2, "0");

                return `${numOfDay} ${month} ${year} `; //+
                // `${hour}:${minutes}:${second} น.`;
            }
            let date1 = new Date();
            var button = '<center><button class="col-md-4 btn btn-info btn-block">' + toThaiDateString(date1) + '</button></center>'
            $('#showDate').html(button);

            var datetoday = new Date();
            var today2 = datetoday.toISOString("EN-AU", {
                    timeZone: "Australia/Melbourne"
                })
                .slice(0, 10);
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/today",
                success: function(results) {
                    var today = ''
                    for (i in results) {

                        if (results[i].ev_startdate == today2 || results[i].ev_enddate == today2) {

                            today +=
                                "<div class='rounded border  mt-2 position-relative '  style =\"background-color : " +
                                results[i].ro_color + "\"> " +
                                "<div class='ml-5 '>" + results[i].ev_title + " เวลา " + results[i]
                                .ev_starttime + " ถึง " + results[i].ev_endtime + "</div>" +
                                '<span class="waitingForConnection"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">' +
                                ' ใหม่ <span class="visually-hidden">unread messages</span><span>' +
                                "</div>";
                        }
                    }
                    $("#today").html(today);

                }
            })

        });

        function viewdetail(id) {
            //    console.log(id);
            var path = '<?php echo $_SESSION['mt_path'] ?>';
            // var id = calendar.getEventById(id); // ดึงข้อมูล ผ่าน api
            $.ajax({
                type: "POST",
                url: path + "/event/calendar",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(results) {

                    for (i in results) {
                        if (results[i].ev_id == id) {
                            var title = results[i].ev_title;
                            var room = results[i].ro_name;
                            var style = results[i].st_name;
                            var start = results[i].ev_startdate;
                            var end = results[i].ev_enddate;
                            var starttime = results[i].ev_starttime;
                            var endtime = results[i].ev_endtime;
                            var people = results[i].ev_people;
                            var name = results[i].firstname;
                            var lastname = results[i].lastname;
                            var dename = results[i].de_name;
                            var dephone = results[i].de_phone;
                        }
                    }
                    $("#calendarmodal").modal("show");

                    $("#calendarmodal-title").html(title);
                    $("#calendarmodal-detail").html(room);
                    $("#calendarmodal-style").html(style);
                    //$("#calendarmodal-detail").html(event.extendedProps.detail);
                    $("#calendarmodal-start").html(start.split('T')[0]);
                    $("#calendarmodal-end").html(end.split('T')[0]);
                    $("#calendarmodal-starttime").html(starttime);
                    $("#calendarmodal-endtime").html(endtime);
                    $("#calendarmodal-people").html(people);
                    $("#calendarmodal-name").html(name + ' ' + lastname);
                    $("#calendarmodal-dename").html(dename);
                    $("#calendarmodal-dephone").html(dephone);
                },
            });
        }
    </script>

</body>

</html>