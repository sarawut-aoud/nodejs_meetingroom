const express = require("express");
const path = require("path");

const app = express();
const bodyParser = require("body-parser");

const cors = require("cors");
const con = require("../config/config");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const sql = express.Router();

//?  SELECT Data
sql.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let show = query01.show;
  let ac_id = query01.id;
  let status = query01.status;

  if (show === "ture" && status != "check") {
    con.query(
      "SELECT o.ac_id,o.ac_name ,p.typeac_id ,o.ac_pubilc ,p.typeac_name " +
        " FROM hr_academic AS o " +
        " INNER JOIN hr_typeacademic as p ON o.typeac_id=p.typeac_id where o.ac_id = ? ",
      "" + ac_id + "" + " ORDER BY o.ac_name ",
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT o.ac_id, o.ac_name ,p.typeac_id  ,o.ac_pubilc ,p.typeac_name " +
        " FROM hr_academic AS o " +
        " INNER JOIN hr_typeacademic as p ON o.typeac_id=p.typeac_id" +
        " ORDER BY o.ac_name ",
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  }
});

//? Insert Data
sql.post("/", async (req, res) => {
  var ev_title = req.body.ac_name; //todo : req -> Form .... data -> body
  var ev_startdate = req.body.ac_pubilc;
  var ev_enddate = req.body.ac_pubilc;
  var ev_starttime = req.body.typeac_id;
  var ev_endtime = req.body.ac_pubilc;
  var ev_people = req.body.ev_people;
  // var ev_staut = req.body.ev_status;  เริ่มการจอง status == 1 -> ส่งคำขอ , 2== รอการินุมัติจากหัวหน้า ,3 == อนุมัติคำขอ
  var st_id = req.body.st_id; // id_style
  var id = req.body.id ;  // id_users
  var ro_id = req.body.ro_id ; // id_rooms 

  //? validation
  if (!ev_title || !ac_pubilc || !typeac_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "INSERT INTO hr_academic (ac_name, ac_pubilc,typeac_id) VALUES(?, ?, ?)",
      [ac_name, ac_pubilc, typeac_id],
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
});

//? Update Data
sql.put("/", async (req, res) => {
  let ac_name = req.body.ac_name;
  let ac_pubilc = req.body.ac_pubilc;
  let typeac_id = req.body.typeac_id;
  let ac_id = req.body.ac_id;
  // validation

  if (!ac_name || !ac_pubilc || !typeac_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "UPDATE hr_academic SET ac_name = ?, ac_pubilc = ? , typeac_id = ? WHERE ac_id = ?",
      [ac_name, ac_pubilc, typeac_id, ac_id],
      (error, results, fields) => {
        if (error) throw error;
        return res.send({
          error: false,
          status: "0",
          message: "แก้ไขข้อมูลแล้ว",
        });
      }
    );
  }
});

//? delete data
sql.delete("/", async (req, res) => {
  let ac_id = req.body.id;

  if (!ac_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "SELECT count(ac_id) as ac_id   FROM hr_personal   WHERE ac_id = ?",
      [ac_id],
      (error, results, fields) => {
        if (error) throw error;

        if (results[0].ac_id > 0) {
          return res.send({
            error: false,
            status: "1",
            message: "มีการใช้งานอยู่ไม่สามารถลบข้อมูลได้",
          });
        } else {
          con.query(
            "DELETE FROM hr_academic WHERE ac_id = ?",
            [ac_id],
            (error, results, fields) => {
              if (error) throw error;
              return res.send({
                error: false,
                status: "0",
                message: "ลบข้อมูลแล้ว",
              });
            }
          );
        }
      }
    );
  }
});

module.exports = sql;
