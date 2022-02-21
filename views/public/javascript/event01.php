
<?php
error_reporting(~E_NOTICE );
echo $ev_id = $_POST['ev_id'];
$event_id = $_POST['event_id'];
$ev_title = $_POST['ev_title'];
$ev_startdate = $_POST['ev_startdate'];
$ev_enddate = $_POST['ev_enddate'];
$ev_starttime = $_POST['ev_starttime'];
$ev_endtime = $_POST['ev_endtime'];
$ev_status = $_POST['ev_status'];
$ev_people = $_POST['ev_people'];
$ev_color = $_POST['ev_color'];
$ev_bgcolor = $_POST['ev_bgcolor'];
$ev_repeatday = $_POST['ev_repeatday'];
$ev_url = $_POST['ev_url'];

$ro_id = $_POST['ro_id'];
$ro_name = $_POST['ro_name'];
$ro_color = $_POST['ro_color'];

$st_id = $_POST['st_id'];
$st_name = $_POST['st_name'];

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$position = $_POST['position'];
$de_id = $_POST['de_id'];
$de_name = $_POST['de_name'];
$de_phone = $_POST['de_phone'];
$json_data = array();





if (isset($ev_id)) {

    // while () {


        $_start_date = $ev_startdate;
        $_end_date = false;
        $_start_time = false;
        $_end_time = false;
        $_repeat_day = false;
        //  $_all_day = ($row['ev_allday']!=0)?true:false;
        if ($ev_starttime != "00:00:00") {
            $_start_date = $ev_startdate . "T" . $ev_starttime;
            if ($ev_endtime != "00:00:00" && ($ev_starttime == $ev_enddate ||
                $ev_enddate == "0000-00-00")) {
                $_end_date = $ev_startdate . "T" . $ev_endtime;
            }
        }
        if ($ev_enddate != "0000-00-00") {
            $_end_date = $ev_enddate;
            if ($ev_endtime != "00:00:00") {
                $_end_date = $ev_enddate . "T" . $ev_endtime;
            } else {
                $_end_date = date("Y-m-d", strtotime($ev_enddate . " +1 day"));
            }
        }
        if (
            $ev_enddate != "0000-00-00" &&  $ev_enddate != $ev_startdate
            && $ev_endtime != "00:00:00" && $ev_endtime != "00:00:00"
        ) {
            $_start_date =  $ev_startdate;
            $_end_date =  $ev_enddate;
            $_start_time = $ev_starttime;
            $_end_time = $ev_endtime;
            $_all_day = false;
        }
        // ทำการเปลี่ยน หรือกำหนดการใช้งาน url หรือลิ้งค์ เป็นการเรียกใช้งาน javascript ฟังก์ชั่น
        // $row['ev_url'] = "javascript:viewdetail('{$row['ev_id']}');"; // ส่งค่า id ไปในฟังก์ชั่น
        // $ev_url;
        $arr_eventData = array(
            "id" => $ev_id,
            "groupId" => str_replace("-", "", $ev_enddate),
            "allDay" => $_all_day,
            "start" => $_start_date,
            "end" => $_end_date,
            "startTime" => $_start_time,
            "endTime" => $_end_time,
            "title" =>  $ev_title,
            "url" => $ev_url,
            "textColor" => $ev_color,
            "backgroundColor" => $ro_color,
            "borderColor" => $ev_bgcolor,


        );
        if ($ev_repeatday != "") {
            $arr_eventData['daysOfWeek'] = explode(",", $ev_repeatday);
        }
        if (
            $ev_enddate != "0000-00-00" && $ev_enddate != $ev_startdate
            && $ev_starttime != "00:00:00" && $ev_endtime != "00:00:00"
        ) {
            $arr_eventData['startRecur'] = $_start_date;
            $_end_date = date("Y-m-d", strtotime($ev_enddate . " +1 day"));
            $arr_eventData['endRecur'] = $_end_date;
        }
        if (!$_all_day) {
            unset($arr_eventData['allDay']);
        }
        if (!$_end_date) {
            unset($arr_eventData['end']);
        }
        if (!$_start_time) {
            unset($arr_eventData['startTime']);
        }
        if (!$_end_time) {
            unset($arr_eventData['endTime']);
        }
        $json_data[] = $arr_eventData;
    // }
}
// แปลง array เป็นรูปแบบ json string  
if (isset($json_data)) {
    $json = json_encode($json_data);
    if (isset($_GET['callback']) && $_GET['callback'] != "") {
        echo $_GET['callback'] . "(" . $json . ");";
    } else {
        echo $json;
    }
}
