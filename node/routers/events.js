const express = require("express");
const path = require("path");
const key = require("../function/key");

const app = express();
const bodyParser = require("body-parser");

const cors = require("cors");
const con = require("../config/config");

const dbname = require("../function/database");
const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();

//?  SELECT Data
router.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var id = query01.id;
  var ward_id = query01.ward_id;
  // console.log(id);
  if (!id && !ward_id) {
    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title," +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
        " ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate,ev_toolmore, ro.ro_id, ro.ro_name " +
        " " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "  GROUP BY ev.event_id",

      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  } else {
    if (!ward_id) {
      con.query(
        "SELECT ev.ev_id , ev.event_id, ev.ev_title, " +
          "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
          "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
          " ev.ev_status,ev.ev_starttime, " +
          "ev.ev_endtime, ev.ev_people,ev.ev_createdate,ev_toolmore ,ro.ro_id, ro.ro_name" +
          " " +
          "FROM tbl_event AS ev " +
          "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
          "WHERE ev.id = AES_ENCRYPT(?, UNHEX(SHA2(?, 512))) " +
          "GROUP BY ev.event_id",
        [id, "" + key + ""],

        (error, results, fields) => {
          if (error) throw error;
          res.json(results);
        }
      );
    } else {
      con.query(
        "SELECT ev.ev_id , ev.event_id, ev.ev_title, " +
          "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
          "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
          " ev.ev_status,ev.ev_starttime, " +
          "ev.ev_endtime, ev.ev_people,ev.ev_createdate,ev_toolmore, ro.ro_id, ro.ro_name  " +
          "FROM tbl_event AS ev " +
          "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
          " WHERE ev.ward_id = ?  GROUP BY ev.event_id",
        [ward_id],

        (error, results, fields) => {
          if (error) throw error;
          res.json(results);
        }
      );
    }
  }
});
//? SELECT Today
router.get("/today", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var today = query01.today;
  con.query(
    "SELECT ev.ev_title,  ev.ev_starttime,ev.ev_endtime , ro.ro_color, " +
      "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
      "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate " +
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

//? SELECT Request
router.get("/request", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var ev_id = query01.ev_id;
  if (!ev_id) {
    con.query(
      "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
        "DATE_FORMAT(ev.ev_createdate,'%Y-%m-%d') as  ev_createdate ," +
        "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people,ev_toolmore,  " +
        "ro.ro_id, ro.ro_name, ro.ro_people, " +
        "st.st_id, st.st_name," +
        " AES_DECRYPT(ev.id, UNHEX(SHA2(?, 512))) AS person_id, user.person_firstname As firstname, user.person_lastname as lastname, " +
        "ev.depart_id,ev.ward_id, ev.faction_id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
        "INNER JOIN " +
        pbh +
        "hr_personal AS user ON (ev.id = user.person_id)",

      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        if (results.length > 0) {
          var personid = "";
          if (!results[0].person_id) {
            personid = "";
          } else {
            personid = results[0].person_id.toString("utf8");
          }
          return res.json([
            {
              ev_id: results[0].ev_id,
              event_id: results[0].event_id,
              ev_title: results[0].ev_title,
              ev_startdate: results[0].ev_startdate,
              ev_enddate: results[0].ev_enddate,
              ev_createdate: results[0].ev_createdate,
              person_id: personid,
              ev_starttime: results[0].ev_starttime,
              ev_endtime: results[0].ev_endtime,
              ev_status: results[0].ev_status,
              ev_people: results[0].ev_people,
              ev_toolmore: results[0].ev_toolmore,
              ro_id: results[0].ro_id,
              ro_name: results[0].ro_name,
              ro_people: results[0].ro_people,
              st_id: results[0].st_id,
              st_name: results[0].st_name,
              firstname: results[0].firstname,
              lastname: results[0].lastname,
              depart_id: results[0].depart_id,
              ward_id: results[0].ward_id,
              faction_id: results[0].faction_id,
            },
          ]);
        }
      }
    );
  } else {
    con.query(
      "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
        "DATE_FORMAT(ev.ev_createdate,'%Y-%m-%d') as  ev_createdate ," +
        "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people,ev_toolmore, " +
        "ro.ro_id, ro.ro_name, ro.ro_people, " +
        "st.st_id, st.st_name," +
        " AES_DECRYPT(ev.id, UNHEX(SHA2(?, 512))) AS person_id, user.person_firstname As firstname ,user.person_lastname as lastname, " +
        "ev.depart_id,ev.ward_id, ev.faction_id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
        "INNER JOIN " +
        pbh +
        "hr_personal AS user ON (ev.id = user.person_id)" +
        "WHERE ev.ev_id = ?",
      ["" + key + "", ev_id],
      (error, results, fields) => {
        if (error) throw error;
        if (results.length > 0) {
          var personid = "";
          if (!results[0].person_id) {
            personid = "";
          } else {
            personid = results[0].person_id.toString("utf8");
          }
          return res.json([
            {
              ev_id: results[0].ev_id,
              event_id: results[0].event_id,
              ev_title: results[0].ev_title,
              ev_startdate: results[0].ev_startdate,
              ev_enddate: results[0].ev_enddate,
              ev_createdate: results[0].ev_createdate,
              person_id: personid,
              ev_starttime: results[0].ev_starttime,
              ev_endtime: results[0].ev_endtime,
              ev_status: results[0].ev_status,
              ev_people: results[0].ev_people,
              ev_toolmore: results[0].ev_toolmore,
              ro_id: results[0].ro_id,
              ro_name: results[0].ro_name,
              ro_people: results[0].ro_people,
              st_id: results[0].st_id,
              st_name: results[0].st_name,
              firstname: results[0].firstname,
              lastname: results[0].lastname,
              depart_id: results[0].depart_id,
              ward_id: results[0].ward_id,
              faction_id: results[0].faction_id,
            },
          ]);
        }
      }
    );
  }
});
//?  SELECT Request Tool
router.get("/requesttool", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var ev_id = query01.ev_id;
  con.query(
    " SELECT * FROM tbl_tools AS tools INNER JOIN tbl_acces AS acc ON (acc.to_id=tools.to_id) WHERE acc.ev_id = ? ",
    [ev_id],
    (error, results, fields) => {
      if (error) throw error;
      res.status(200);
      res.json(results);
    }
  );
});
router.get("/count/staff", async (req, res) => {
  con.query(
    "SELECT COUNT(ev.ev_id) AS bage " +
      "FROM tbl_event  AS ev " +
      "WHERE ev.ev_status IN ('0','1')  GROUP BY ev.ev_title",
    (error, results, fields) => {
      if (error) throw error;
      return res.json(results);
    }
  );
});
//? SELECT COUNT
router.get("/COUNT", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  // let de_id = query01.de_id;
  let level = query01.level;
  let ward_id = query01.ward_id;
  if (level >= "2") {
    con.query(
      "SELECT COUNT(ev.ev_id) AS bage " +
        "FROM tbl_event  AS ev " +
        "WHERE ev.ev_status = '0' GROUP BY ev.ev_title",
      (error, results, fields) => {
        if (error) throw error;
        return res.json(results);
      }
    );
  } else if (ward_id == "48") {
    con.query(
      "SELECT COUNT(ev.ev_id) AS bage, " +
        "FROM tbl_event  AS ev " +
        "WHERE ev.ev_status IN ('0','1') GROUP BY ev.ev_title",
      (error, results, fields) => {
        if (error) throw error;
        return res.json(results);
      }
    );
  }
});
//? SELECT COUNT user
router.get("/count/user", async (req, res, next) => {
  var query01 = require("url").parse(req.url, true).query;
  // let de_id = query01.de_id;
  let id = query01.id;
  var arr = {};
  con.query(
    "SELECT count(ev.ev_id) as ev_status " +
      "FROM tbl_event  AS ev " +
      "WHERE ev.id =  AES_ENCRYPT(?, UNHEX(SHA2(?, 512))) " + //? เปลี่ยน key ด้วย
      "AND  (ev.ev_status = '3' OR ev.ev_status = '4')  GROUP BY ev.ev_title",
    [id, "" + key + ""],
    (error, results, fields) => {
      if (error) throw error;
      arr = {
        ev_status: results.length,
      };
      res.json(arr);
    }
  );
});

//? SELECT calendar
router.post("/calendar", async (req, res) => {
  let id = req.body.id;

  con.query(
    "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
      "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
      "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_people, ev.ev_createdate,ev_toolmore, " +
      " ro.ro_name, ro.ro_color," +
      "st.st_name," +
      "users.person_firstname as firstname ,users.person_lastname as lastname," +
      "ev.depart_id,ev.ward_id,ev.faction_id " +
      "FROM tbl_event AS ev " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  " +
      pbh +
      "hr_personal AS users ON (ev.id = users.person_id)" +
      "WHERE ev.ev_status = '3' AND ev.ev_id = ? GROUP BY ev.event_id",
    [id],
    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      return res.json(results);
    }
  );
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
      "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
        "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people, ev.ev_createdate, " +
        "ev.ev_bgcolor,ev.ev_color, ev.ev_repeatday," +
        "ro.ro_id, ro.ro_name, ro.ro_color," +
        "st.st_id, st.st_name," +
        " users.person_firstname,users.person_lastname " +
        "FROM tbl_event AS ev " +
        "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
        "INNER JOIN  " +
        pbh +
        "hr_personal AS users ON (ev.id = users.person_id)" +
        "WHERE ev.ev_status = '3' AND   ev.ev_startdate BETWEEN  ?  AND ? " +
        "GROUP BY ev.event_id ",
      [start2, end2],
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
              var theDate2 = Date.parse(row[i].ev_enddate) + 3600 * 1000 * 24;

              const date = new Date(theDate2);

              _end_date = date
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

          if (row[i].ev_id != undefined) {
            var ev_startdate2 = row[i].ev_startdate.replace("-", "");
            var ev_startdate3 = ev_startdate2.replace("-", "");

            if (
              _end_time == false &&
              _start_time == false &&
              startRecur &&
              endRecur
            ) {
              id[i] = {
                id: row[i].ev_id,
                groupId: ev_startdate3,
                allDay: _all_day,
                start: _start_date,
                end: _end_date,
                // startTime: _start_time,
                // endTime: _end_time,
                title: row[i].ev_title,
                url: row[i].ev_url,
                textColor: row[i].ev_color,
                backgroundColor: row[i].ro_color,
                borderColor: row[i].ev_bgcolor,
                // daysOfWeek: daysOfWeek,
                // startRecur: startRecur,
                // endRecur: endRecur,
              };
            } else {
              id[i] = {
                id: row[i].ev_id,
                groupId: ev_startdate3,
                allDay: _all_day,
                start: _start_date,
                end: _end_date,
                startTime: _start_time,
                endTime: _end_time,
                title: row[i].ev_title,
                url: row[i].ev_url,
                textColor: row[i].ev_color,
                backgroundColor: row[i].ro_color,
                borderColor: row[i].ev_bgcolor,
                daysOfWeek: daysOfWeek,
                startRecur: startRecur,
                endRecur: endRecur,

                // };
              };
            }
          }
        }
        req.id = id;
        
        res.json(id);
        // return next();
      }
    );
  //function
});
router.post("/statusstaff", async (req, res) => {
  var ward_id = req.body.ward_id;
  con.query(
    "SELECT ev.ev_id , ev.event_id, ev.ev_title, " +
      "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
      "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
      " ev.ev_status,ev.ev_starttime, " +
      "ev.ev_endtime, ev.ev_people,ev.ev_createdate,ev_toolmore, ro.ro_id, ro.ro_name " +
      "FROM tbl_event AS ev " +
      "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN " +
      pbh +
      "hr_personal AS users ON (ev.id = users.person_id) WHERE ev.ev_status IN('1') GROUP BY ev.event_id",
    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      res.json(results);
    }
  );
});
// SELECT status
router.post("/status", async (req, res) => {
  var level = req.body.level;
  var ward_id = req.body.ward_id;
  if (level >= "2") {
    // admin /  manage
    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title," +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
        " ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate,ev_toolmore, ro.ro_id, ro.ro_name " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN " +
        pbh +
        "hr_personal AS users ON (ev.id = users.person_id) " +
        "WHERE ev.ev_status IN('0') GROUP BY ev.event_id",
      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        res.json(results);
      }
    );
  } else if (ward_id == "48" && level < "2") {
    // STAFF
    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title, " +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
        " ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate,ev_toolmore, ro.ro_id, ro.ro_name " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN " +
        pbh +
        "hr_personal AS users ON (ev.id = users.person_id) WHERE ev.ev_status = '1' GROUP BY ev.event_id",
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
