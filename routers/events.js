const express = require("express");
const path = require("path");

const app = express();
const bodyParser = require("body-parser");

const cors = require("cors");
const con = require("../config/config");

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
        "FROM tbl_event as ev " +
        "INNER JOIN tbl_rooms as ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user as users ON (ev.id = users.id) WHERE users.id = ? GROUP BY ev.event_id",
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
// SELECT all
router.get("/", async (req, res) => {
  con.query(
    "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
      "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
      "FROM tbl_event as ev " +
      "INNER JOIN tbl_rooms as ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN tbl_user as users ON (ev.id = users.id)  GROUP BY ev.event_id",
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
  if (level == "1" || level == "4") {// admin /  manage

    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
        "FROM tbl_event as ev " +
        "INNER JOIN tbl_rooms as ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user as users ON (ev.id = users.id) WHERE ev.ev_status = '1' GROUP BY ev.event_id",
      (error, results, fields) => {
        if (error) throw error;
        // console.log(error);
        res.json(results);
      }
    );
  } else if (level == "3") {  // STAFF
    con.query(
      "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
        "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,users.id " +
        "FROM tbl_event as ev " +
        "INNER JOIN tbl_rooms as ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user as users ON (ev.id = users.id) WHERE ev.ev_status = '0' GROUP BY ev.event_id",
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
// "SELECT ev.ev_id , ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate, ev.ev_status,ev.ev_starttime, " +
// "ev.ev_endtime, ev.ev_people,ev.ev_createdate, ro.ro_id, ro.ro_name,u.id " +
// "FROM tbl_event as ev INNER JOIN tbl_rooms as ro ON (ev.ro_id = ro.ro_id) " +
// "INNER JOIN tbl_user as u ON (ev.id=u.id) " +
// "WHERE u.id = ' ? ' GROUP BY ev.event_id";

// con.query('SELECT o.ac_id,o.ac_name ,p.typeac_id ,o.ac_pubilc ,p.typeac_name '
// +' FROM hr_academic AS o '
// +' INNER JOIN hr_typeacademic as p ON o.typeac_id=p.typeac_id where o.ac_id = ? ' ,'' + ac_id + ''
// +' ORDER BY o.ac_name ' , (error, results, fields) => {
// if (error) throw error;

// res.json(results);
// });
//  const params = [q.id];
// con.query(sql, params ,(error, rows) => {
//   if (error) {
//     console.log(error);
//     return res.json({
//       status: "0",
//       message: "เกิดข้อผิดพลาด",
//     });
//   } else {

//     if (rows.length < 0) {
//        console.log(rows);

//       return res.json({
//         ev_id: rows[0].ev_id,
//         event_id: rows[0].event_id,
//         ev_title: rows[0].ev_title,
//         ev_startdate: rows[0].ev_startdate,
//         ev_enddate: rows[0].ev_enddate,
//         ev_status: rows[0].ev_status,
//         ev_starttime: rows[0].ev_starttime,
//         ev_endtime: rows[0].ev_endtime,
//         ev_people: rows[0].ev_people,
//         ev_createdate: rows[0].ev_createdate,
//         ro_id:rows[0].ro_id,
//         ro_name: rows[0].ro_name,
//         id:rows[0].id,
//       });
//     } else {
//       return res.json({
//         status: "0",
//         message:
//           "ไม่มีรายการจองห้องประชุม",
//       });
//     }
//   }
// });

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
  var ev_staut = req.body.ev_status; //เริ่มการจอง status == 1 -> ส่งคำขอ , 2== รอการินุมัติจากหัวหน้า ,3 == อนุมัติคำขอ
  var ev_id;
  var st_id = req.body.st_id; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_id; // id_rooms
  function dateDiff(ev_startdate, ev_enddate) {
    var date1 = new Date(ev_startdate);
    var date2 = new Date(ev_enddate);
    var diff = new Date(date2.getTime() - date1.getTime());
    let f = new Intl.DateTimeFormat("en");
    let different = f.formatToParts(diff);
    return different;
  }
  var chk = 0;
  var date_diff = dateDiff(ev_startdate, ev_enddate);
  console.log(date_diff);
  console.log(date_diff.toString().substring(1)); ///  คือ ? [object Object],[object Object],[object Object],[object Object],[object Object]
  // let num = date_diff.toString().substring(1);
  // let sing = date_diff.toString().substring(0, 1);
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
// sql.delete("/", async (req, res) => {
//   let ac_id = req.body.id;

//   if (!ac_id) {
//     return res
//       .status(400)
//       .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
//   } else {
//     con.query(
//       "SELECT count(ac_id) as ac_id   FROM hr_personal   WHERE ac_id = ?",
//       [ac_id],
//       (error, results, fields) => {
//         if (error) throw error;

//         if (results[0].ac_id > 0) {
//           return res.send({
//             error: false,
//             status: "1",
//             message: "มีการใช้งานอยู่ไม่สามารถลบข้อมูลได้",
//           });
//         } else {
//           con.query(
//             "DELETE FROM hr_academic WHERE ac_id = ?",
//             [ac_id],
//             (error, results, fields) => {
//               if (error) throw error;
//               return res.send({
//                 error: false,
//                 status: "0",
//                 message: "ลบข้อมูลแล้ว",
//               });
//             }
//           );
//         }
//       }
//     );
//   }
// });

module.exports = router;
