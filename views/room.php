<?php 
    session_start();
    $_SESSION['mt_path'] == "http://127.0.0.1:4200";
    // $_SESSION['mt_path']=='https://pbhapi.moph.go.th:4200'
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse"> -->
    <link rel="icon" href="./public/images/index.png" type="image/x-icon" />
    <title>Moph : MeetingRoom</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-pro6/css/all.css" />
    <!-- bt5 -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/styles/adminlte.min.css">
    <link rel="stylesheet" href="./public/styles/styleindex.css">

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white shadow">
            <div class="container-fluid ">
                <a href="./index.php" class="navbar-brand">
                    <img src="./public/images/logo.png" alt="Logo" class="brand-image " style="opacity: .8">
                    <span class="brand-text font-weight-light">ระบบจองห้องประชุม</span>
                </a>
                <a href="./room.html" class="navbar-brand ml-5">
                    <span class="brand-text font-weight-light">ห้องประชุม</span>
                </a>


                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- <a class="btn btn-success  mr-3">หน้าหลัก</a> -->
                    <a href="./_login.html" class="btn btn-success mr-3">เข้าสู่ระบบ</a>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center">ห้องประชุม โรงพยาบาลเพชรบูรณ์</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center ">


                        <div class="col-xl-6 col-md-12 ">
                            <div class="card ">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4> ห้องประชุมโรงพยาบาลเพชรบูรณ์</h5>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="tableRooms"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->




        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b> </b>
            </div>
            <strong>Copyright &copy; 2022 ศูนย์คอมพิวเตอร์ โรงพยาบาลเพชรบูรณ์ สงวนลิขสิทธิ์ </strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./plugins/fontawesome-pro6/js/all.js"></script>
    <!-- Select2 -->
    <script src="./plugins/select2/js/select2.full.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- InputMask -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/inputmask/inputmask.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <!-- date-range-picker -->
    <script src="./plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Summernote -->
    <script src="./plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="./plugins/fontawesome-pro6/js/all.min.js"></script>

    <!-- AdminLTE App -->
    <script src="./public/javascript/adminlte.js"></script>


    <script>
        $(document).ready(function() {
            // var path = 'https://pbhapi.moph.go.th:4200';
            var path = '<?php echo $_SESSION['mt_path']; ?>';
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/rooms",
                success: function(data) {
                    var i = 0;
                    var table =
                        '<table id="tbRoom"with="100%" class="table table-hover text-nowrap ">' +
                        '<thead  align="center"><tr><th>ID</th><th>ชื่อห้อง</th><th>จำนวนคนที่เข้าประชุมได้</th><th>รายละเอียด</th><th></th></thead></tr>';
                    $.each(data, function(idx, cell) {
                        // var icon = '<span class="waitingForConnection"> 🟢 </span><span> Online </span>';

                        var icon =
                            ' <div class="badge-online rounded-pill   position-relative">Online' +
                            '<span class="waitingForConnection"><span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">' +
                            '<span class="visually-hidden">New alerts</span></span></span></div>';

                        table += ('<tr align="center">');
                        table += ('<td>' + cell.ro_id + '</td>');
                        table += ('<td>' + cell.ro_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td>' + cell.ro_people + ' คน </td>');
                        table += ('<td>' + cell.ro_detail + '</td>');
                        table += ('<td>' + icon + '</td>');

                        table += ('</tr>');
                    });
                    table += '</table>';
                    $("#tableRooms").html(table);
                }
            });

        });
    </script>
</body>

</html>