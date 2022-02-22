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

module.exports = sql;
