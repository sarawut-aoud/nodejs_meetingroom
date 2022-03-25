<?php
unset($_SESSION['mt_path']);
session_start();
//! สร้าง session ใหม่
// $_SESSION['erp_user'] = $_POST['user'];
// $_SESSION['erp_id'] = $_POST['id'];
// $_SESSION['erp_name'] = $_POST['name'];
// $_SESSION['erp_sign_id'] = $_POST['sign_id'];
// $_SESSION['erp_sign_name'] = $_POST['sign_name'];
// $_SESSION['erp_level_id'] = $_POST['level_id'];
// $_SESSION['erp_duty_id'] = $_POST['duty_id'];
// $_SESSION['erp_duty_name'] = $_POST['duty_name'];
// $_SESSION['erp_faction_id'] = $_POST['faction_id'];
// $_SESSION['erp_faction_name'] = $_POST['faction_name'];
// $_SESSION['erp_depart_id'] = $_POST['depart_id'];
// $_SESSION['erp_depart_name'] = $_POST['depart_name'];
// $_SESSION['erp_office_id'] = $_POST['office_id'];
// $_SESSION['erp_office_name'] = $_POST['office_name'];
// $_SESSION['erp_po_id'] = $_POST['po_id'];
// $_SESSION['erp_po_name'] = $_POST['po_name'];
// $_SESSION['erp_ac_id'] = $_POST['ac_id'];
// $_SESSION['erp_ac_name'] = $_POST['ac_name'];
// $_SESSION['erp_page'] = $_POST['page'];
// $_SESSION['erp_right'] = $_POST['right'];
// $_SESSION['erp_line'] = $_POST['line'];
// $_SESSION['erp_token'] = 'Enterprise Resource Planning';

//! -Meeting- ///

$_SESSION['mt_id'] = $_POST['id'];
$_SESSION['mt_user'] = $_POST['user'];
$_SESSION['mt_person_id'] = $_POST['person_id'];
$_SESSION['mt_prefix'] = $_POST['prefix'];
$_SESSION['mt_name'] = $_POST['name']; // fname + lname
$_SESSION['mt_position'] = $_POST['position'];
$_SESSION['mt_phone'] = $_POST['phone'];
$_SESSION['mt_de_id'] = $_POST['de_id'];
$_SESSION['mt_lv_id'] = $_POST['lv_id'];
$_SESSION['mt_lv_name'] = $_POST['lv_name'];
$_SESSION['mt_de_name'] = $_POST['de_name'];
//$_SESSION['mt_path'] = "https://pbhapi.moph.go.th:4200";
$_SESSION['mt_path'] = "http://127.0.0.1:4200";
