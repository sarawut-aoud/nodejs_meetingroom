const express = require("express");
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

router.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.dv_id;
  if (!id) {
    con.query(
      "SELECT sd.dv_id,sd.ward_id,sd.setstatus ,w.ward_name " +
        "FROM tbl_setdevice AS sd " +
        "INNER JOIN " +
        pbh +
        "hr_ward AS w " +
        "ON (sd.ward_id = w.ward_id )" +
        "ORDER BY sd.dv_id",
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT sd.dv_id,sd.ward_id,sd.setstatus ,w.ward_name " +
        "FROM tbl_setdevice AS sd " +
        "INNER JOIN " +
        pbh +
        "hr_ward AS w " +
        "ON (sd.ward_id = w.ward_id )" +
        "WHERE sd.dv_id = ? ORDER BY sd.dv_id",
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
          .status(400)
          .send({ error: true, status: "200", message: "บันทึกข้อมูลสำเร็จ" });
      }
    );
  }
});
router.put("/", async (req, res) => {
  var dv_id = req.body.dv_id;
  var ward_id = req.body.ward_id;
  var setstatus = req.body.setstatus;

  if ( !ward_id || !setstatus) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "UPDATE tbl_setdevice SET setstatus = ? WHERE ward_id = ?",
      [setstatus, ward_id],
      (error, results, fields) => {
        if (error) throw error;
        return res
          .status(200)
          .send({ error: true, status: "200", message: "แก้ไขข้อมูลสำเร็จ" });
      }
    );
  }
})
router.delete("/", async (req, res) => {
    var dv_id = req.body.dv_id;

    if (!dv_id ) {
      return res
        .status(400)
        .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
    } else {
      con.query(
        "DELETE FROM tbl_setdevice  WHERE ward_id = ?",
        [ ward_id],
        (error, results, fields) => {
          if (error) throw error;
          return res
            .status(200)
            .send({ error: true, status: "200", message: "ลบข้อมูลสำเร็จ" });
        }
      );
    }
  })



module.exports = router;
