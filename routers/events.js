const express = require("express");
const path = require("path");
const strtotime = require("nodestrtotime");
const app = express();
const bodyParser = require("body-parser");

const cors = require("cors");
const con = require("../config/config");
const { text } = require("body-parser");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();

//?  SELECT Data
router.post("/", async (req, res) => {
  var id = req.body.id;
  // console.log(id);
  if (id) {
    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user AS users ON (ev.id = users.id) WHERE users.id = ? GROUP BY ev.event_id",
      [id],

      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        if (results.length > 0) {
          // console.log(results);
          return res.json(results);
        }
      }
    );
  } else {
    return res.json({
      status: "0",
      message: "error",
    });
  }
});
//? SELECT Today
router.get("/today", async (req, res) => {
  con.query(
    "SELECT ev.ev_title,  ev.ev_starttime,ev.ev_endtime , ro.ro_color, " +
      "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate " +
      "FROM tbl_event as ev " +
      "INNER JOIN tbl_rooms AS ro ON (ev.ro_id =ro.ro_id)   " +
      "WHERE ev.ev_status = '3' " +
      "GROUP BY ev.event_id ORDER BY ev.ev_starttime",
    (error, results, fields) => {
      if (error) throw error;
      res.json(results);
    }
  );
});
//? SELECT all
router.get("/", async (req, res) => {
  con.query(
    "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
      "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
      "FROM tbl_event AS ev " +
      "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN tbl_user AS users ON (ev.id = users.id)  GROUP BY ev.event_id",
    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      res.json(results);
    }
  );
});
//? SELECT Request
router.get("/request", async (req, res) => {
  con.query(
    "SELECT ev.ev_id, ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people, ev.ev_createdate, " +
      "ro.ro_id, ro.ro_name,  " +
      "st.st_id, st.st_name," +
      "users.id, users.firstname,users.lastname, users.position," +
      "dept.de_id, dept.de_name, dept.de_phone " +
      "FROM tbl_event AS ev " +
      " " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  tbl_user AS users ON (ev.id = users.id)" +
      "INNER JOIN  tbl_department AS dept ON (users.de_id = dept.de_id) ",

    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      res.json(results);
    }
  );
});
//?  SELECT Request Tool
router.get("/requesttool", async (req, res) => {
  // let id = req.body.ev_id;
  // console.log(id)
  con.query(
    " SELECT * FROM tbl_tools AS tools INNER JOIN tbl_acces AS acc ON (acc.to_id=tools.to_id) ",
    (error, results, fields) => {
      if (error) throw error;

      // console.log(results);
      res.json(results);
    }
  );
});
//? SELECT COUNT
router.get("/COUNT", async (req, res) => {
  con.query(
    "SELECT COUNT(ev.ev_status) AS bage, ev.ev_id, ev.ev_title, ev.ev_startdate, ev.ev_status, ev.ev_enddate," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_people, ev.ev_createdate, " +
      "ro.ro_id, ro.ro_name, users.id  " +
      "FROM tbl_event  AS ev" +
      " " +
      " INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN tbl_user AS users ON (ev.id = users.id) " +
      "WHERE ev.ev_status = '1' GROUP BY ev.ev_title",
    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      res.json(results);
    }
  );
});
//? SELECT calendar
router.post("/calendar", async (req, res) => {
  let id = req.body.id;
  if (!id) {
    return res.json({
      status: "0",
      message: "เกิดข้อผิดพลาด",
    });
  } else {
    con.query(
      "SELECT ev.ev_id, ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate," +
        "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people, ev.ev_createdate, " +
        "ev.ev_bgcolor,ev.ev_color, ev.ev_repeatday," +
        "ro.ro_id, ro.ro_name, ro.ro_color," +
        "st.st_id, st.st_name," +
        "users.id, users.firstname,users.lastname, users.position," +
        "dept.de_id, dept.de_name, dept.de_phone " +
        "FROM tbl_event AS ev " +
        " " +
        "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
        "INNER JOIN  tbl_user AS users ON (ev.id = users.id)" +
        "INNER JOIN  tbl_department AS dept ON (users.de_id = dept.de_id) " +
        "AND ev.ev_id = ? GROUP BY ev.event_id",
      [id],
      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        return res.json(results);
      }
    );
  }
});
// select calendar
router.get("/list", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let start = query01.start;
  let end = query01.end;
  const date2 = new Date(start);
  const date1 = new Date(end);
  var start2 = date2
    .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
    .slice(0, 10);
  var end2 = date1
    .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
    .slice(0, 10);
  // let id = query01.id;
  // var start = req.body.start;

  var _start_date = "";
  var _end_date = "";
  var _start_time = "";
  var _end_time = "";
  var _repeat_day = "";
  var _all_day = "";

  const id = [];
  con.query(
    //DATE_FORMAT(o.l_day,'%Y-%m-%d') as  l_day
    //l.ls_id,CONCAT (MONTH(l.ls_days), '/', DAY(l.ls_days), '/', (YEAR(l.ls_days))) as ls_days
    "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
      "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
      "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
      // " CONCAT (YEAR( ev.ev_startdate),'-',MONTH( ev.ev_startdate), '-', (DAY( ev.ev_startdate))) as ev_startdate, ev.ev_enddate," +
      // "CONCAT (YEAR( ev.ev_starttime),'-',MONTH( ev.ev_starttime), '-', (DAY( ev.ev_starttime))) as ev_starttime," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people, ev.ev_createdate, " +
      "ev.ev_bgcolor,ev.ev_color, ev.ev_repeatday," +
      "ro.ro_id, ro.ro_name, ro.ro_color," +
      "st.st_id, st.st_name," +
      "users.id, users.firstname,users.lastname, users.position," +
      "dept.de_id, dept.de_name, dept.de_phone " +
      "FROM tbl_event AS ev " +
      " " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  tbl_user AS users ON (ev.id = users.id)" +
      "INNER JOIN  tbl_department AS dept ON (users.de_id = dept.de_id) " +
      "WHERE ev.ev_status = '3' AND   ev.ev_startdate BETWEEN  ?  AND ? "+
      "GROUP BY ev.event_id ",[start2,end2]
      ,
    (error, row, fields) => {
      if (error) throw error;

      for (var i = 0; i < row.length; i++) {
        _start_date = row[i].ev_startdate;
        _end_date = false;
        _start_time = false;
        _end_time = false;
        _repeat_day = false;
        //  _all_day = (row['ev_allday']!=0)?true:false;
        if (row[i].ev_starttime != "00:00:00") {
          _start_date = row[i].ev_startdate + "T" + row[i].ev_starttime;
          if (
            row[i].ev_endtime != "00:00:00" &&
            (row[i].ev_starttime == row[i].ev_enddate ||
              row[i].ev_enddate == "0000-00-00")
          ) {
            _end_date = row[i].ev_startdate + "T" + row[i].ev_endtime;
          }
        }
        if (row[i].ev_enddate != "0000-00-00") {
          _end_date = row[i].ev_enddate;
          if (row[i].ev_endtime != "00:00:00") {
            _end_date = row[i].ev_enddate + "T" + row[i].ev_endtime;
          } else {
            var theDate1 = Date.parse(row[i].ev_enddate) + 3600 * 1000 * 24;
            const date = new Date(theDate1);
            var _end_date = date
              .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
              .slice(0, 10);
          }
        }
        if (
          row[i].ev_enddate != "0000-00-00" &&
          row[i].ev_enddate != row[i].ev_startdate &&
          row[i].ev_starttime != "00:00:00" &&
          row[i].ev_endtime != "00:00:00"
        ) {
          (_start_date = row[i].ev_startdate),
            (_end_date = row[i].ev_enddate),
            (_start_time = row[i].ev_starttime),
            (_end_time = row[i].ev_endtime),
            (_all_day = false);
        }

        if (row[i].ev_repeatday != "") {
          var daysOfWeek = explode(",", row[i].ev_repeatday);
        }
        if (
          row[i].ev_enddate != "0000-00-00" &&
          row[i].ev_enddate != row[i].ev_startdate &&
          row[i].ev_starttime != "00:00:00" &&
          row[i].ev_endtime != "00:00:00"
        ) {
          var startRecur = _start_date;
          // var edate = new Date();

          var theDate1 = Date.parse(row[i].ev_enddate) + 3600 * 1000 * 24;

          const date = new Date(theDate1);

          var endRecur = date
            .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
            .slice(0, 10);
          //  console.log(date.toISOString('EN-AU', { timeZone: 'Australia/Melbourne'}).slice(0, 10))
          // leave_day : results[i].leave_day01.toISOString('EN-AU', { timeZone: 'Australia/Melbourne'}).slice(0, 10) ,
          // แปลงเวลาที่รับมาเป็นเวลาไทย โดยการ +7
          //leave_day : results[i].leave_day01.toLocaleDateString('en-CA', { timeZone: 'Australia/Melbourne'}),
        }

        // ทำการเปลี่ยน หรือกำหนดการใช้งาน url หรือลิ้งค์ เป็นการเรียกใช้งาน javascript ฟังก์ชั่นF
        row[i].ev_url = "javascript:viewdetail(" + row[i].ev_id + ");"; // ส่งค่า id ไปในฟังก์ชั่น

        var ev_startdate2 = row[i].ev_startdate.replace("-", "");
        var ev_startdate3 = ev_startdate2.replace("-", "");
        if (row[i].ev_id != undefined) {
          id[i] = {
            id: row[i].ev_id,
            groupId: ev_startdate3,
            start: _start_date,
            end: _end_date,
            // startTime: row[i].ev_starttime,
            // endTime: row[i].ev_endtime,
            title: row[i].ev_title,
            url: row[i].ev_url,
            textColor: row[i].ev_color,
            backgroundColor: row[i].ro_color,
            borderColor: row[i].ev_bgcolor,
            daysOfWeek: daysOfWeek,
            startRecur: startRecur,
            endRecur: endRecur,
          };
        }
      }
      req.id = id;

      res.json(id);
      // return next();
    }
  );
});

// SELECT status
router.post("/status", async (req, res) => {
  var level = req.body.level;
  if (level == "1" || level == "4") {
    // admin /  manage

    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user AS users ON (ev.id = users.id) WHERE ev.ev_status = '1' GROUP BY ev.event_id",
      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        res.json(results);
      }
    );
  } else if (level == "3") {
    // STAFF
    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user AS users ON (ev.id = users.id) WHERE ev.ev_status = '0' GROUP BY ev.event_id",
      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        res.json(results);
      }
    );
  } else {
    return res.json({
      status: "0",
      message: "เกิดข้อผิดพลาด",
    });
  }
});


//? Insert Data
// sql.post("/", async (req, res,next) => {

//   req.currentUser = 'user';

//   next();
// });
router.post("/", async (req, res) => {
  // console.log(req.currentUser);
  var level = req.body.level; // ระดับสิทธิการเข้าถึง
  var ev_title = req.body.ev_title; //todo : req -> Form .... data -> body
  var ev_startdate = req.body.ev_startdate;
  var ev_enddate = req.body.ev_enddate;
  var ev_starttime = req.body.ev_starttime;
  var ev_endtime = req.body.ev_endtime;
  var ev_people = req.body.ev_people;
  var ev_status = req.body.ev_status;
   //เริ่มการจอง status == 0==รออนุมัติจากหัวหน้า  , 1 -> รออนุมัติ , 2== ไม่อนุมัติจากหัวหน้า ,3 == อนุมัติ ,4==ไม่อนุมัติ,5==ยกเลิก
  var ev_id;
  var st_id = req.body.st_id; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_id; // id_rooms
 
  
  let num = date_diff;
  let sing = date_diff;

  if (level == "1" || level == "4") {
    //todo : ADMIN || หัวหน้างาน/แผนก
    if (num >= 0 && sing == "+") {
      dateStart = ev_startdate;
      console.log("1150");
      for (i = 0; i <= num; i++) {
        con.query(
          "SELECT IF ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, " +
            "IF (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime  " +
            "FROM tbl_event WHERE ev_startdate = ? AND ro_id = ? AND ev_status = '3' ",
          [dateStart, ro_id],
          (error, results, fields) => {
            if (error) throw error;
            // return res.send({
            //   error: false,
            //   status: "0",
            //   message: "บันทึกข้อมูลแล้ว",
            // });
            for (var rs = 0; rs < results.length; rs++) {
              console.log("1");
              var timestart = results.ev_starttime;
              var timeend = results.ev_endtime;
              console.log(timestart, timeend);

              if (timestart != "" && timeend != "") {
                if (ev_starttime >= timestart && ev_starttime <= timeend) {
                  console.log("a");
                  chk++;
                } else if (
                  ev_starttime <= timestart &&
                  ev_starttime <= timestart &&
                  ev_endtime >= timeend
                ) {
                  console.log("b");
                  chk++;
                } else if (
                  ev_starttime <= timestart &&
                  ev_endtime >= timestart &&
                  ev_endtime <= timeend
                ) {
                  console.log("c");
                  chk++;
                } else {
                  if (ev_starttime == timestart) {
                    chk++;
                  }
                }
              }
              dateStart = date(
                "Y-m-d",
                strtotime("+1 day", strtotime(dateStart))
              );
            }
          } // error / result /firelds
        ); // con.query
      }
    }
    if (chk > 0) {
      return res
        .status(400)
        .send({ error: true, status: "0", message: "ไม่สามารถจองห้องได้" });
    } else {
      console.log("max");
      con.query(
        "SELECT MAX(event_id) as maxid FROM tbl_event",
        (error, results, fields) => {
          if (error) throw error;

          for (i in results) {
            var data = results.maxid;
          }
          var month = date("m");
          var year = substr(date("Y") + 543, 2, 2);
          var news = data;

          if (news == "") {
            news = news + 1;
            var event_id = year + month + "0000" + news;
          } else {
            var id_new = substr(news, 0, 4);

            if (id_new == year + month) {
              news = news + 1;
              news = substr(news, 4, 5);
              vent_id = year + month + news;
            } else {
              event_id = year + month + "00001";
            }
          }

          if (num >= 0 && sing == "+") {
            dateStart = ev_startdate;
            for (var i = 0; i <= num; i++) {
              con.query(
                "INSERT INTO tbl_event(ev_title,ev_people,ro_id,st_id,id,ev_startdate,ev_enddate,ev_starttime,ev_endtime,ev_status,event_id)" +
                  "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                [
                  ev_title,
                  ev_people,
                  ro_id,
                  st_id,
                  id,
                  dateStart,
                  ev_enddate,
                  ev_starttime,
                  ev_endtime,
                  "3",
                  event_id,
                ],
                (error, results, fields) => {
                  if (error) throw error;

                  return res.send({
                    error: false,
                    status: "0",
                    message: "บันทึกข้อมูลแล้ว",
                  });
                }
              );
            }
          }
          // return res.send({
          //   error: false,
          //   status: "0",
          //   message: "บันทึกข้อมูลแล้ว",
          // });
        }
      );
    }
  } else if (level == 2) {
  } else if (level == 3) {
  } else {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  }

  // //? validation
  // if (!ev_title || !ac_pubilc || !typeac_id) {
  //   return res
  //     .status(400)
  //     .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  // } else {
  //   con.query(
  //     "INSERT INTO hr_academic (ac_name, ac_pubilc,typeac_id) VALUES(?, ?, ?)",
  //     [ac_name, ac_pubilc, typeac_id],
  //     (error, results, fields) => {
  //       if (error) throw error;
  //       return res.send({
  //         error: false,
  //         status: "0",
  //         message: "บันทึกข้อมูลแล้ว",
  //       });
  //     }
  //   );
  // }
});

// //? Update Data
// sql.put("/", async (req, res) => {
//   let ac_name = req.body.ac_name;
//   let ac_pubilc = req.body.ac_pubilc;
//   let typeac_id = req.body.typeac_id;
//   let ac_id = req.body.ac_id;
//   // validation

//   if (!ac_name || !ac_pubilc || !typeac_id) {
//     return res
//       .status(400)
//       .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
//   } else {
//     con.query(
//       "UPDATE hr_academic SET ac_name = ?, ac_pubilc = ? , typeac_id = ? WHERE ac_id = ?",
//       [ac_name, ac_pubilc, typeac_id, ac_id],
//       (error, results, fields) => {
//         if (error) throw error;
//         return res.send({
//           error: false,
//           status: "0",
//           message: "แก้ไขข้อมูลแล้ว",
//         });
//       }
//     );
//   }
// });

// //? delete data
router.delete("/", async (req, res) => {
  let ev_id = req.body.ev_id;
  let event_id = req.body.event_id;

  if (!ev_id || !event_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถลบข้อมูลได้" });
  } else if (event_id) {
    con.query(
      "DELETE FROM tbl_event WHERE event_id = ? ",
      [event_id],
      (error, results, fields) => {
        if (error) throw error;
        con.query(
          "DELETE FROM tbl_acces WHERE ev_id = ? ",
          [ev_id],
          (error, results, fields) => {
            if (error) throw error;
          }
        );
        return res.send({
          error: false,
          status: "0",
          message: "ลบข้อมูลแล้ว",
        });
      }
    );
  }
});

module.exports = router;
