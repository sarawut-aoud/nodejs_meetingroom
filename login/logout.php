<?php
	session_start();
	//! destroy จำ ลบทั้งหมดบน server
    //* session_destroy();
	
	unset($_SESSION['erp_user']);
	unset($_SESSION['erp_id']);
	unset($_SESSION['erp_name']);
	unset($_SESSION['erp_sign_id']);
	unset($_SESSION['erp_sign_name']);
	unset($_SESSION['erp_level_id']);
	unset($_SESSION['erp_duty_id']);
	unset($_SESSION['erp_dury_name']);
	unset($_SESSION['erp_faction_id']);
	unset($_SESSION['erp_faction_name']);
	unset($_SESSION['erp_depart_id']);
	unset($_SESSION['erp_depart_name']);
	unset($_SESSION['erp_office_id']);
	unset($_SESSION['erp_office_name']);
	unset($_SESSION['erp_po_id']);
	unset($_SESSION['erp_po_name']);
	unset($_SESSION['erp_ac_id']);
	unset($_SESSION['erp_ac_name']);
	unset($_SESSION['erp_page']);
	unset($_SESSION['erp_right']);
	unset($_SESSION['erp_line']);
	unset($_SESSION['erp_token']);
	
	header("Location: ../index.html");
?>