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

echo "<script>
	window.setTimeout(function() {
		window.location = '../views/index.html';
	 }, 2000);
</script>";
