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
<link rel="stylesheet" href="../../views/plugins/fontawesome-pro6/css/all.min.css">
<!-- bt -->
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
        <?php require_once './sidebar/asidebar.php'; ?>
        <!-- Sidebar -->
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
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-10 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>รายการจอง</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-0">
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
                    </div>
                    <!-- ./row form -->


                    <?php require_once './modal.php'; ?>

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
    <!-- Font Awesome 6 -->
    <script src="../../views/plugins/fontawesome-pro6/js/all.min.js"></script>
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


            var path = 'http://127.0.0.1:4500'
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart",
                success: function(result) {
                    var depart = '<option value="" selected disabled>-- เลือกแผนกที่ดูแล --</option>';
                    for (ii in result) {
                        depart += '<option value="' + result[ii].de_id + '">' + result[ii]
                            .de_name +
                            '</option>';
                    }
                    $('#de_id').html(depart);
                    $('#modal_de_id').html(depart);
                }
            });

            //todo: table room
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/rooms",
                success: function(data) {
                    var i = 0;
                    var table = '<table with="100%" class="table table-hover text-nowrap">' +
                        '<thead><tr><th>ID</th><th>ชื่อห้อง</th><th>จำนวนคนที่เข้าประชุมได้</th><th>รายละเอียด</th><th></th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        table += ('<tr>');
                        table += ('<td>' + cell.ro_id + '</td>');
                        table += ('<td>' + cell.ro_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td>' + cell.ro_people + '</td>');
                        table += ('<td>' + cell.ro_detail + '</td>');
                        table += ('<td width="20%"><a id="' + cell.ro_id + '" class="btn btn-info btnRoomEdit"><i class="fas fa-edit"></i></a>' +
                            ' <a id="' + cell.ro_id + '" class="btn btn-danger btnRoomDels"><i class="fas fa-trash-alt"></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableRooms").html(table);

                    $(".btnRoomEdit").click(function(e) {
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
                    $(".btnRoomDels").click(function(e) {
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
                                            timer: 3000,
                                        })
                                        Toast.fire({
                                            icon: 'warning',
                                            title: 'ไม่สามารถลบขเอมูลได้'

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
            $(".btnSaveRoom").click(function(e) {
                e.preventDefault();

                var ro_id = $("#modal_ro_id").val();
                var ro_name = $("#modal_ro_name").val();
                var ro_people = $("#modal_ro_people").val();
                var ro_color = $("#modal_ro_color").val();
                var ro_detail = $("#modal_ro_detail").val();

                $.ajax({
                    type: "PUT",
                    url: path + "/rooms",
                    data: {
                        ro_id: ro_id,
                        ro_name: ro_name,
                        ro_people: ro_people,
                        ro_color: ro_color,
                        ro_detail: ro_detail

                    },
                    dataType: "json",
                    success: function(result) {
                        $('#ModalRoom').modal('hide');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: result.message
                        }).then((result) => {
                            location.reload();
                        })

                    },
                    error: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: 'ไม่สามารถบันทึกข้อมูลห้องประชุมได้'

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