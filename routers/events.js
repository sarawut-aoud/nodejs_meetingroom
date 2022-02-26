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
      "ro.ro_id, ro.ro_name, " +
      "st.st_id, st.st_name," +
      "users.id, users.firstname,users.lastname, users.position," +
      "dept.de_id, dept.de_name, dept.de_phone " +
      "FROM tbl_event AS ev " +
      " " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  tbl_user AS users ON (ev.id = users.id)" +
      "INNER JOIN  tbl_department AS dept ON (users.de_id = dept.de_id) ;",
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
//? SELECT COUNT user
router.get("/COUNT/user", async (req, res) => {
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
//? SELECT COUNT user
router.get("/count/staff", async (req, res,next) => {
  var query01 = require("url").parse(req.url, true).query;
  let de_id = query01.de_id;
  let id = query01.id;
  // const arr = {};
  var arr = {};
  con.query(
    "SELECT ev.ev_status ,ev.ev_id " +
      " FROM tbl_acces AS acc " +
      " INNER JOIN tbl_event  AS ev ON (ev.ev_id = acc.ev_id)" +
      " INNER JOIN tbl_user AS users ON (users.id = ev.id) " +
      " INNER JOIN tbl_department AS dept ON (users.de_id = dept.de_id) " +
      " INNER JOIN tbl_rooms AS ro ON (ro.ro_id = ev.ro_id) " +
      " INNER JOIN tbl_tools AS tool ON (tool.to_id = acc.to_id) " +
      "WHERE ev.ev_status = '3' AND tool.de_id = ? AND tool.to_id = acc.to_id " +
      "GROUP BY ev.ev_title",
    [de_id],
    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      if (results.length > 0) {
        for (var i = 0; i < results.length; i++) {
          var ev_id = results[i].ev_id;
          var ev_status = results[i].ev_status;
          if (ev_id && id) {
            con.query(
              "SELECT dv_id FROM tbl_setdevice WHERE ev_id = ? AND id = ? AND dv_status = ? ",
              [ev_id, id, ev_status],
              (error, results_set, fields) => {
                if (error) throw error;
                for (var x = 0; x < results_set.length; x++) {
                  if (results_set.length > 0) {
                    var q1 = results.length - results_set.length;
                  }
                  
                }
                arr = {
                  ev_status: q1,
                };
                req.arr =arr
                return next();
               
                //  console.log(arr)
              }
            );
          } // ev_id && id
          // res.json(arr);
        } // for i
       
      } //results.lenght > 0
  
    }
  );
});
router.get("/count/staff",async (req,res)=>{
  res.json(req.arr);
})
//? SELECT calendar
router.post("/calendar", async (req, res) => {
  let id = req.body.id;
  // if (show != "show") {
  //   return res.json({
  //     status: "0",
  //     message: "เกิดข้อผิดพลาด",
  //   });
  // } else {
  con.query(
    "SELECT ev.ev_id, ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_people, ev.ev_createdate, " +
      " ro.ro_name, ro.ro_color," +
      "st.st_name," +
      "users.firstname,users.lastname, users.position," +
      "dept.de_name, dept.de_phone " +
      "FROM tbl_event AS ev " +
      " " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  tbl_user AS users ON (ev.id = users.id)" +
      "INNER JOIN  tbl_department AS dept ON (users.de_id = dept.de_id) " +
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
            _end_date = date("Y-m-d", strtotime(row[i].ev_enddate + " +1 day"));
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
          var edate = new Date();

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
        if (!_all_day) {
          delete _all_day;
        }
        if (!_end_date) {
          delete end;
        }
        if (!_start_time) {
          delete _start_time;
        }
        if (!_end_time) {
          delete _end_time;
        }

        // ทำการเปลี่ยน หรือกำหนดการใช้งาน url หรือลิ้งค์ เป็นการเรียกใช้งาน javascript ฟังก์ชั่นF
        row[i].ev_url = "javascript:viewdetail(" + row[i].ev_id + ");"; // ส่งค่า id ไปในฟังก์ชั่น
        //  if (row[i].ev_id != undefined) {
        //   ow[i].row[i].ev_url
        //  }
        if (row[i].ev_id != undefined) {
          var ev_startdate2 = row[i].ev_startdate.replace("-", "");
          var ev_startdate3 = ev_startdate2.replace("-", "");

          id[i] = {
            id: row[i].ev_id,
            groupId: ev_startdate3,
            // allDay: _all_day,
            start: _start_date,
            // start: ' 2021-04-05T08:30:00',

            end: _end_date,

            startTime: _start_time,
            endTime: _end_time,
            title: row[i].ev_title,
            url: row[i].ev_url,
            textColor: row[i].ev_color,
            backgroundColor: row[i].ro_color,
            borderColor: row[i].ev_bgcolor,
            // daysOfWeek:daysOfWeek,
            startRecur: startRecur,
            endRecur: endRecur,

            // };
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
