<?php
session_start();
//! destroy จำ ลบทั้งหมดบน server
//* session_destroy

unset($_SESSION['mt_id']);
unset($_SESSION['mt_user']);
// unset($_SESSION['mt_person_id']);
unset($_SESSION['mt_prefix']);
unset($_SESSION['mt_name']);
// unset($_SESSION['mt_position']);
// unset($_SESSION['mt_phone']);
// unset($_SESSION['mt_de_id']);
// unset($_SESSION['mt_lv_id']);
// unset($_SESSION['mt_lv_name']); 
unset($_SESSION['mt_page']);
unset($_SESSION['mt_faction_id'] );
unset($_SESSION['mt_office_name'] );
unset($_SESSION['mt_duty_id']);
unset($_SESSION['mt_duty_name']);
unset($_SESSION['mt_faction_id']);
unset($_SESSION['mt_faction_name']);
unset($_SESSION['mt_de_id']);
unset($_SESSION['mt_de_name']);

echo "<script>
	window.setTimeout(function() {
		window.location = '../index.php';
	 }, 1000);
</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="../public/images/index.png" type="image/x-icon" />

    <title>404</title>


    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="../public/styles/font-awesome.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../public/styles/style404.css" />

</head>

<body>

    <div id="notfound" style="background-color: white;">
        <div class="notfound">
            <div class="">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div>
                <img src="../public/images/load2.gif" style="width:400px">
                <h2>กำลังออกจากระบบ <span style="color: green;">Good bye!</span></h2>
            </div>

            <!-- <h2 style="color: red;">กำลังออกจากระบบ</h2> -->
        </div>
    </div>

</body>

</html>