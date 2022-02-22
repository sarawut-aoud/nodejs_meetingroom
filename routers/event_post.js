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

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();

router.post("/adddata", async (req, res) => {
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

  var st_id = req.body.st_id; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_id; // id_rooms
  var sunnum = req.body.sunnum;
  var to_id = req.body.to_id;
  //   var date1 = Date.parse(ev_startdate);
  //   const date_1 = new Date(date1);
  //   var date_start = date_1
  //     .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
  //     .slice(0, 10);
  //   var date2 = Date.parse(ev_enddate);
  //   const date_2 = new Date(date2);
  //   var date_end = date_2
  //     .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
  //     .slice(0, 10);

  //   let dateDiff = DATE_DIFF(ev_startdate, ev_enddate," Months");
  //   console.log(dateDiff);
  //   var chk = 0;
  //    var num = dateDiff.substring(1);
  //   var sing = dateDiff.substring(0,1);

  if (level == "1") {
    con.query(
      "select max(event_id) as maxid from tbl_event",
      (error, results, field) => {
        if (error) throw error;

        for (ix = 0; ix < results.length; ix++) {
          const d = new Date();
          var month = moment(d).format("MM");

          var year = d.getFullYear() + 543;
          // var y = year.substring(0);

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
          }
          // console.log(event_id.substring(2));
          if (event_id != "") {
            dateStart = ev_startdate;

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
                // for (var x = 1; x <= sunnum; x++) {
                //   var ed = (to_id + x);
                //   if (ed != "") {
                //     con.query(
                //       "INSERT INTO acces(ev_id,eq_id) VALUES(?,?) ",
                //       [results.ev_id, ed],
                //       (error, results, field) => {
                //         if (error) throw error;
                //         return res.json({
                //           status: "200",
                //           message: "บันทึกข้อมูลสำเร็จ",
                //         });
                //       }
                //     );
                //   }
                // } // ส่วนของ CheckBox
              }
            );
          }
        }
      }
    );
  } /// insert
  // var dateStart = ev_startdate;
  // for (var i = 0; i <= num; i++) {
  //   con.query(
  //     "SELECT IF (ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, " +
  //       "IF (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime " +
  //       "FROM tbl_event where ev_startdate = ? and ro_id = ? and ev_status = '3'",
  //     [dateStart, ro_id],
  //     (error, results, field) => {
  //       if (error) throw error;
  //       for (var x = 0; x < results.length; x++) {
  //         var timestart = ev_starttime;
  //         var timeend = ev_endtime;

  //         if (timestart != "" && timeend != "") {
  //           if (ev_starttime >= timestart && ev_starttime <= timeend) {
  //             chk++;
  //           } else if (
  //             ev_starttime <= timestart &&
  //             ev_starttime <= timestart &&
  //             ev_endtime >= timeend
  //           ) {
  //             chk++;
  //           } else if (
  //             ev_starttime <= timestart &&
  //             ev_endtime >= timestart &&
  //             ev_endtime <= timeend
  //           ) {
  //             chk++;
  //           } else {
  //             if (ev_starttime == timestart) {
  //               chk++;
  //             }
  //           }
  //         }
  //       }
  //       var theDate1 = Date.parse(dateStart) + 3600 * 1000 * 24;

  //       const date = new Date(theDate1);

  //       var dateStart = date
  //         .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
  //         .slice(0, 10);

  //       if (chk > 0) {
  //         return res.json({
  //           status: "0",
  //           message: "เกิดข้อผิดพลาด",
  //         });
  //       } else {

  //     }
  //   );
  // }
  else {
    return res.json({
      status: "0",
      message: "เกิดข้อผิดพลาด",
    });
  }
  //   con.query(
  //       "SELECT DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ,"+
  //       "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate , "+
  //       "DATEDIFF (day,ev_startdate,ev_enddate) as datediff",
  //       (error,results,fields)=>{
  //           if(error) throw error;

  //            if(level == '1'||level=='2'){

  //            }
  //       }
  //   )
});

router.get("/next", async (req, res,next) =>{
    // var id = 'test'
    req.Id = 'test'
    return next()
})
router.get("/next", async (req, res) =>{
    // var id = 'test'
   console.log(req.Id)
   
})
module.exports = router;
