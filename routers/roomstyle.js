const express = require("express");
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
  let st_id = req.body.st_id;
  if (!st_id) {
    con.query(
      "SELECT st_id,st_name  FROM tbl_style ORDER BY tbl_style.st_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT st_id,st_name  FROM tbl_style WHERE st_id = " +
        st_id +
        "" +
        " ORDER BY tbl_style.st_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});
// sql.get("/", async (req, res) => {
//   var query01 = require("url").parse(req.url, true).query;
//   let show = query01.show;
//   let ac_id = query01.id;
//   let status = query01.status;

//   if (show === "ture" && status != "check") {
//     con.query(
//       "SELECT o.ac_id,o.ac_name ,p.typeac_id ,o.ac_pubilc ,p.typeac_name " +
//         " FROM hr_academic AS o " +
//         " INNER JOIN hr_typeacademic as p ON o.typeac_id=p.typeac_id where o.ac_id = ? ",
//       "" + ac_id + "" + " ORDER BY o.ac_name ",
//       (error, results, fields) => {
//         if (error) throw error;

//         res.json(results);
//       }
//     );
//   } else {
//     con.query(
//       "SELECT o.ac_id, o.ac_name ,p.typeac_id  ,o.ac_pubilc ,p.typeac_name " +
//         " FROM hr_academic AS o " +
//         " INNER JOIN hr_typeacademic as p ON o.typeac_id=p.typeac_id" +
//         " ORDER BY o.ac_name ",
//       (error, results, fields) => {
//         if (error) throw error;
//         res.json(results);
//       }
//     );
//   }
// });

sql.post("/", async (req, res) => {
  var st_name = req.body.st_name;

  //? validation

  if (!st_name) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "INSERT INTO tbl_style (st_name) VALUES(?)",
      [st_name],
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
//? update
sql.put("/", async (req, res) => {
  let st_name = req.body.ac_name;
  let st_id = req.body.st_id;
  // validation

  if (!st_name) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "UPDATE tbl_style SET st_name = ? WHERE st_id = ?",
      [st_name, st_id],
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
      "SELECT count(st_id) as st_id   FROM tbl_event   WHERE st_id = ?",
      [st_id],
      (error, results, fields) => {
        if (error) throw error;

        if (results[0].st_id > 0) {
          return res.send({
            error: false,
            status: "1",
            message: "มีการใช้งานอยู่ไม่สามารถลบข้อมูลได้",
          });
        } else {
          con.query(
            "DELETE FROM tbl_style WHERE st_id = ?",
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
