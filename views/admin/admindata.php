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
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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

                                                <input type="text" class="form-control " id="de_name" name="de_name" readonly />
                                            </div>
                                            <label class=" col-form-label">ตำแหน่ง :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="position" name="position" value="<?php echo $_SESSION['mt_position']; ?> " readonly />
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
                                <form method="POST" action="" id="frmRoom">
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
                                  
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!--  //? ./From Department -->
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
                                <form method="POST" action="" id="frmTools">
                                    <div class="card-body">
                                        <!--//? /.Room Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">อุปกรณ์ :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="to_name" name="to_name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--//? /.Room Name -->
                                        <!-- //? Input People -->
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
                                    
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!-- //? Form Tools -->
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
    <!-- AdminLTE App -->
    <script src="../public/javascript/adminlte.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


    <script>
        $(document).ready(function () {
            var path = 'http://127.0.0.1:4500'
            $.ajax({
                type: "get",
                dataType: "json",
                url: path+"/depart",
                success: function (result) {
                    var depart = '<option value="" selected disabled>-- เลือกแผนกที่ดูแล --</option>';
                    for (ii in result) {
                        depart += '<option value="' + result[ii].de_id + '">' + result[ii]
                            .de_name +
                            '</option>';
                    }
                    $('#de_id').html(depart);

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
    </script>
</body>

</html>