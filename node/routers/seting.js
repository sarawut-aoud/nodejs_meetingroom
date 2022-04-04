const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");
const con = require("../config/config");

const dbname = require("../function/database");
const { json } = require("body-parser");
const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();
router.get("/detail", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let ev_id = query01.ev_id;
  con.query(
    "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
      "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
      "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
      "DATE_FORMAT(ev.ev_createdate,'%Y-%m-%d') as  ev_createdate ," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people,  " +
      "ro.ro_id, ro.ro_name, " +
      "st.st_id, st.st_name," +
      "users.person_firstname as firstname ,users.person_lastname as lastname," +
      "dept.depart_name, dept.depart_id ,w.ward_name,f.faction_name,du.duty_name " +
      "FROM tbl_event AS ev " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  " +
      pbh +
      "hr_personal AS users ON (ev.id = users.person_id)" +
      "INNER JOIN " +
      pbh +
      "hr_level AS l ON(l.person_id = users.person_id)" +
      "INNER JOIN " +
      pbh +
      "hr_ward AS w ON (l.ward_id = w.ward_id)" +
      "INNER JOIN " +
      pbh +
      "hr_faction AS f ON (l.faction_id = f.faction_id)" +
      "INNER JOIN  " +
      pbh +
      "hr_depart AS dept ON (l.depart_id = dept.depart_id) " +
      "INNER JOIN "+pbh+"hr_duty AS du ON (l.duty_id = du.duty_id)"+
      "WHERE ev.ev_id = ? ;",
    [ev_id],
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

router.get("/notified", async (req, res, next) => {
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.id;
  if (!id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT ev.ev_id , ev.ev_createdate, ev.ev_title ," +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
        "DATE_FORMAT(ev.ev_createdate,'%Y-%m-%d') as  ev_createdate ," +
        " ev.ev_starttime ,ev.ev_endtime, ev.ev_status ,ev.ev_people," +
        "ro.ro_id,ro.ro_name , users.person_id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro " +
        "ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN " +
        pbh +
        " hr_personal AS users " +
        "ON (ev.id = users.person_id ) " +
        "WHERE users.person_id = AES_ENCRYPT(?, UNHEX(SHA2('?', 512)))" +
        "AND (ev.ev_status = '3' OR ev.ev_status = '4')  GROUP BY ev.event_id",
      [id,key],
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  }
});
router.get("/", async (req, res, next) => {
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.id;

  const arr = [];
  if (!id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT ev.ev_id , ev.ev_createdate, ev.ev_title ,ev.ev_startdate,ev.ev_enddate, ev.ev_starttime ,ev.ev_endtime, ev.ev_status ,ev.ev_people," +
        "ro.ro_id,ro.ro_name , users.person_id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro " +
        "ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN " +
        pbh +
        " hr_personal AS users " +
        "ON (ev.id = users.person_id ) " +
        "WHERE users.person_id = AES_ENCRYPT(?, UNHEX(SHA2('?', 512)))" +
        "GROUP BY ev.event_id",
      [id,key],
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
        // for (var x = 0; x < results.length; x++) {
        //   //  evid = ;

        //   evstatus = results[x].ev_status;
        //   arr[x] = results[x].ev_id;

        //   for (var x = 0; x < results.length; x++) {
        //     const evid = arr[x];
        //     con.query(
        //       "SELECT id,ev_id,set_status FROM tbl_seting WHERE ev_id = ? AND id = ? AND set_status = ?",
        //       [evid, id, evstatus],
        //       (error, total, fields) => {
        //         if (error) throw error;
        //         if (total.length == 0) {
        //           if (evid != null && evstatus != "") {
        //             con.query(
        //               "INSERT INTO tbl_seting(id,ev_id,set_status)VALUES(?,?,?)",
        //               [id, evid, evstatus],
        //               (error, results, fields) => {
        //                 if (error) throw error;
        //               }
        //             );
        //           }
        //         }
        //       }
        //     );
        //   }
        // }
        // res.json(results);

        // return next();
      }
    );
  }
}),
  (module.exports = router);
