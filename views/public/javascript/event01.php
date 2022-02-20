<?php



// $sql ="SELECT * from event 
// inner join rooms on event.ro_id = rooms.ro_id
// inner join style on event.st_id = style.st_id
// inner join member on event.id = member.id
// inner join department on member.de_id = department.de_id where event.ev_status = '3' GROUP by event_id";

// $result = $mysqli->query($sql);
// if(isset($result) && $result->num_rows>0){
//     while($row = $result->fetch_assoc()){
//         $_start_date = $row['ev_startdate'];
//         $_end_date = false;
//         $_start_time = false;
//         $_end_time = false;
//         $_repeat_day = false;
//          $_all_day = ($row['ev_allday']!=0)?true:false;
//         if($row['ev_starttime']!="00:00:00"){
//             $_start_date = $row['ev_startdate']."T".$row['ev_starttime'];
//             if($row['ev_endtime']!="00:00:00" && ($row['ev_starttime']==$row['ev_enddate'] || 
//                 $row['ev_enddate']=="0000-00-00") ){
//                 $_end_date = $row['ev_startdate']."T".$row['ev_endtime'];
//         }
//     }
//     if($row['ev_enddate']!="0000-00-00"){
//         $_end_date = $row['ev_enddate'];
//         if($row['ev_endtime']!="00:00:00"){
//             $_end_date = $row['ev_enddate']."T".$row['ev_endtime'];
//         }else{
//             $_end_date = date("Y-m-d",strtotime($row['ev_enddate']." +1 day"));
//         }
//     }
//     if($row['ev_enddate']!="0000-00-00" && $row['ev_enddate']!=$row['ev_startdate'] 
//         && $row['ev_starttime']!="00:00:00" && $row['ev_endtime']!="00:00:00" ){
//         $_start_date = $row['ev_startdate'];
//     $_end_date = $row['ev_enddate'];             
//     $_start_time = $row['ev_starttime'];
//     $_end_time = $row['ev_endtime'];     
//     $_all_day = false;          
// }
//         // ทำการเปลี่ยน หรือกำหนดการใช้งาน url หรือลิ้งค์ เป็นการเรียกใช้งาน javascript ฟังก์ชั่น
//         $row['ev_url'] = "javascript:viewdetail('{$row['ev_id']}');"; // ส่งค่า id ไปในฟังก์ชั่น
//         $arr_eventData = array(
//             "id" => $row['ev_id'],
//             "groupId" => str_replace("-","",$row['ev_startdate']),
//             "allDay" => $_all_day,
//             "start" => $_start_date,
//             "end" => $_end_date,
//             "startTime" => $_start_time,
//             "endTime" => $_end_time,
//             "title" =>  $row['ev_title'],
//             "url" => $row['ev_url'],
//             "textColor" => $row['ev_color'],
//             "backgroundColor" => $row['ro_color'],
//             "borderColor" => $row['ev_bgcolor'],


//         );
//         if($row['ev_repeatday']!=""){
//             $arr_eventData['daysOfWeek'] = explode(",",$row['ev_repeatday']);
//         }               
//         if($row['ev_enddate']!="0000-00-00" && $row['ev_enddate']!=$row['ev_startdate'] 
//             && $row['ev_starttime']!="00:00:00" && $row['ev_endtime']!="00:00:00" ){
//             $arr_eventData['startRecur'] = $_start_date;
//         $_end_date = date("Y-m-d",strtotime($row['ev_enddate']." +1 day"));
//         $arr_eventData['endRecur'] = $_end_date;
//     }
//     if(!$_all_day){unset($arr_eventData['allDay']);}
//     if(!$_end_date){unset($arr_eventData['end']);}
//     if(!$_start_time){unset($arr_eventData['startTime']);}
//     if(!$_end_time){unset($arr_eventData['endTime']);}
//     $json_data[] = $arr_eventData;
// }
// }
// // แปลง array เป็นรูปแบบ json string  
// if(isset($json_data)){  
//     $json= json_encode($json_data);    
//     if(isset($_GET['callback']) && $_GET['callback']!=""){    
//         echo $_GET['callback']."(".$json.");";        
//     }else{    
//         echo $json;    
//     }    
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    $data = file_get_contents('http://127.0.0.1:4500/event/calendar');


    if (isset($_GET['resource'])) {
        echo $events = json_decode($data);
    }

    ?>

</body>

</html>