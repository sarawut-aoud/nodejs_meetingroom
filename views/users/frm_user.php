<?php
require_once "../../login/check_session.php";
if ($_SESSION['mt_lv_id'] == 2) {
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
                    <a href="./_index.php" class="nav-link">หน้าแรก</a>
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
                                            <div class="col-md ">
                                                <center>
                                                    <img src="../public/images/user.png" width="200px">
                                                </center>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <label class="col-sm-2 col-form-label">Username :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control " id="username" />
                                            </div>
                                            <label class="col-sm-2 col-form-label">Password :</label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control " id="password" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-3 mb-3" style="background-color: black;">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <label class="col-sm-2 col-form-label">คำนำหน้า :</label>
                                            <div class="col-md-4">
                                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="prefix2">
                                                    <option value="นาย">นาย</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="">ไม่ระบุ</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="input-group">
                                            <label class="col-sm-2 col-form-label">ชื่อ :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control " id="fname" />
                                            </div>
                                            <label class="col-sm-2 col-form-label">นามสกุล :</label>
                                            <div class="col-md">
                                                <input type="text" class="form-control " id="lname" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <div class="input-group">
                                            <label class="col-sm-2 col-form-label">แผนก :</label>
                                            <div class="col-md-4">
                                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" data-placeholder="- แผนก -" id="dename">
                                                    <option value=""></option>

                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label">ตำแหน่ง :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control " id="position" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="input-group">
                                            <label class="col-sm-2 col-form-label">โทรศัพท์ :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control " id="phone" />
                                            </div>
                                            <label class="col-sm-2 col-form-label">เลขบัตรประชาชน :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control " id="personid" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="input-group">

                                            <label class="col-sm-2 col-form-label">ระดับสิทธิ์ :</label>
                                            <div class="col-md-4">
                                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" data-placeholder="- ระดับสิทธิ์ -" id="level">
                                                    <option value=""></option>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class=" card-footer">
                                    <div class="row justify-content-end ">

                                        <button type="submit" id="saveUser" class="col-md-4 btn btn-success mt-2 ">ยืนยันการแก้ไขข้อมูล</button>
                                    </div>
                                </div>
                            </div>

                        </div>
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

            var path = 'http://127.0.0.1:4500';
            var id = '<?php echo $_SESSION['mt_id']; ?>',
                de_id = '<?php echo $_SESSION['mt_de_id']; ?>';

            $.ajax({
                type: "get",
                url: path + "/event/count/user",
                data: {
                    id: id,
                    de_id: de_id,
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


            var path = 'http://127.0.0.1:4500';
            var id = '<?php echo $_SESSION['mt_id'] ?>';
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/user",
                data: {
                    id: id,
                },
                success: function(result) {
                    var data = '';
                    for (i in result) {
                        if (result[i].id == id) {
                            var username = result[i].username;
                            var password = result[i].password;
                            var personid = result[i].person_id;
                            var firstname = result[i].firstname;
                            var lastname = result[i].lastname;
                            var position = result[i].position;
                            var phone = result[i].phone;
                            var dename = result[i].de_name;
                            var level = result[i].level;
                        }
                    }
                    $('#username').val(username);
                    $('#password').val(password);
                    $('#fname').val(firstname);
                    $('#lname').val(lastname);
                    $('#personid').val(personid);
                    $('#phone').val(phone);
                    $('#position').val(position);


                }
            });

            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart",
                success: function(result) {
                    var depart = '<option value="0" selected disabled>-- แผนก --</option>';
                    for (ii in result) {
                        depart += '<option value="' + result[ii].de_id + '">' + result[ii]
                            .de_name +
                            '</option>';
                    }
                    $('#dename').html(depart);

                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/level",
                success: function(result) {
                    var level = '<option value="0" selected disabled>-- ระดับสิทธ์ --</option>';
                    for (ii in result) {
                        level += '<option value="' + result[ii].lv_id + '">' + result[ii]
                            .level +
                            '</option>';
                    }
                    $('#level').html(level);

                }
            });
            ///saveUser
            $('#saveUser').click(function(e) {
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                var person_id = $('#personid').val();
                var prefix = $("#prefix2").val();
                var firstname = $('#fname').val();
                var lastname = $('#lname').val();
                var position = $('#position').val();
                var phone = $('#phone').val();
                var de_id = $('#dename').val();
                var lv_id = $('#level').val();
                $.ajax({
                    type: "PUT",
                    url: path + "/user",
                    dataType: "json",
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
                        id:id,
                    },
                    success: function(result) {
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
                            $('#fname')[0].focus();
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
                            title: 'ไม่สามารถบันทึกข้อมูลได้'

                        }).then((result) => {
                            // location.reload();
                            $('#fname')[0].focus();
                            $('#lname')[0].reset();
                            $('#personid')[0].reset();
                            $('#phone')[0].reset();
                            $('#position')[0].reset();

                        })
                    }

                })

            });

        });
    </script>

</body>

</html>