<?php
require_once "../login/check_session.php";
if ($_SESSION['mt_duty_id'] == 2) {
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
                    <a class="nav-link active">ดูข้อมูล</a>
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
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-md-12 ">
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4>ข้อมูลส่วนตัว</h4>
                                    </div>
                                </div>
                                <div class="card-body mb-0">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <label class=" col-form-label">คำนำหน้า :</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control " id="prefix" name="prefix" readonly />
                                            </div>
                                            <label class=" col-form-label">ชื่อ - นามสกุล :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="name" name="name" readonly />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="input-group">
                                            <label class=" col-form-label">แผนก :</label>
                                            <div class="col-md">

                                                <input type="text" class="form-control " id="de_name" name="de_name" readonly />
                                            </div>
                                            <label class=" col-form-label">ตำแหน่ง :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="position" name="position" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>ห้องประชุม</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-2">
                                        <!--//? tableRoom -->
                                        <div id="tableRooms">
                                        </div>
                                        <!--//? tableRoom -->
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!--  //? ./From StyleRoom -->
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>รูปแบบห้อง</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-2">
                                        <!--//? tableStyle -->
                                        <div id="tableStyle">
                                        </div>
                                        <!--//? tableStyle -->
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                                <!--  //? ./From StyleRoom -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- ./row form -->

                    <div class="row justify-content-center">

                        <!-- //? Form Tools -->
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>อุปกรณ์</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-2">
                                        <!--//? tableTools -->
                                        <div id="tableTools">
                                        </div>
                                        <!--//? tableTools -->
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!-- //? Form Tools -->
                    </div>
                    <?php require_once './modal.php'; ?>

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
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
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

            $('.my-colorpicker1').colorpicker();
             $('.select2').select2();
           
            
            var prefix = ''
            if (<?php echo $_SESSION['mt_prefix'] ?> == 1) {
                prefix = 'นาย'
            } else {
                prefix = 'นาง'

            }
            $('#prefix').val(prefix);
            $('#name').val('<?php echo $_SESSION['mt_name'] ?>');
            $('#de_name').val('<?php echo $_SESSION['mt_de_name'] ?>');
            $('#posiotion').val('');

            var lv_id = '<?php echo $_SESSION['mt_duty_id']; ?>'
            var path = "<?php echo $_SESSION['mt_path'] ?>";
            var ward_id = "<?php echo $_SESSION['mt_ward_id'] ?>";
            var office_id = "<?php echo $_SESSION['mt_office_id'] ?>";
            var depert_id = "<?php echo $_SESSION['mt_de_id'] ?>";
            var fac_id = "<?php echo $_SESSION['mt_faction_id'] ?>";

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


            //todo: table room
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/rooms",
                success: function(data) {
                    var i = 0;
                    var table = '<table id="tbRoom"with="100%" class="table table-hover text-nowrap ">' +
                        '<thead><tr><th>ID</th><th>ชื่อห้อง</th><th>จำนวนคนที่เข้าประชุมได้</th><th>รายละเอียด</th><th></th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        table += ('<tr>');
                        table += ('<td>' + cell.ro_id + '</td>');
                        table += ('<td>' + cell.ro_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td>' + cell.ro_people + '</td>');
                        table += ('<td>' + cell.ro_detail + '</td>');
                        table += ('<td align="center" width="20%"><a id="' + cell.ro_id + '" class="btn btn-info btnRoomEdit"title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>' +
                            ' <a id="' + cell.ro_id + '" class="btn btn-danger btnRoomDels"title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableRooms").html(table);

                    $("#tbRoom")
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

                    $(document).on('click', '.btnRoomEdit', function(e) {

                        // $(".btnRoomEdit").click(function(e) {
                        e.preventDefault();
                        var ro_id = $(this).attr('id');

                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: path + "/rooms",
                            data: {
                                ro_id: ro_id,
                            },
                            success: function(result) {
                                for (ii in result) {
                                    if (result[ii].ro_id == ro_id) {
                                        var ro_name = result[ii].ro_name;
                                        var ro_people = result[ii].ro_people;
                                        var ro_color = result[ii].ro_color;
                                        var ro_detail = result[ii].ro_detail;
                                        break;
                                    }
                                }
                                $("#ModalRoom").modal("show");
                                $("#modal_ro_id").val(ro_id);
                                $("#modal_ro_name").val(ro_name);
                                $("#modal_ro_people").val(ro_people);
                                $("#modal_ro_color").val(ro_color);
                                $("#modal_ro_detail").val(ro_detail);
                            }
                        });
                    });
                    $(document).on('click', '.btnRoomDels', function(e) {

                        // $(".btnRoomDels").click(function(e) {
                        e.preventDefault();

                        var ro_id = $(this).attr('id');
                        var _row = $(this).parent();
                        Swal.fire({
                            title: 'คุณต้องการลบข้อมูลห้องประชุมใช่หรือไม่ ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "ยืนยัน",
                            cancelButtonText: "ยกเลิก",
                        }).then((btn) => {
                            if (btn.isConfirmed) {
                                $.ajax({
                                    dataType: 'JSON',
                                    type: "DELETE",
                                    url: path + "/rooms",
                                    data: {
                                        ro_id: ro_id
                                    },
                                    success: function(result) {
                                        if (result.status == '0') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: result.message,
                                            })
                                            _row.closest('tr').remove();
                                        } else {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 1500,
                                            })
                                            Toast.fire({
                                                icon: 'warning',
                                                title: result.message,

                                            })
                                        }

                                    },
                                    error: function(result) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 1500,
                                        })
                                        Toast.fire({
                                            icon: 'warning',
                                            title: 'ไม่สามารถลบข้อมูลได้'

                                        }).then((result) => {
                                            location.reload();

                                        })
                                    }
                                });
                            }
                        })
                    });

                }
            });

            //todo: table Style
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/style",
                success: function(data) {
                    var i = 0;
                    var table = '<table id="tb_Style" with="100%"class="table table-hover text-nowrap">' +
                        '<thead><tr><th>ID</th><th>รูปแบบห้อง</th><th></th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        table += ('<tr>');
                        table += ('<td width="20%">' + cell.st_id + '</td>');
                        table += ('<td width="60%">' + cell.st_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td align="center" width="20%"><a id="' + cell.st_id + '" class="btn btn-info btnStyleEdit"title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a> ' +
                            '<a id="' + cell.st_id + '" class="btn btn-danger btnStyleDels "title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableStyle").html(table);

                    $("#tb_Style")
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
                        .appendTo("#tb_Style_wrapper .col-md-6:eq(0)");
                    $(document).on('click', '.btnStyleEdit', function(e) {
                        // $(".btnStyleEdit").click(function(e) {
                        e.preventDefault();
                        var st_id = $(this).attr('id');
                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: path + "/style",
                            data: {
                                st_id: st_id,
                            },
                            success: function(result) {
                                for (ii in result) {
                                    if (result[ii].st_id == st_id) {
                                        var st_name = result[ii].st_name;
                                        break;
                                    }
                                }
                                $("#ModalStyle").modal("show");
                                $("#modal_st_id").val(st_id);
                                $("#modal_st_name").val(st_name);
                            }
                        });
                    });
                    $(document).on('click', '.btnStyleDels', function(e) {
                        // $(".btnStyleDels").click(function(e) {
                        e.preventDefault();
                        var st_id = $(this).attr('id');
                        var _row = $(this).parent();
                        Swal.fire({
                            title: 'คุณต้องการลบข้อมูลรูปแบบห้องประชุมใช่หรือไม่ ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "ยืนยัน",
                            cancelButtonText: "ยกเลิก",
                        }).then((btn) => {
                            if (btn.isConfirmed) {
                                $.ajax({
                                    dataType: 'JSON',
                                    type: "DELETE",
                                    url: path + "/style",
                                    data: {
                                        st_id: st_id
                                    },
                                    success: function(result) {
                                        if (result.status == '0') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: result.message,
                                            })
                                            _row.closest('tr').remove();
                                        } else {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 1500,
                                            })
                                            Toast.fire({
                                                icon: 'warning',
                                                title: result.message,

                                            })
                                        }
                                    },
                                    error: function(result) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 1500,
                                        })
                                        Toast.fire({
                                            icon: 'warning',
                                            title: 'ไม่สามารถลบข้อมูลได้'

                                        }).then((result) => {
                                            location.reload();

                                        })
                                    }
                                });
                            }
                        })
                    });
                }
            });
            //todo: table tools
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/tools",
                data: {
                    ward_id: ward_id,
                },
                success: function(data) {
                    var i = 0;
                    var table = '<table id="tb_Tools"  with="100%" class="table table-hover text-nowrap">' +
                        '<thead><tr><th>ID</th><th>อุปกรณ์</th><th>แผนกที่ดูแลอุปกรณ์</th><th></th></tr></thead>';

                    $.each(data, function(idx, cell) {
                        table += ('<tr>');
                        table += ('<td width="20%">' + cell.to_id + '</td>');
                        table += ('<td width="30%">' + cell.to_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td width="30%">' + cell.ward_name + '</td>');
                        table += ('<td  align="center"width="20%"><a id="' + cell.to_id + '"data_id="' + cell.ward_id + '"  class="btn btn-info btnToolEdit"title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>' +
                            ' <a id="' + cell.to_id + '" class="btn btn-danger btnToolDels"title="ลบข้อมูล"><i class="fa fa-trash-alt " ></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableTools").html(table);

                    $("#tb_Tools")
                        .DataTable({
                            responsive: true,
                            lengthChange: false,
                            "lengthMenu": [
                                [10, 24, 49, -1],
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
                        .appendTo("#tb_Tools_wrapper .col-md-6:eq(0)");

                    $(document).on('click', '.btnToolEdit', function(e) {

                        // $(".btnToolEdit").click(function(e) {
                        e.preventDefault();
                        var to_id = $(this).attr('id');
                        var ward_id = $(this).attr('data_id');
                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: path + "/tools",
                            data: {
                                to_id: to_id,
                                ward_id: ward_id,
                            },
                            success: function(result) {
                                for (ii in result) {
                                    if (result[ii].to_id == to_id) {
                                        var to_name = result[ii].to_name;
                                        var ward_id = result[ii].ward_id;
                                        var fac_id = result[ii].faction_id;
                                        var depart_id = result[ii].depart_id;

                                    }
                                }
                                $("#ModalTool").modal("show");
                                $("#modal_to_id").val(to_id);
                                $("#modal_to_name").val(to_name);
                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/depart",
                                    success: function(result) {
                                        var depart = '';
                                        
                                        for (ii in result) {
                                            if (result[ii].depart_id == depart_id) {
                                                depart += '<option selected value="' + result[ii].depart_id + '" selected >' + result[ii]
                                                    .depart_name +
                                                    '</option>'
                                            } else {
                                                depart += '<option value="' + result[ii].depart_id + '">' + result[ii]
                                                    .depart_name +
                                                    '</option>';
                                            }

                                        }
                                        $('#modal_depart_id').html(depart);
                                    }
                                })
                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/depart/faction",

                                    success: function(fac) {
                                        var fact = '';
                                        for (ii in fac) {
                                            
                                            if (fac[ii].faction_id == fac_id) {
                                                fact += '<option selected value="' + fac[ii].faction_id + '" selected >' + fac[ii]
                                                    .faction_name +
                                                    '</option>'
                                            } else {
                                                fact += '<option value="' + fac[ii].faction_id + '">' + fac[ii]
                                                    .faction_name +
                                                    '</option>';
                                            }

                                        }
                                        $('#modal_fac_id').html(fact);
                                    }

                                })
                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/depart/ward",

                                    success: function(result) {
                                        var ward = '';
                                        for (ii in result) {
                                            if (result[ii].ward_id == ward_id) {
                                                ward += '<option selected value="' + result[ii].ward_id + '" selected >' + result[ii]
                                                    .ward_name +
                                                    '</option>'
                                            } else {
                                                ward += '<option value="' + result[ii].ward_id + '">' + result[ii]
                                                    .ward_name +
                                                    '</option>';
                                            }

                                        }
                                        $('#modal_ward_id').html(ward);
                                    }

                                })
                            }
                        });
                    });
                    $(document).on('click', '.btnToolDels', function(e) {
                        // $(".btnToolDels").click(function(e) {
                        e.preventDefault();
                        console.log('das')
                        var to_id = $(this).attr('id');
                        var _row = $(this).parent();
                        // console.log(to_id);
                        Swal.fire({
                            title: 'คุณต้องการลบข้อมูลอุปกรณ์<br>ใช่หรือไม่ ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "ยืนยัน",
                            cancelButtonText: "ยกเลิก",
                        }).then((btn) => {
                            if (btn.isConfirmed) {
                                $.ajax({
                                    dataType: 'JSON',
                                    type: "DELETE",
                                    url: path + "/tools",
                                    data: {
                                        to_id: to_id
                                    },
                                    success: function(result) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: result.message,
                                        })
                                        _row.closest('tr').remove();
                                    },
                                    error: function(result) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                        })
                                        Toast.fire({
                                            icon: 'warning',
                                            title: 'ไม่สามารถลบข้อมูลได้'

                                        }).then((result) => {
                                            location.reload();

                                        })
                                    }
                                });
                            }
                        })
                    });
                }

            });

            //  Btn Modal //
            $(document).on('click', '.btnSaveRoom', function(e) {
                // $(".btnSaveRoom").click(function(e) {
                e.preventDefault();

                var ro_id = $("#modal_ro_id").val();
                var ro_name = $("#modal_ro_name").val();
                var ro_people = $("#modal_ro_people").val();
                var ro_color = $("#modal_ro_color").val();
                var ro_detail = $("#modal_ro_detail").val();
                var ro_public = $('#ro_public').val();

                $.ajax({
                    type: "PUT",
                    url: path + "/rooms",
                    data: {
                        ro_id: ro_id,
                        ro_name: ro_name,
                        ro_people: ro_people,
                        ro_color: ro_color,
                        ro_detail: ro_detail,
                        ro_public: ro_public

                    },
                    dataType: "json",
                    success: function(result) {
                        if (result.status == 400) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'warning',
                                title: result.message
                            }).then((result) => {
                                location.reload();
                            })
                        } else {
                            $('#ModalRoom').modal('hide');
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: result.message
                            }).then((result) => {
                                location.reload();
                            })

                        }

                    },
                    error: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                                icon: 'warning',
                                title: 'ไม่สามารถบันทึกข้อมูลห้องประชุมได้'

                            })
                            .then((result) => {
                                location.reload();
                            })

                    }
                });
            });
            $(document).on('click', '.btnSaveStyle', function(e) {
                // $(".btnSaveStyle").click(function(e) {
                e.preventDefault();

                var st_id = $("#modal_st_id").val();
                var st_name = $("#modal_st_name").val();

                $.ajax({
                    type: "PUT",
                    url: path + "/style",
                    data: {
                        st_id: st_id,
                        st_name: st_name,
                    },
                    dataType: "json",
                    success: function(result) {
                        if (result.status == 400) {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'warning',
                                title: result.message
                            })
                        } else {
                            $('#ModalStyle').modal('hide');
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: result.message
                            }).then((result) => {
                                location.reload();
                            })
                        }

                    },
                    error: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: 'ไม่สามารถบันทึกข้อมูลรูปแบบห้องประชุมได้'

                        }).then((result) => {
                            location.reload();
                        })
                    }
                });
            });

            $(document).on('click', '.btnSaveTool', function(e) {
                // $(".btnSaveTool").click(function(e) {
                e.preventDefault();

                var to_id = $("#modal_to_id").val();
                var to_name = $("#modal_to_name").val();
                var de_id = $("#modal_de_id").val();

                // console.log(to_id);
                $.ajax({
                    type: "PUT",
                    url: path + "/tools",
                    data: {
                        to_id: to_id,
                        to_name: to_name,
                        de_id: de_id,
                    },
                    dataType: "json",
                    success: function(result) {
                        if (result.status == 400) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'warning',
                                title: result.message

                            }).then((result) => {
                                location.reload();
                            })
                        } else {
                            $('#ModalTool').modal('hide');
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: result.message
                            }).then((result) => {
                                location.reload();
                            })
                        }

                    },
                    error: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: 'ไม่สามารถบันทึกข้อมูลอุปกรณ์ได้'

                        }).then((result) => {
                            location.reload();
                        })
                    }
                });
            });


            /// End Btn Modal
        });
    </script>

</body>

</html>