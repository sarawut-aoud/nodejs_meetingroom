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
                    <a href="_index.php" class="nav-link ">หน้าแรก</a>
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
                                        <h1>ข้อมูลผู้ใช้งาน</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-2">
                                        <!--//? tableRoom -->
                                        <div id="tableUser">
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
                </div>
                <?php require_once './modal_user.php'; ?>
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
            // $('.my-colorpicker1').colorpicker();
            $('.select2').select2();

            var path = '<?php echo $_SESSION['mt_path']; ?>';
            var lv_id = '<?php echo $_SESSION['mt_lv_id']; ?>';

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
                url: path + "/user",
                success: function(data) {
                    var i = 0;
                    var table = '<table id="tbRoom"with="100%" class="table table-hover text-nowrap ">' +
                        '<thead><tr><th>ID</th><th>ชื่อ-นามสกุล</th><th>แผนก/หน่วยงาน</th><th>ตำแหน่ง</th><th>เบอร์โทร</th><th>ระดับสิทธิ์</th><th></th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        if (cell.lv_id == '1') {
                            var dels = ' <a id="' + cell.id + '" class="d-none"title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></a></td>';
                        } else {
                            var dels = ' <a id="' + cell.id + '" class="btn btn-danger btnDels"title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></a></td>';
                        }
                        table += ('<tr>');
                        table += ('<td>' + cell.id + '</td>');
                        table += ('<td>' + cell.firstname + ' ' + cell.lastname + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td>' + cell.de_name + '</td>');
                        table += ('<td>' + cell.position + '</td>');
                        table += ('<td>' + cell.phone + '</td>');
                        table += ('<td>' + cell.level + '</td>');
                        table += ('<td align="center" width="20%"><a id="' + cell.id + '" class="btn btn-info btnEdit"title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>' + dels + '</td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableUser").html(table);

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

                    $(document).on('click', '.btnEdit', function(e) {

                        // $(".btnEdit").click(function(e) {
                        e.preventDefault();
                        var id = $(this).attr('id');

                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: path + "/user",
                            data: {
                                id: id,
                            },
                            success: function(result) {
                                for (ii in result) {
                                    if (result[ii].id == id) {
                                        var username = result[ii].username;
                                        var password = result[ii].password;
                                        var firstname = result[ii].firstname;
                                        var lastname = result[ii].lastname;
                                        var position = result[ii].position;
                                        var phone = result[ii].phone;
                                        var personid = result[ii].person_id;
                                        var lv_id = result[ii].lv_id;
                                        var de_id = result[ii].de_id;

                                    }
                                }
                                $("#ModalUser").modal("show");

                                $("#iduser").val(id);
                                $("#modalusername").val(username);
                                $("#modalpassword").val(password);
                                $("#modalfname").val(firstname);
                                $("#modallname").val(lastname);
                                $("#modalposition").val(position);
                                $("#modalphone").val(phone);
                                $("#modalpersonid").val(personid);

                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/depart",
                                    success: function(result) {
                                        var depart = '';
                                        for (ii in result) {
                                            if (result[ii].de_id == de_id) {
                                                depart += '<option selected value="' + result[ii].de_id + '" selected >' + result[ii]
                                                    .de_name +
                                                    '</option>'
                                            } else {
                                                depart += '<option value="' + result[ii].de_id + '">' + result[ii]
                                                    .de_name +
                                                    '</option>';
                                            }

                                        }
                                        $('#modaldename').html(depart);

                                    }
                                });
                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/level",
                                    success: function(result) {
                                        var level = '';
                                        for (ii in result) {
                                            if (result[ii].lv_id == lv_id) {
                                                level += '<option selected value="' + result[ii].lv_id + '">' + result[ii]
                                                    .level +
                                                    '</option>';
                                            } else {
                                                level += '<option value="' + result[ii].lv_id + '">' + result[ii]
                                                    .level +
                                                    '</option>';
                                            }

                                        }
                                        $('#modallevel').html(level);

                                    }
                                });
                            }
                        });
                    });
                    $(document).on('click', '.btnDels', function(e) {
                        // $(".btnDels").click(function(e) {
                        e.preventDefault();

                        var id = $(this).attr('id');
                        var _row = $(this).parent();
                        Swal.fire({
                            title: 'คุณต้องการลบข้อมูลผู้ใช้ ใช่หรือไม่ ?',
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
                                    url: path + "/user",
                                    data: {
                                        id: id
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

            $(document).on('click', '#btnSaveUser', function(e) {
                ///  Btn Modal
                // $("#btnSaveUser").click(function(e) {
                e.preventDefault();

                var id = $("#iduser").val();
                var lv_id = $("#modallevel").val();
                var de_id = $("#modaldename").val();
                var username = $("#modalusername").val();
                var password = $("#modalpassword").val();
                var prefix = $("#modalprefix").val();
                var firstname = $("#modalfname").val();
                var lastname = $("#modallname").val();
                var position = $("#modalposition").val();
                var phone = $("#modalphone").val();
                var person_id = $("#modalpersonid").val();

                $.ajax({
                    type: "PUT",
                    url: path + "/user",
                    data: {
                        username: username,
                        password: password,
                        person_id: person_id,
                        prefix: prefix,
                        firstname: firstname,
                        lastname: lastname,
                        position: position,
                        phone: phone,
                        de_id: de_id,
                        lv_id: lv_id,
                        id: id,
                    },
                    dataType: "json",
                    success: function(result) {
                        $('#ModalUser').modal('hide');
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
                            title: 'ไม่สามรถแก้ไขข้อมูลผู้ใช้งานนี้ได้'

                        }).then((result) => {
                            // location.reload();
                            $('#modaldename')[0].focus();
                        })
                    }
                });
            });
            /// End Btn Modal
        });
    </script>

</body>

</html>