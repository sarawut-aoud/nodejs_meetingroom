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

// //?  SELECT Data
sql.get("/", async (req, res) => {
  con.query(
    "SELECT to_name  FROM tbl_tools  ORDER BY tbl_tools.to_id ASC",
    (error, results, fields) => {
      if (error) throw error;
      res.status(200);
      res.json(results);
    }
  );
});

// //? Insert Data
sql.post("/", async (req, res) => {
  var to_name = req.body.to_name; //todo : req -> Form .... data -> body
  var de_id = req.body.de_id;
  console.log(to_name, de_id);
  //! validation -> ไม่มีข้อมูลนั้นแหละ
  if (!to_name || !de_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "INSERT INTO tbl_tools (to_name,de_id) VALUES(?,?)",
      [to_name, de_id],
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

// //? update
sql.put("/", async (req, res) => {
  let to_name = req.body.to_name;
  let de_id = req.body.de_id;
  let to_id = req.body.to_id;
  // validation

  if (!to_name || !de_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "UPDATE tbl_tools SET to_name = ?,de_id = ? WHERE to_id = ?",
      [to_name, de_id, to_id],
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
  let st_id = req.body.st_id;

  if (!st_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "SELECT count(to_id) as to_id   FROM     WHERE to_id = ?", //? FROM seting or setdevice
      [st_id],
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
            "DELETE FROM tbl_tools WHERE to_id = ?",
            [st_id],
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
