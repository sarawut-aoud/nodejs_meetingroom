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
                    <a class="nav-link active">แก้ไขข้อมูลอุปกรณ์</a>
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

                    <div class="row justify-content-center mt-3">
                        <!-- //? Form Tools -->
                        <div class="col-xl-10 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header  card-head ">
                                    <div class="text-center">
                                        <h1>แก้ไขข้อมูลอุปกรณ์</h1>
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


            var prefix = ''
            if (<?php echo $_SESSION['mt_prefix'] ?> == 1) {
                prefix = 'นาย'
            } else {
                prefix = 'นาง'

            }
            $('#prefix').val(prefix);
            $('#name').val('<?php echo $_SESSION['mt_name'] ?>');
            $('#de_name').val('<?php echo $_SESSION['mt_de_name'] ?>');
            $('#ward_name').val("<?php echo $_SESSION['mt_ward_name']; ?>");
            $('#fac_name').val("<?php echo $_SESSION['mt_faction_name']; ?>");
            $('#positions').val("<?php echo $_SESSION['mt_duty_name']; ?>");

            var lv_id = '<?php echo $_SESSION['mt_duty_id']; ?>'
            var path = "<?php echo $_SESSION['mt_path'] ?>";
            var ward_id = "<?php echo $_SESSION['mt_ward_id'] ?>";
            var office_id = "<?php echo $_SESSION['mt_office_id'] ?>";
            var depart_id = "<?php echo $_SESSION['mt_de_id'] ?>";
            var fac_id = "<?php echo $_SESSION['mt_faction_id'] ?>";
            
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
                        table += ('<td align="center"width="20%"><a id="' + cell.to_id + '"data_id="' + cell.ward_id + '"  class="btn btn-info btnToolEdit"title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>  ' +
                            '<a id="' + cell.to_id + '" class="btn btn-danger btnToolDels"title="ลบข้อมูล"><i class="fa fa-trash-alt " ></i></a></td>');
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
                            },
                            success: function(result) {
                                for (ii in result) {
                                    if (result[ii].to_id == to_id) {
                                        var to_name = result[ii].to_name;
                                        // var ward_id = result[ii].ward_id;
                                        // var fac_id = result[ii].faction_id;
                                        // var depart_id = result[ii].depart_id;

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

            $(document).on('click', '.btnSaveTool', function(e) {
                // $(".btnSaveTool").click(function(e) {
                e.preventDefault();

                var to_id = $("#modal_to_id").val();
                var to_name = $("#modal_to_name").val();
                var de_id = $("#modal_depart_id").val();
                var w_id = $("#modal_ward_id").val();
                var f_id = $("#modal_fac_id").val();

                // console.log(to_id);
                $.ajax({
                    type: "PUT",
                    url: path + "/tools",
                    data: {
                        to_id: to_id,
                        to_name: to_name,
                        depart_id: de_id,
                        faction_id: f_id,
                        ward_id: w_id,
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