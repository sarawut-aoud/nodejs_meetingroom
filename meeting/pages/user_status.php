<?php
require_once "../login/check_session.php";

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../public/images/index.png" type="image/x-icon" />
<title>Moph : MeetingRoom</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-pro6/css/all.min.css">
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
<!-- colorpic -->
<link rel="stylesheet" href="../plugins/colorpicker/colorpicker.css">
<!-- Sweetalert2 -->
<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
                    <a href="./_index.php" class="nav-link ">หน้าแรก</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link  active">รายการจอง</a>
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
        <?php require_once '../sidebar.php'; ?>
        <!-- Sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid ">
                    <?php require_once '../infomation.php'; ?>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-10 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header card-head ">
                                    <div class="text-center">
                                        <h1>รายการจอง</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="frmTable">

                                    <div class="card-body table-responsive p-2">
                                        <!--//? tableRoom -->
                                        <div id="tbstatus">
                                        </div>
                                        <!--//? tableRoom -->
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- ./row form -->


                    <?php require_once './modal_reserveAll.php'; ?>

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
    <!-- Font Awesome 6 -->
    <script src="../plugins/fontawesome-pro6/js/all.min.js"></script>
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
    <!-- color picker -->
    <script src="../plugins/colorpicker/colorpic.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/javascript/adminlte.js"></script>
    <script>
        $(document).ready(function() {

            cache_clear();

            setInterval(function() {
                cache_clear()
            }, 5000);
        });


        function cache_clear() {

            var path = '<?php echo $_SESSION['mt_path'] ?>';
            var id = '<?php echo $_SESSION['mt_id']; ?>';

            $.ajax({
                type: "get",
                url: path + "/event/count/user",
                data: {
                    id: id,
                },
                success: function(result) {
                    if (result.ev_status > 0) {
                        $("#uun1").html(
                            '<div class="badge badge-danger">' + result.ev_status + "</div>"
                        );
                    }
                },
            });
            // window.location.reload(); use this if you do not remove cache
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.my-colorpicker1').colorpicker();
            $('.select2').select2();
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

            var path = '<?php echo $_SESSION['mt_path'] ?>',
                id = '<?php echo $_SESSION['mt_id']; ?>',
                level = '<?php echo $_SESSION['mt_lv_id']; ?>',
                de_id = '<?php echo $_SESSION['mt_de_id']; ?>',
                ward_id = '<?php echo $_SESSION['mt_ward_id']; ?>';
           
            // แสดงข้อมูลส่วนตัว
            var prefix = '';
            if (<?php echo $_SESSION['mt_prefix']; ?> == 1) {
                prefix = 'นาย';
            } else if (<?php echo $_SESSION['mt_prefix']; ?> == 2) {
                prefix = 'นาง';
            }
            $('#name').val("<?php echo $_SESSION['mt_name']; ?>");
            $('#prefix').val(prefix);
            $('#de_name').val("<?php echo $_SESSION['mt_de_name']; ?>");
            $('#ward_name').val("<?php echo $_SESSION['mt_ward_name']; ?>");
            $('#fac_name').val("<?php echo $_SESSION['mt_faction_name']; ?>");
            $('#position').val("<?php echo $_SESSION['mt_duty_name']; ?>");

            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/tools",
                success: function(result) {
                    var data = ' <div class="form-group  ">';
                    var x = 0;
                    for (i in result) {
                        x++
                        data += '<div class="d-block form-check"><input class="form-check-input" type="checkbox" name="to_id[]" id="' + x + '"  value="' + result[i].to_id + '"  >  '
                        data += ' <label class="form-check-label" for="' + x + '" >' + result[i].to_name + '</label> </div>'
                        data += '<input type="hidden"  id="sunnum" name="sumnum" value="' + (x) + '">'
                    }
                    data += '</div>';
                    $('#modaltool').html(data);

                }
            });
            // var id = $('#mtID').val();
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/seting/notified",
                data: {
                    id: id,
                },
                success: function(data) {
                    var i = 0;

                    var table = '<table id="tbTool"with="100%" class="table table-hover text-nowrap ">' +
                        '<thead><tr><th>ID</th><th>วันที่ขอจอง</th><th>ชื่อห้อง</th><th>หัวข้อเรื่องประชุม</th><th>วันที่</th><th>ถึง</th><th>สถานะ</th><th>รายละเอียด</th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        if (cell.ev_status == 5) {
                            var bage3 = '<span class="badge rounded-pill bg-dark">ยกเลิก</span>';

                        } else if (cell.ev_status == 4) {
                            var bage3 = '<span class="badge rounded-pill bg-danger">ไม่อนุมัติ</span>';

                        } else if (cell.ev_status == 3) {
                            var bage3 = '<span class="badge rounded-pill bg-success">อนุมัติ</span>';

                        } else if (cell.ev_status == 2) {
                            var bage3 = '<span class="badge rounded-pill bg-danger">ไม่อนุมัติจากหัวหน้า</span>';

                        } else if (cell.ev_status == 1) {
                            var bage3 = '<span class="badge rounded-pill bg-warning">รออนุมัติ</span>'
                        } else if (cell.ev_status == 0) {
                            var bage3 = '<span class="badge rounded-pill bg-warning">รออนุมัติจากหัวหน้า</span>';
                        }
                        table += ('<tr>');
                        table += ('<td>' + cell.ev_id + '</td>');
                        table += ('<td>' + cell.ev_createdate.split('T')[0] + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td>' + cell.ro_name + '</td>');
                        table += ('<td>' + cell.ev_title + '</td>');
                        table += ('<td>' + cell.ev_startdate.split('T')[0] + '<span style="color:red;"> เวลา </span>' + cell.ev_starttime + '</td>');
                        table += ('<td>' + cell.ev_enddate.split('T')[0] + ' <span style="color:red;"> เวลา </span> ' + cell.ev_endtime + '</td>');
                        table += ('<td>' + bage3 + '</td>');
                        table += ('<td align="center" width="10%"><a id="' + cell.ev_id + '" class="btn btn-info btnEdit" title="ดูรายละเอียด"><i class="fas fa-eye"></i></a></td>');

                        table += ('</tr>');
                    });
                    table += '</table>';


                    $("#tbstatus").html(table);

                    $("#tbTool")
                        .DataTable({
                            responsive: true,
                            lengthChange: false,
                            "lengthMenu": [
                                [9, 24, 49, -1],
                                [10, 25, 50, "All"]
                            ],
                            autoWidth: false,
                            buttons: {
                                dom: {
                                    button: {
                                        className: "btn btn-light  ",
                                    },
                                },
                                buttons: [{
                                    extend: "colvis",
                                    className: "btn btn-outline-success"
                                }, ]
                            },
                            language: {
                                buttons: {
                                    colvis: "Change columns",
                                },
                            },
                        })
                        .buttons()
                        .container()
                        .appendTo("#tbRoom_wrapper .col-md-6:eq(0)");

                    $(document).on('click', '.btnEdit', function(e) {

                        // $(".btnEdit").click(function(e) {
                        e.preventDefault();
                        var ev_id = $(this).attr('id');
                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: path + "/seting/detail",
                            data: {
                                ev_id: ev_id,
                            },
                            success: function(result) {
                                for (ii in result) {
                                    var event_id = result[ii].event_id;
                                    var ev_title = result[ii].ev_title;
                                    var ev_startdate = result[ii].ev_startdate;
                                    var ev_enddate = result[ii].ev_enddate;
                                    var ev_status = result[ii].ev_status;
                                    var ev_starttime = result[ii].ev_starttime;
                                    var ev_endtime = result[ii].ev_endtime;
                                    var ev_people = result[ii].ev_people;
                                    var ev_createdate = result[ii].ev_createdate;
                                    var to_name = result[ii].to_name;
                                    var ro_id = result[ii].ro_id;
                                    var ro_name = result[ii].ro_name;
                                    var st_name = result[ii].st_name;
                                    var de_name = result[ii].depart_name;
                                    var ward_name = result[ii].ward_name;
                                    var fac_name = result[ii].faction_name;

                                    var firstname = result[ii].firstname;
                                    var lastname = result[ii].lastname;
                                    var pos = result[ii].duty_name;
                                    var toolmore = result[ii].ev_toolmore;


                                    $.ajax({
                                        type: 'get',
                                        dataType: 'json',
                                        url: path + '/seting/requesttool',
                                        success: function(tool) {
                                            // console.log(result[ii].event_id)
                                            var to_name = ''
                                            for (i in tool) {

                                                if (tool[i].ev_id == ev_id) {

                                                    to_name += '<div class="col-form-label d-inline-flex ">🔎 ' + tool[i].to_name + '  </div>'

                                                }

                                                $("#modal2_tool").html(to_name);
                                            }

                                        }
                                    });

                                }
                                if (ev_status == 0) {
                                    var status = 'รออนุมัติจากหัวหน้า'
                                } else if (ev_status == 1) {
                                    var status = 'รออนุมัติ'
                                } else if (ev_status == 2) {
                                    var status = 'ไม่อนุมัติจากหัวหน้า'
                                } else if (ev_status == 3) {
                                    var status = 'อนุมัติ'
                                } else if (ev_status == 4) {
                                    var status = 'ไม่อนุมัติ'
                                } else if (ev_status == 5) {
                                    var status = 'ยกเลิก'
                                }
                                $("#modalDetail").modal("show");
                                $("#modal2_status").html(status);
                                $("#modal2_evid").html(ev_id);
                                $("#modal2_cre_date").html(ev_createdate);
                                $("#modal2_roName").html(ro_name);
                                $("#modal2_style").html(st_name);
                                $("#modal2_title").html(ev_title);
                                $("#modal2_people").html(ev_people);
                                $("#modal2_starttime").html(ev_startdate + '<span style="color:red;"> เวลา </span> ' + ev_starttime);
                                $("#modal2_endtime").html(ev_enddate + '<span style="color:red;"> เวลา </span> ' + ev_endtime);
                                $("#modal2_name").html(firstname + " " + lastname);
                                $("#modal2_dept").html(ward_name + '<br>' + fac_name + '<br>' + de_name);
                                $("#modal2_pos").html(pos);
                                if (toolmore == null) {
                                    $("#modal2_toolmore").html('<span style="color:red;">ไม่มี</span>');
                                } else {
                                    $("#modal2_toolmore").html(toolmore);
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>

</body>

</html>