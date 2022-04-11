const express = require("express");
const app = express();
const key = require("../function/key");

const DATE_DIFF = require("date-diff-js");
const bodyParser = require("body-parser");
const cors = require("cors");
const con = require("../config/config");
const { text } = require("body-parser");
const { parse } = require("path");

const dbname = require("../function/database");
const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();
//? update event
router.put("/updatedata", async (req, res, next) => {
  var level = req.body.level; // ระดับสิทธิการเข้าถึง
  var ev_status = req.body.evstatus;
  var event_id = req.body.eventid;
  var ev_title = req.body.title;
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var to_id = req.body.to_id;
  var st_id = req.body.style; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_name; // id_rooms
  var toolmore = req.body.tool_request;

  var ward_id = req.body.ward_id;
  var faction_id = req.body.faction_id;
  var depart_id = req.body.depart_id;

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
          for (var i = 0; i <= date_diff; i++) {
            var dateStart = ev_startdate;
            var date_ev_startdate = new Date(dateStart);
            var dateCheck =
              date_ev_startdate.getFullYear() +
              "-" +
              (date_ev_startdate.getMonth() + 1) +
              "-" +
              date_ev_startdate.getDate();

            con.query(
              "SELECT IF (ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, " +
                "IF (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime " +
                "FROM tbl_event where ev_startdate = ? and ro_id = ?  and ev_status = '3'",
              [dateCheck, ro_id],
              (error, results, field) => {
                if (error) throw error;
                var chk = 0;
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
                if (chk > 0) {
                  req.status = 0;

                  return next();
                } else {
                  req.results_evid = results_evid;
                  req.date_diff = date_diff;
                  req.dateStart = dateStart;
                  return next();
                }
              }
            );
            var theDate1 = Date.parse(dateStart) + 3600 * 1000 * 24;
            const date = new Date(theDate1);
            dateStart = date
              .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
              .slice(0, 10);
          } // for i
        } // if datediff
      }
    );
  }
});
router.put("/updatedata", async (req, res) => {
  var date_diff = req.date_diff;
  var level = req.body.level; // ระดับสิทธิการเข้าถึง
  var ev_status = req.body.evstatus;
  var event_id = req.body.eventid;
  var ev_title = req.body.title;
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var to_id = req.body.to_id;
  var st_id = req.body.style; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_name; // id_rooms
  var toolmore = req.body.tool_request;

  var ward_id = req.body.ward_id;
  var faction_id = req.body.faction_id;
  var depart_id = req.body.depart_id;

  const new_date = new Date();
  const dateChecknow = Date.parse(new_date);
  const theDate_start = Date.parse(ev_startdate) + 3600 * 1000 * 24;

  const theDate_end = Date.parse(ev_enddate) + 3600 * 1000 * 24;

  if (theDate_start < dateChecknow || theDate_end < dateChecknow) {
    return res.json({
      error: true,
      status: "0",
      message: "เลือกวันจองย้อนหลังไม่ได้",
    });
  } else if (ev_endtime <= ev_starttime) {
    return res.json({
      error: true,
      status: "0",
      message: "เลือกเวลาให้ถูกต้อง",
    });
  } else if (req.status == 0) {
    return res.json({
      status: "0",
      message: "เวลาที่ท่านเลือกมีผู้อื่นจองแล้ว ไม่สามารถจองห้องได้",
    });
  } else {
    if (date_diff >= 0) {
      if (req.results_evid.length > 0) {
        con.query(
          "DELETE FROM tbl_event WHERE event_id = ? ",
          [event_id],
          (error, results_del, field) => {
            if (error) throw error;
            con.query(
              "ALTER TABLE tbl_event AUTO_INCREMENT = 1 ",
              (error, results_alter, field) => {
                if (error) throw error;

                for (var ii = 0; ii <= date_diff; ii++) {
                  var dateStart = ev_startdate;

                  var theDateend = Date.parse(ev_enddate) + 3600 * 1000 * 24;
                  const date2 = new Date(theDateend);

                  var dateEnd = date2
                    .toISOString("th-TH", { timeZone: "UTC" })
                    .slice(0, 10);

                  for (var d = 0; d <= date_diff; d++) {
                    var theDateStart = Date.parse(dateStart) + 3600 * 1000 * 24;
                    const date = new Date(theDateStart);
                    dateStart = date
                      .toISOString("EN-AU", {
                        timeZone: "Australia/Melbourne",
                      })
                      .slice(0, 10);

                    //todo : INSERT data
                    con.query(
                      "INSERT INTO tbl_event(ev_title,ev_people,ro_id,st_id," +
                        "ev_startdate,ev_enddate,ev_starttime,ev_endtime,ev_status,event_id,ward_id,faction_id,depart_id,ev_toolmore,id)" +
                        "VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,AES_ENCRYPT(?, UNHEX(SHA2(?, 512))))",
                      [
                        ev_title,
                        ev_people,
                        ro_id,
                        st_id,
                        dateStart,
                        dateEnd,
                        ev_starttime,
                        ev_endtime,
                        ev_status,
                        event_id,
                        ward_id,
                        faction_id,
                        depart_id,
                        toolmore,
                        id,
                        "" + key + "",
                      ],
                      (error, results, field) => {
                        if (error) throw error;

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
        return res.json({
          status: "200",
          message: "แก้ไขข้อมูลสำเร็จ",
        });
      } //results_evid.length>0
    } //date_diff >= 0
  }
});
module.exports = router;
