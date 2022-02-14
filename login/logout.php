<?php
session_start();
//! destroy จำ ลบทั้งหมดบน server
//* session_destroy

unset($_SESSION['mt_id']);
unset($_SESSION['mt_user']);
unset($_SESSION['mt_person_id']);
unset($_SESSION['mt_prefix']);
unset($_SESSION['mt_name']);
unset($_SESSION['mt_position']);
unset($_SESSION['mt_phone']);
unset($_SESSION['mt_de_id']);
unset($_SESSION['mt_lv_id']);
unset($_SESSION['mt_lv_name']);


echo "<script>
	window.setTimeout(function() {
		window.location = '../views/index.html';
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
    <link type="text/css" rel="stylesheet" href="../views/public/styles/font-awesome.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../views/public/styles/style404.css" />

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-bg">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div>
            <h1 >Good <span style="color: green;">bye!</span></h1>
            </div>
          
            <h2 style="color: red;">กำลังออกจากระบบ</h2>
        </div>
    </div>

</body>

</html>