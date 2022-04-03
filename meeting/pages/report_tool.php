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
<!-- bt -->
<link rel="stylesheet" href="../plugins/bootstrap5/css/bootstrap.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../public/styles/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- colorpic -->
<link rel="stylesheet" href="../plugins/colorpicker/colorpicker.css">
<!-- Sweetalert2 -->
<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../public/styles/adminlte.min.css">
<link rel="stylesheet" href="../public/styles/styleindex.css">
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
                    <a href="_index.php" class="nav-link">หน้าแรก</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active">จัดเตรียมอุปกรณ์</a>
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
                    <div class="row justify-content-center mt-5">
                        <div class="col-xl-12 col-md-12 ">
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4> จัดเตรียมอุปกรณ์</h5>
                                    </div>
                                </div>
                                <div class="card-body p-2">
                                    <!-- THE CALENDAR -->
                                    <div id="table"></div>
                                </div>
                                <!-- /.card-body -->

                            </div>

                        </div>
                    </div>

                    <?php require_once '../modalshowtool.php'; ?>

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
    <!-- color picker -->
    <script src="../plugins/colorpicker/colorpic.js"></script>
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
            $('.my-colorpicker1').colorpicker()
            $('.select2').select2();
            // cache_clear();
            // setInterval(function() {
            //     cache_clear()
            // }, 5000);


            var path = '<?php echo $_SESSION['mt_path']; ?>';
            var id = '<?php echo $_SESSION['mt_id']; ?>';
            var duty_id = "<?php echo $_SESSION['mt_duty_id']; ?>";
            var ward_id = "<?php echo $_SESSION['mt_ward_id']; ?>";

            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/count/staff",
                // data: {
                //     level: lv_id,
                // },
                success: function(result) {
                    var bage = 0;

                    for (ii in result) {
                        if (result[ii].bage > 0) {
                            bage++;
                        }
                    }
                    $("#bage").html(bage);
                    $("#bage1").html(bage);

                }

            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/count",
                data: {
                    level: duty_id,
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

            var datetoday = new Date();
            var today2 = datetoday.toISOString("EN-AU", {
                    timeZone: "Australia/Melbourne"
                })
                .slice(0, 10);

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/tools/tools_request",
                data: {
                    date: today2,
                    ward_id: ward_id,
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
                        table += ('<td>' + cell.ev_createdate + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td>' + cell.ro_name + '</td>');
                        table += ('<td>' + cell.ev_title + '</td>');
                        table += ('<td>' + cell.ev_startdate + '<span style="color:red;"> เวลา </span>' + cell.ev_starttime + '</td>');
                        table += ('<td>' + cell.ev_enddate + ' <span style="color:red;"> เวลา </span> ' + cell.ev_endtime + '</td>');
                        table += ('<td>' + bage3 + '</td>');
                        table += ('<td align="center" width="10%"><a id="' + cell.ev_id + '" class="btn btn-info btnEdit" title="ดูรายละเอียด"><i class="fas fa-eye"></i></a></td>');

                        table += ('</tr>');
                    });
                    table += '</table>';


                    $("#table").html(table);

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
                            url: path + "/setdevice/detail",
                            data: {
                                ev_id: ev_id,
                            },
                            success: function(result) {
                                for (ii in result) {

                                    var ev_status = result[ii].ev_status;
                                    var roname = result[ii].ro_name;
                                    var stname = result[ii].st_name;
                                    var title = result[ii].ev_title;
                                    var people = result[ii].ev_people;
                                    var starttime = result[ii].ev_starttime;
                                    var endtime = result[ii].ev_endtime;
                                    var firstname = result[ii].person_firstname;
                                    var lastname = result[ii].person_lastname;
                                    var ward_id = result[ii].ward_id;
                                    var ward_name = result[ii].ward_name;
                                    var depart = result[ii].depart_name;
                                    var fac_name = result[ii].faction_name;
                                    var toolmore = result[ii].ev_toolmore;


                                    $.ajax({
                                        type: 'get',
                                        dataType: 'json',
                                        url: path + '/setdevice/requesttool',
                                        data: {
                                            ward_id: ward_id,
                                            ev_id: ev_id,
                                        },
                                        success: function(tool) {
                                            // console.log(result[ii].event_id)
                                            var to_name = ''
                                            for (i in tool) {

                                                to_name += '<div class="col-form-label d-inline-flex ">🔎 ' + tool[i].to_name + '  </div>'

                                            }
                                            if (to_name == '') {
                                                $("#modal2_tool").html('<span style="color:blue;">ไม่มีอุปกรณ์ที่ต้องเตรียม</span>');
                                            } else {
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
                                $("#modal2_roName").html(roname);
                                $("#modal2_style").html(stname);
                                $("#modal2_title").html(title);
                                $("#modal2_people").html(people);
                                $("#modal2_starttime").html(starttime);
                                $("#modal2_endtime").html(endtime);
                                $("#modal2_name").html(firstname + " " + lastname);
                                $("#modal2_dept").html(ward_name + '<br>' + fac_name + '<br>' + depart);
                                $("#modal2_pos").html('<?php echo $_SESSION['mt_duty_name']; ?>')

                                if (toolmore == null) {
                                    $("#modal2_toolmore").html('ไม่มี');
                                } else {
                                    $("#modal2_toolmore").html(toolmore);
                                }

                            }
                        });
                    });
                }
            });




        });


        // function cache_clear() {

        //     var path = '<?php echo $_SESSION['mt_path'] ?>';
        //     var id = '<?php echo $_SESSION['mt_id']; ?>',
        //         de_id = '<?php echo $_SESSION['mt_de_id']; ?>';

        //     var datetoday = new Date();
        //     var today2 = datetoday.toISOString("EN-AU", {
        //             timeZone: "Australia/Melbourne"
        //         })
        //         .slice(0, 10);
        //     $.ajax({
        //         type: 'get',
        //         dataType: 'json',
        //         url: path + "/tools/tools_request",
        //         data: {
        //             de_id: de_id,
        //             date: today2,
        //         },
        //         success: function(data) {
        //             var i = 0;
        //             var table =
        //                 '<table id="tbRoom"with="100%" class="table table-hover text-nowrap ">' +
        //                 '<thead  align="center"><tr><th>ID</th><th>ชื่อห้อง</th><th>วันที่</th><th>เวลา</th><th></th></thead></tr>';
        //             $.each(data, function(idx, cell) {
        //                 var info = '<a id="' + cell.ev_id + '" class="btn btn-info btnDetail" title="รายละเอียด"><i class="fa-solid fa-eye"></i></a>';

        //                 table += ('<tr align="center">');
        //                 table += ('<td>' + cell.ev_id + '</td>');
        //                 table += ('<td>' + cell.ev_title + '</td>');
        //                 // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
        //                 table += ('<td>' + cell.ev_startdate + ' ถึง ' + cell.ev_enddate + '</td>');
        //                 table += ('<td>' + '<span style="color:red;">' + cell.ev_starttime + '</span>' + ' ถึง ' + '<span style="color:red;">' + cell.ev_endtime + '</span>' + '</td>');
        //                 table += ('<td>' + info + '</td>');

        //                 table += ('</tr>');
        //             });
        //             table += '</table>';
        //             $("#tableRooms").html(table);
        //         }
        //     });

        //     // window.location.reload(); use this if you do not remove cache
        // }
    </script>
</body>

</html>