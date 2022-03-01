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
//? update event
router.put("/updatedata", async (req, res) => {
  var level = req.body.level; // ระดับสิทธิการเข้าถึง
  var ev_status = req.body.evstatus; // ระดับสิทธิการเข้าถึง

  //   var statusRoom;
  //   //เริ่มการจอง status == 0==รออนุมัติจากหัวหน้า  , 1 -> รออนุมัติ , 2== ไม่อนุมัติจากหัวหน้า ,3 == อนุมัติ ,4==ไม่อนุมัติ,5==ยกเลิก
  //   if (level == "1" || level == "4") {
  //     ev_status;
  //   } else if (level == "3") {
  //     // ธุรการ
  //     ev_status;
  //   } else if (level == "2") {
  //     // ผู้ใช้
  //     statusRoom = "1";
  //   }
  var event_id = req.body.eventid;

  var ev_title = req.body.title; //todo : req -> Form .... data -> body
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var to_id = req.body.to_id;
  var st_id = req.body.style; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_name; // id_rooms
  var chk = 0;
  var date_diff = DATE_DIFF(ev_startdate, ev_enddate, "D").output;

  if (!event_id || !ro_id || !st_id) {
    return res.json({
      status: "0",
      message: "ไม่สามารถแก้ไขรายการจองห้องได้",
    });
  } else {
    con.query(
      "SELECT ev_id FROM tbl_event WHERE event_id = ? ",
      [event_id],
      (error, results_evid, field) => {
        if (error) throw error;

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

                  if (timestart != "" && timeend != "") {
                    if (ev_starttime >= timestart && ev_starttime <= timeend) {
                      // console.log("a");
                      chk++;
                    } else if (
                      ev_starttime <= timestart &&
                      ev_starttime <= timestart &&
                      ev_endtime >= timeend
                    ) {
                      chk++;
                    } else if (
                      ev_starttime <= timestart &&
                      ev_endtime >= timestart &&
                      ev_endtime <= timeend
                    ) {
                      chk++;
                    } else {
                      if (ev_starttime == timestart) {
                        chk++;
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
          } // for i
        } // if datediff

        if (chk > 0) {
          return res.json({
            status: "0",
            message: "ไม่สามารถจองห้องได้",
          });
        } else {
          console.log('1')
          if (date_diff >= 0) {
            console.log('2')
            if (results_evid.length > 0) {
              console.log('3')
              con.query(
                "DELETE FROM tbl_event WHERE event_id = ? ",
                [event_id],
                (error, results_del, field) => {
                  if (error) throw error;
                  con.query(
                    "ALTER TABLE tbl_event AUTO_INCREMENT = 1 ",
                    (error, results_alter, field) => {
                      if (error) throw error;
                      console.log('4')
                      for (var ii = 0; ii <= date_diff; ii++) {
                        var dateStart = ev_startdate;

                        var theDateend =
                          Date.parse(ev_enddate) + 3600 * 1000 * 24;
                        const date2 = new Date(theDateend);

                        var dateEnd = date2
                          .toISOString("th-TH", { timeZone: "UTC" })
                          .slice(0, 10);
                          console.log('5')
                        for ($d = 0; $d <= date_diff; $d++) {
                          var theDateStart =
                            Date.parse(dateStart) + 3600 * 1000 * 24;
                          const date = new Date(theDateStart);
                          dateStart = date
                            .toISOString("EN-AU", {
                              timeZone: "Australia/Melbourne",
                            })
                            .slice(0, 10);

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
                              dateEnd,
                              ev_starttime,
                              ev_endtime,
                              ev_status,
                              event_id,
                            ],
                            (error, results, field) => {
                              if (error) throw error;
                              console.log('6')
                              //   if (to_id != undefined) {
                              con.query(
                                "DELETE FROM tbl_acces WHERE ev_id = ?  ",
                                [results.insertId],
                                (error, results_delacc, field) => {
                                  if (error) throw error;
                                  if (to_id != undefined) {
                                    for (var x = 0; x <= to_id.length; x++) {
                                      var toid = to_id[x];
                                      if (toid != undefined) {
                                        con.query(
                                          "INSERT INTO tbl_acces(ev_id,to_id) VALUES(?,?) ",
                                          [results.insertId, toid],
                                          (error, results, field) => {
                                            if (error) throw error;
                                          }
                                        );
                                      }
                                    }
                                  } //todo : INSERT tbl_acces
                                }
                              );
                              //   }
                            }
                          );
                        } // for dd
                      } // for ii
                    }
                  ); // atler table
                }
              );
            } //results_evid.length>0
          } //date_diff >= 0
          return res.json({
            status: "200",
            message: "บันทึกข้อมูลสำเร็จ",
          });
        }
      }
    );
  }
});

module.exports = router;
