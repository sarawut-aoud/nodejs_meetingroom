<?php
session_start();
//! destroy จำ ลบทั้งหมดบน server
//* session_destroy();

// unset($_SESSION['erp_user']);
// unset($_SESSION['erp_id']);
// unset($_SESSION['erp_name']);
// unset($_SESSION['erp_sign_id']);
// unset($_SESSION['erp_sign_name']);
// unset($_SESSION['erp_level_id']);
// unset($_SESSION['erp_duty_id']);
// unset($_SESSION['erp_dury_name']);
// unset($_SESSION['erp_faction_id']);
// unset($_SESSION['erp_faction_name']);
// unset($_SESSION['erp_depart_id']);
// unset($_SESSION['erp_depart_name']);
// unset($_SESSION['erp_office_id']);
// unset($_SESSION['erp_office_name']);
// unset($_SESSION['erp_po_id']);
// unset($_SESSION['erp_po_name']);
// unset($_SESSION['erp_ac_id']);
// unset($_SESSION['erp_ac_name']);
// unset($_SESSION['erp_page']);
// unset($_SESSION['erp_right']);
// unset($_SESSION['erp_line']);
// unset($_SESSION['erp_token']);

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
			<h1>Good Bye!</h1>
			<h2>กำลังออกจากระบบ</h2>
		</div>
	</div>

</body>

</html>
