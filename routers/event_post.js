const express = require("express");
const path = require("path");
const strtotime = require("nodestrtotime");
const app = express();

const DATE_DIFF = require("date-diff-js");
const bodyParser = require("body-parser");
const moment = require("moment");
const cors = require("cors");
const con = require("../config/config");
const { text } = require("body-parser");
const { parse } = require("path");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();
// router.post("/adddata", async (req, res, next) => {
//   var ev_startdate = req.body.dateStart;
//   var ev_enddate = req.body.dateEnd;
//   var ro_id = req.body.ro_name;
//   var ev_starttime = req.body.timeStart;
//   var ev_endtime = req.body.timeEnd;

//   var chk = 0;
//   var date_diff = DATE_DIFF(ev_startdate, ev_enddate, "D").output;
//   if (date_diff >= 0) {
//     var dateStart = ev_enddate;
//     for (var i = 0; i <= date_diff; i++) {
//       con.query(
//         "SELECT IF (ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, " +
//           "IF (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime " +
//           "FROM tbl_event where ev_startdate = ? and ro_id = ? and ev_status = '3'",
//         [dateStart, ro_id],
//         (error, results, field) => {
//           if (error) throw error;
//           for (var x = 0; x < results.length; x++) {
//             var timestart = ev_starttime;
//             var timeend = ev_endtime;
//             console.log(timestart, timeend);
//             if (timestart != "" && timeend != "") {
//               if (ev_starttime >= timestart && ev_starttime <= timeend) {
//                 chk++;
//               } else if (
//                 ev_starttime <= timestart &&
//                 ev_starttime <= timestart &&
//                 ev_endtime >= timeend
//               ) {
//                 chk++;
//               } else if (
//                 ev_starttime <= timestart &&
//                 ev_endtime >= timestart &&
//                 ev_endtime <= timeend
//               ) {
//                 chk++;
//               } else {
//                 if (ev_starttime == timestart) {
//                   chk++;
//                 }
//               }
//             }
//           } //for x
//           var theDate1 = Date.parse(dateStart) + 3600 * 1000 * 24;

//           const date = new Date(theDate1);

//           var dateStart = date
//             .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
//             .slice(0, 10);
//         }
//       );
//     } //for i
//   }
//   req.chk = chk;
//   // req.dateStart = dateStart;
//   req.date_diff = date_diff;
//   return next();
// });
router.post("/adddata", async (req, res) => {
  // chk = req.chk;
  // diff = req.date_diff;

  var level = req.body.level; // ระดับสิทธิการเข้าถึง
  var ev_title = req.body.title; //todo : req -> Form .... data -> body
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var ev_status = req.body.ev_status;
  //เริ่มการจอง status == 0==รออนุมัติจากหัวหน้า  , 1 -> รออนุมัติ , 2== ไม่อนุมัติจากหัวหน้า ,3 == อนุมัติ ,4==ไม่อนุมัติ,5==ยกเลิก

  var st_id = req.body.style; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_name; // id_rooms
  var chk = 0;
  var date_diff = DATE_DIFF(ev_startdate, ev_enddate, "D").output;
  console.log(chk, date_diff);
  if (date_diff >= 0) {
    var dateStart = ev_startdate;
    for (var i = 0; i <= date_diff; i++) {
      con.query(
        "SELECT IF (ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, " +
          "IF (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime " +
          "FROM tbl_event where ev_startdate = ? and ro_id = ?  and ev_status = '3'",
        [dateStart, ro_id],
        (error, results, field) => {
          if (error) throw error;
          for (var x = 0; x < results.length; x++) {
            var timestart = results[x].ev_starttime;
            var timeend = results[x].ev_endtime;
            console.log(timestart, timeend);
            if (timestart != "" && timeend != "") {
              if (ev_starttime >= timestart && ev_starttime <= timeend) {
                console.log("a");

                return chk++;
              } else if (
                ev_starttime <= timestart &&
                ev_starttime <= timestart &&
                ev_endtime >= timeend
              ) {
                console.log("b");

                return chk++;
              } else if (
                ev_starttime <= timestart &&
                ev_endtime >= timestart &&
                ev_endtime <= timeend
              ) {
                console.log("c");

                return chk++;
              } else {
                if (ev_starttime == timestart) {
                  console.log("d");

                  return chk++;
                }
              }
            }
          } //for x
          var theDate1 = Date.parse(dateStart) + 3600 * 1000 * 24;

          const date = new Date(theDate1);

          dateStart = date
            .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
            .slice(0, 10);
        }
      );
    } //for i
  }
  if (chk > 0) {
    return res.json({
      status: "0",
      message: "ไม่สามารถจองห้องได้",
    });
  } else {
    if (level == "1" || level == "4") {
      console.log("level", chk);

      con.query(
        "select max(event_id) as maxid from tbl_event",
        (error, results, field) => {
          if (error) throw error;
          console.log("event");
          //todo : Create Event_id
          for (ix = 0; ix < results.length; ix++) {
            const d = new Date();
            var month = moment(d).format("MM");
            var year = d.getFullYear() + 543;
            var newdate = results[ix].maxid;

            if (newdate == "") {
              newdate = newdate + 1;
              var event_id = year + month + "0000" + newdate;
            } else {
              var id_new = newdate.substring(0, 4);
              if (id_new == year + month) {
                newdate = newdate + 1;
                newdate = newdate.substring(4, 5);
                event_id = year + month + newdate;
              } else {
                event_id = year + month + "00001";
              }
            } //todo : Create Event_id

            if (
              !ev_title ||
              !ev_people ||
              !ro_id ||
              !st_id ||
              !id ||
              !ev_startdate ||
              !ev_enddate ||
              !ev_starttime ||
              !ev_endtime
            ) {
              return res.json({
                  error: true,
                  status: "0",
                  message: "ไม่สามารถบันทึกได้",
              })
               
            } else if (date_diff >= 0) {
              console.log(ev_enddate);
              
              var dateStart = ev_startdate;

              for ($d = 0; $d <= date_diff; $d++) {
                //todo : INSERT data
                con.query(
                  "INSERT INTO tbl_event(ev_title,ev_people,ro_id,st_id,id,ev_startdate,ev_enddate,ev_starttime,ev_endtime,ev_status,event_id)" +
                    "VALUES(?,?,?,?,?,?,?,?,?,?,?)",
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
                    event_id.substring(2),
                  ],
                  (error, results, field) => {
                    if (error) throw error;
                    return res.json({
                      status: "200",
                      message: "บันทึกข้อมูลสำเร็จ",
                    });
                    // if (to_id == "") {

                    // }
                    // else {

                    //   for (var x = 1; x <= sunnum; x++) {
                    //     var ed = to_id[x];
                    //     if (ed != "") {
                    //       con.query(
                    //         "INSERT INTO acces(ev_id,to_id) VALUES(?,?) ",
                    //         [results.ev_id, ed],
                    //         (error, results, field) => {
                    //           if (error) throw error;
                    //         }
                    //       );
                    //     }
                    //     return res.json({
                    //       status: "200",
                    //       message: "บันทึกข้อมูลสำเร็จ",
                    //     });
                    //   }
                    // } //todo : INSERT tbl_acces
                  }
                );
                //todo : INSERT tbl_event
                var theDate1 = Date.parse(dateStart) + 3600 * 1000 * 24;

                const date = new Date(theDate1);

                dateStart = date
                  .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
                  .slice(0, 10);
              } // for i
            } // todo : ckeck diff
          }
        }
      );
    } else {
      return res.json({
        status: "0",
        message: "เกิดข้อผิดพลาด",
      });
    } // No level
  }
});
router.post("/text", async (req, res, next) => {
  id = "1";
  req.level = id;
  return next();
});
router.post("/text", async (req, res) => {
  id = req.level;
  console.log(id);
});
module.exports = router;
