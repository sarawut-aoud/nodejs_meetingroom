const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");
const con = require("../config/config");
const key = require("../function/key");

const dbname = require("../function/database");
const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();
router.get("/menu", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let ward_id = query01.ward_id;
  let fac_id = query01.fac_id;
  let depart_id = query01.depart_id;
  if (!ward_id) {
    return res.send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT sd.ward_id,sd.setstatus ,sd.faction_id,sd.depart_id " +
        "FROM tbl_setdevice AS sd " +
        "WHERE sd.ward_id = ? AND sd.faction_id = ? AND sd.depart_id = ? " +
        "ORDER BY sd.dv_id",
      [ward_id, fac_id, depart_id],
      (error, results, fields) => {
        if (error) throw error;
        return res.json(results);
      }
    );
  }
});
router.get("/menuward", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let ward_id = query01.ward_id;
  let depart_id = query01.depart_id;
  let fac_id = query01.fac_id;
  if (!fac_id) {
    return res.send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT count(ev.ev_id) AS status , ev.faction_id , ev.ward_id  , ev.depart_id " +
        "FROM tbl_event AS ev " +
        "WHERE ev.ward_id = ? OR ev.faction_id = ? OR ev.depart_id = ?  ",
      [ward_id, fac_id, depart_id],
      (error, results, fields) => {
        if (error) throw error;
        return res.json(results);
      }
    );
  }
});
router.get("/reserve_ward", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let ward_id = query01.ward_id;
  let depart_id = query01.depart_id;
  let fac_id = query01.fac_id;
  if (!fac_id) {
    return res.send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT ev.ev_id, ev.event_id, ev.ev_title, " +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate, " +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate ," +
        "ev.ev_starttime, ev.ev_endtime, ev.ev_people, ev.ev_createdate,ev_toolmore, " +
        "ev.ev_status,ro.ro_name, ro.ro_color, " +
        "st.st_name, " +
        "ev.depart_id ,ev.ward_id,ev.faction_id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id) " +
        "WHERE ev.ward_id = ? OR ev.faction_id = ? OR ev.depart_id = ?   GROUP BY ev.event_id",
      [ward_id, fac_id, depart_id],
      (error, results, fields) => {
        if (error) throw error;
        return res.json(results);
      }
    );
  }
});
router.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.dv_id;
  if (!id) {
    con.query(
      "SELECT sd.dv_id,sd.ward_id,sd.setstatus ,w.ward_name " +
        "FROM tbl_setdevice AS sd " +
        "INNER JOIN " +
        pbh +
        "hr_ward as w ON (sd.ward_id = w.ward_id)" +
        "ORDER BY sd.dv_id",
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT sd.dv_id,sd.ward_id,sd.depart_id,sd.setstatus ,sd.faction_id " +
        "FROM tbl_setdevice AS sd " +
        "WHERE sd.dv_id = ? " +
        "ORDER BY sd.dv_id",
      [id],
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  }
});
router.post("/", async (req, res) => {
  var ward_id = req.body.ward_id;
  var setstatus = req.body.setstatus;

  if (!ward_id || !setstatus) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "INSERT INTO tbl_setdevice (ward_id,setstatus) VALUES(?,?)",
      [ward_id, setstatus],
      (error, results, fields) => {
        if (error) throw error;
        return res
          .status(200)
          .send({ error: true, status: "200", message: "บันทึกข้อมูลสำเร็จ" });
      }
    );
  }
});
router.put("/", async (req, res) => {
  var dv_id = req.body.dv_id;
  var ward_id = req.body.ward_id;
  var depart_id = req.body.depart_id;
  var faction_id = req.body.faction_id;
  var setstatus = req.body.setstatus;

  if (!ward_id || !setstatus || !depart_id || !faction_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "UPDATE tbl_setdevice SET setstatus = ? , ward_id = ? , depart_id = ? , faction_id = ? WHERE dv_id = ?",
      [setstatus, ward_id, depart_id, faction_id, dv_id],
      (error, results, fields) => {
        if (error) throw error;
        return res
          .status(200)
          .send({ error: true, status: "200", message: "แก้ไขข้อมูลสำเร็จ" });
      }
    );
  }
});
router.delete("/", async (req, res) => {
  var dv_id = req.body.dv_id;

  if (!dv_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "DELETE FROM tbl_setdevice  WHERE dv_id = ?",
      [dv_id],
      (error, results, fields) => {
        if (error) throw error;
        return res
          .status(200)
          .send({ error: true, status: "200", message: "ลบข้อมูลสำเร็จ" });
      }
    );
  }
});

module.exports = router;
