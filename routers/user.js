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
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.id;
  if (!id) {
    con.query(
      "SELECT u.id,u.username , u.password, u.person_id ,u.prefix,u.firstname ,u.lastname, u.position,u.phone ," +
        "de.de_id,de.de_name," +
        "lv.lv_id , lv.level " +
        "FROM tbl_user AS u  " +
        " " +
        "INNER JOIN tbl_department As de " +
        "ON (u.de_id = de.de_id) " +
        "INNER JOIN tbl_level As lv " +
        "ON (u.lv_id = lv.lv_id)" +
        "ORDER BY u.id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT u.id,u.username , u.password, u.person_id ,u.prefix,u.firstname ,u.lastname, u.position,u.phone ," +
        "de.de_id,de.de_name," +
        "lv.lv_id , lv.level " +
        "FROM tbl_user AS u  " +
        " " +
        "INNER JOIN tbl_department As de " +
        "ON (u.de_id = de.de_id) " +
        "INNER JOIN tbl_level As lv " +
        "ON (u.lv_id = lv.lv_id)" +
        "WHERE u.id = ?",
      [id],
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
  let id = req.body.id;
  let username = req.body.username;
  let password = req.body.password;
  let firstname = req.body.firstname;
  let lastname = req.body.lastname;
  let prefix = req.body.prefix;
  let person_id = req.body.person_id;
  let position = req.body.position;
  let phone = req.body.phone;
  let de_id = req.body.de_id;
  let lv_id = req.body.lv_id;

  if (!id || !firstname || !lastname || !de_id || !lv_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "UPDATE tbl_user SET username = ?, password = ? ,  prefix = ? ,firstname = ?,lastname = ?,person_id = ? ,position = ?,phone = ? ,de_id = ? ,lv_id=? WHERE id = ?",
      [
        username,
        password,
        prefix,
        firstname,
        lastname,
        person_id,
        position,
        phone,
        de_id,
        lv_id,
        id,
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
  let id = req.body.id;

  if (!id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "DELETE FROM tbl_user WHERE id = ?",
      [id],
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
});
module.exports = sql;
