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
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- bt5 -->
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
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
                    <a href="./admintemplate.php" class="nav-link ">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active">Data</a>
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
                    <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item mt-3">
                            <a href="./admintemplate.php" class="nav-link active">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>เพิ่มข้อมูล</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="./admindata.php" class="nav-link active">
                                <i class="nav-icon fas fa-ballot"></i>
                                <p>ดูข้อมูล</p>
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

                                                <input type="text" class="form-control " id="de_name" name="de_name"  value="<?php echo $_SESSION['mt_de_name']; ?> "readonly />
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
                                        <h1>ห้องประชุม</h1>
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
                    <div class="row justify-content-center">
                        <!--  //? ./From StyleRoom -->
                        <div class="col-xl-10 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>รูปแบบห้อง</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-0">
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
                    <div class="row justify-content-center">
                        <!-- //? Form Tools -->
                        <div class="col-xl-10 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h1>อุปกรณ์</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-0">
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
                    <form action="" id="">
                        <!-- Modal -->
                        <div class="modal fade" id="ModalTool" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel"> Form EDit </h4>
                                    </div>
                                    <div class="modal-body" id="ModaldataTool" style="overflow-x: scroll;">
                                        <!--//? /.Tool Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">อุปกรณ์ :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="modalto_name" name="modalto_name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--//? /.Tool Name -->
                                        <!-- //? Input People -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">แผนกที่ดูแล :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="modalde_id">
                                                        <option value="">-- เลือกแผนกที่ดูแล --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //? Input People -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                    </form>

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
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/javascript/adminlte.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


    <script>
        $(document).ready(function() {
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

                }
            });
            // var table = $('#tb_Rooms');

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
                        table += ('<td width="20%"><a id="" class="btn btn-info"><i class="fas fa-edit"></i></a>' +
                            ' <a id="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableRooms").html(table);
                }
            });
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/style",
                success: function(data) {
                    var i = 0;
                    var table = '<table with="100%"class="table table-hover text-nowrap">' +
                        '<thead><tr><th>ID</th><th>รูปแบบห้อง</th><th></th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        table += ('<tr>');
                        table += ('<td width="20%">' + cell.st_id + '</td>');
                        table += ('<td width="60%">' + cell.st_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td width="20%"><a id="" class="btn btn-info"><i class="fas fa-edit"></i></a> ' +
                            '<a id="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableStyle").html(table);
                }
            });
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/tools",
                success: function(data) {
                    var i = 0;
                    var table = '<table  with="100%" class="table table-hover text-nowrap">' +
                        '<thead><tr><th>ID</th><th>อุปกรณ์</th><th>แผนกที่ดูแลอุปกรณ์</th><th></th></tr></thead>';

                    $.each(data, function(idx, cell) {
                        table += ('<tr>');
                        table += ('<td width="20%">' + cell.to_id + '</td>');
                        table += ('<td width="30%">' + cell.to_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td width="30%">' + cell.de_name + '</td>');
                        table += ('<td width="20%"><a id="' + cell.to_id + '"  class="btn btn-info btnToolEdit"><i class="fas fa-edit"></i></a>' +
                            ' <a id="' + cell.to_id + '" class="btn btn-danger btnToolDels"><i class="fa fa-trash " ></i></a></td>');
                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableTools").html(table);
                    // var to_id = $(this).attr('id');

                    $(".btnToolEdit").click(function(e) {
                        e.preventDefault();
                        var to_id = $(this).attr('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: path + "/tools",
                            data: {
                                to_id: to_id
                            },
                            success: function(result) {

                            }
                        });
                    });
                    $(".btnToolDels").click(function(e) {
                        e.preventDefault();

                        var to_id = $(this).attr('id');
                        var _row = $(this).parent();
                        // console.log(to_id);
                        $.ajax({
                            type: "DELETE",
                            url: path + "/tools",
                            data: {
                                to_id: to_id
                            },
                            dataType: "json",
                            success: function(result) {
                                _row.closest('tr').remove();;
                                toastr.success(
                                    result.message, {
                                        timeOut: 1000,
                                        fadeOut: 1000,
                                    }
                                );
                            },
                            error: function(resq) {
                                toastr.warning(
                                    result.message, {
                                        timeOut: 1000,
                                        fadeOut: 1000,
                                    }
                                );
                            }
                        });
                    });
                }

            });


        });
    </script>


</body>

</html>