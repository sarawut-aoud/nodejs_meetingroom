const express = require("express");
const path = require("path");

const app = express();
const bodyParser = require("body-parser");

const cors = require("cors");
const con = require("../config/config");
const { error } = require("console");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const sql = express.Router();

//?  SELECT Data
sql.get("/", async (req, res) => {
  let de_id = req.body.de_id;
  if(!de_id){
    con.query(
      "SELECT de_id,de_name,de_phone FROM tbl_department  ORDER BY tbl_department.de_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }else{
    con.query(
      "SELECT de_id,de_name,de_phone FROM tbl_department WHERE de_id = ?  ORDER BY tbl_department.de_id ASC",[de_id],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
 
});
// INSERT DATA
sql.post("/", async (req, res) => {
  let de_name = req.body.de_name;
  let de_phone = req.body.de_phone;
  if (!de_name || !de_phone) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "INSERT INTO tbl_department(de_name,de_phone) VALUES(?,?)",
      [de_name, de_phone],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});

// //? Update Data
sql.put("/", async (req, res) => {
  let de_name = req.body.de_name;
  let de_phone = req.body.de_phone;
  let de_id = req.body.de_id;


  if (!de_id || !de_phone || !de_name ) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "UPDATE tbl_department SET de_name = ?, de_phone = ?  WHERE de_id = ?",
      [
        de_name,
        de_phone,
        de_id,
      ],
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
  let de_id = req.body.de_id;

  if (!de_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถลบได้" });
  } else {
    con.query(
      "SELECT count(de_id) as de_id   FROM  tbl_tools   WHERE de_id = ?", //? 
      [de_id],
      (error, results, fields) => {
        if (error) throw error;

        if (results[0].de_id > 0) {
          return res.send({
            error: false,
            status: "1",
            message: "มีการใช้งานอยู่ไม่สามารถลบข้อมูลได้",
          });
        } else {
          con.query(
            "DELETE FROM tbl_department WHERE de_id = ?",
            [de_id],
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
