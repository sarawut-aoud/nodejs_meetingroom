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
  let ro_id = req.body.ro_id;
  if (!ro_id) {
    con.query(
      "SELECT ro_id,ro_name ,ro_people,ro_color,ro_detail ,ro_public FROM tbl_rooms ORDER BY tbl_rooms.ro_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT ro_id,ro_name ,ro_people,ro_color,ro_detail,ro_public FROM tbl_rooms WHERE ro_id = " + ro_id + "  ORDER BY tbl_rooms.ro_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});


//? Insert Data
sql.post("/", async (req, res) => {
  var ro_name = req.body.ro_name; //todo : req -> Form .... data -> body
  var ro_people = req.body.ro_people;
  var ro_color = req.body.ro_color;
  var ro_detail = req.body.ro_detail; // id_style
  var ro_public = req.body.ro_public; // id_style

  //? validation
  if (!ro_name || !ro_people || !ro_detail) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "INSERT INTO tbl_rooms (ro_name, ro_people, ro_color,ro_detail,ro_public) VALUES(?, ?,?, ?,?)",
      [ro_name, ro_people, ro_color, ro_detail,ro_public],
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

// //? Update Data
sql.put("/", async (req, res) => {
  let ro_id = req.body.ro_id;
  let ro_name = req.body.ro_name; //todo : req -> Form .... data -> body
  let ro_people = req.body.ro_people;
  let ro_color = req.body.ro_color;
  let ro_detail = req.body.ro_detail; // id_style
  var ro_public = req.body.ro_public; // id_style

  // validation

  if (!ro_name || !ro_people || !ro_detail) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "UPDATE tbl_rooms SET ro_name = ?, ro_people = ? ,  ro_color = ? ,ro_detail = ?,ro_public = ? WHERE ro_id = ?",
      [ro_name, ro_people, ro_color, ro_detail,ro_public, ro_id],
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

// //? delete data
sql.delete("/", async (req, res) => {
  let ro_id = req.body.ro_id;

  if (!ro_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "SELECT count(ro_id) as ro_id   FROM  tbl_event  WHERE ro_id = ?",
      [ro_id],
      (error, results, fields) => {
        if (error) throw error;

        if (results[0].ro_id > 0) {
          return res.send({
            error: false,
            status: "1",
            message: "มีการใช้งานอยู่ไม่สามารถลบข้อมูลได้",
          });
        } else {
          con.query(
            "DELETE FROM tbl_rooms WHERE ro_id = ?",
            [ro_id],
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
