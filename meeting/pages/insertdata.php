<?php
require_once "../login/check_session.php";
if ($_SESSION['mt_duty_id'] ) {
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
<link rel="stylesheet" href="..//plugins/fontawesome-pro6/css/all.min.css">
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
                    <a class="nav-link active">เพิ่มข้อมูล</a>
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
                    <div class="row mt-3">
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>เพิ่มห้องประชุม</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="POST" action="" id="frmRoom" name="frmRoom">
                                    <div class="card-body">
                                        <!--//? /.Room Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">ชื่อห้องประชุม :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="ro_name" name="ro_name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--//? /.Room Name -->
                                        <!-- //? Input People -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">จำห้องคนที่บรรจุ :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="ro_people" name="ro_people" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //? Input People -->
                                        <!-- //? Input Color -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">สีห้อง :</label>
                                                <div class="col-md-9">
                                                    <input type="color" class="form-control  " id="ro_color" name="ro_color">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- //? Input Color -->
                                        <!-- //? Input Detail -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">รายละเอียดห้อง :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="ro_detail" name="ro_detail" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //? Input Detail -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">สถานะ :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="ro_public" name="ro_public">
                                                        <option value="Y">Online</option>
                                                        <option value="N">Offline</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2">ยกเลิก</button>
                                            <button type="submit" class="col-md-4 btn btn-success mt-2" id="btnRooms">ยืนยันเพิ่มห้องประชุม</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!-- //? Form Tools -->
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>เพิ่มอุปกรณ์</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="POST" action="" id="frmTools">
                                    <div class="card-body ">
                                        <!--//? /.Tool Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">อุปกรณ์ :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="to_name" name="to_name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--//? /.Tool Name -->
                                        <!-- //? Input People -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">ward :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="ward_id">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">faction :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="fac_id">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">แผนกที่ดูแล :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="de_id">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //? Input People -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2">ยกเลิก</button>
                                            <button type="submit" class="col-md-4 btn btn-success mt-2" id="btnTools" name="btnTools">ยืนยันเพิ่มอุปกรณ์</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!-- //? Form Tools -->
                    </div>
                    <!-- ./row form -->
                    <div class="row">
                        <!--  //? ./From StyleRoom -->
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>เพิ่มรูปแบบห้อง</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="POST" action="" id="frmStyleRoom">
                                    <div class="card-body">
                                        <!--//? /.StyleRoom Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">รูปแบบห้องประชุม :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="st_name" name="st_name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--//? /.StyleRoom Name -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2">ยกเลิก</button>
                                            <button type="submit" class="col-md-4 btn btn-success mt-2" id="btnStyle">ยืนยันเพิ่มรูปแบบห้อง</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <!-- ./col -->
                    <!--  //? ./From Department -->
                </div>

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

    <!-- color picker -->
    <script src="../plugins/colorpicker/colorpic.js"></script>
    <!-- Sweetalert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/javascript/adminlte.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>


    <script>
        $(document).ready(function() {
            $('.my-colorpicker1').colorpicker()
            $('.select2').select2();

            var path = '<?php echo $_SESSION['mt_path']; ?>';
            var lv_id = '<?php echo $_SESSION['mt_duty_id']; ?>';
            var depart_id ='<?php echo $_SESSION['mt_de_id']; ?>';
            var ward_id ='<?php echo $_SESSION['mt_ward_id']; ?>';
            var fac_id ='<?php echo $_SESSION['mt_faction_id']; ?>';
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
            $('#position').val("<?php echo $_SESSION['position']; ?>");

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
                    $('#de_id').html(depart);

                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart/faction",
                success: function(result) {
                    var fact = '';
                    for (ii in result) {
                        if (result[ii].faction_id == fac_id) {
                            fact += '<option selected value="' + result[ii].faction_id + '" selected >' + result[ii]
                                .faction_name +
                                '</option>'
                        } else {
                            fact += '<option value="' + result[ii].faction_id + '">' + result[ii]
                                .faction_name +
                                '</option>';
                        }

                    }
                    $('#fac_id').html(fact);

                }
            });
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
                    $('#ward_id').html(ward);

                }
            });
            /// Rooms
            $(document).on('click', '#btnRooms', function(e) {
                // $('#btnRooms').click(function(e) {
                e.preventDefault();
                var ro_name = $('#ro_name').val();
                var ro_people = $('#ro_people').val();
                var ro_color = $('#ro_color').val();
                var ro_detail = $('#ro_detail').val();
                var ro_public = $('#ro_public').val();
                $.ajax({
                    type: "POST",
                    url: path + "/rooms",
                    dataType: "json",
                    data: {
                        ro_name: ro_name,
                        ro_people: ro_people,
                        ro_color: ro_color,
                        ro_detail: ro_detail,
                        ro_public: ro_public,
                    },
                    success: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: result.message

                        })
                        $("#frmRoom")[0].reset();
                        $("#ro_name")[0].focus();
                        $("#ro_people")[0].reset();
                        $("#ro_detail")[0].reset();
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

                        }).then((result) => {
                            msg = '';
                            clear_room(msg);

                        })
                    }

                })

                function clear_room(msg) {
                    $("#frmRoom")[0].reset();
                    $("#ro_name")[0].focus();
                    $("#ro_people")[0].reset();
                    $("#ro_detail")[0].reset();
                }
            });



            /// Tools
            $(document).on('click', '#btnTools', function(e) {
                // $('#btnTools').click(function(e) {
                e.preventDefault();
                var to_name = $('#to_name').val();
                var de_id = $('#de_id').val();
                $.ajax({
                    type: "POST",
                    url: path + "/tools",
                    dataType: "json",
                    data: {
                        to_name: to_name,
                        de_id: de_id,
                    },
                    success: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: result.message

                        })
                        $("#frmTools")[0].reset();
                        $("#to_name")[0].focus();
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
                            msg = '';
                            clear_tools(msg);

                        })

                    }
                });

                function clear_tools(msg) {
                    $("#frmTools")[0].reset();
                    $("#to_name")[0].focus();
                }

            });


            /// Style
            $(document).on('click', '#btnStyle', function(e) {
                // $('#btnStyle').click(function(e) {
                e.preventDefault();
                var st_name = $("#st_name").val();
                $.ajax({
                    type: "POST",
                    url: path + "/style",
                    dataType: "json",
                    data: {
                        st_name: st_name,
                    },
                    success: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: result.message

                        })
                        $("#frmStyleRoom")[0].reset();
                        $("#st_name")[0].focus();
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
                            title: 'ไม่สามารถบันทึกข้อมูลรูปแบบห้องได้'

                        }).then((result) => {
                            msg = '';
                            clear_Style(msg);

                        })

                    }
                })

                function clear_Style(msg) {
                    $("#frmStyleRoom")[0].reset();
                    $("#st_name")[0].focus();
                }
            });


        });
    </script>

</body>

</html>