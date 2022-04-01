const express = require("express");
const path = require("path");

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

const sql = express.Router();

//?  SELECT Data
sql.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let depart_id = query01.depart_id;
  // if (!depart_id) {
    con.query(
      "SELECT d.depart_id ,  d.depart_name "+
      "FROM "+pbh+"hr_depart AS d "+
      "ORDER BY d.depart_id ASC",
      
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  // } else {
  //   return res.json({ status: 200, message: "ไม่พบข้อมูล" });
  // }
  // else {
  //   con.query(
  //     "SELECT ward_id,ward_name " +
  //       "FROM " +
  //       pbh +
  //       "hr_ward AS w " +
  //       "ORDER BY w.ward_id ASC",
  //     [ward_id],
  //     (error, results, fields) => {
  //       if (error) throw error;
  //       res.status(200);
  //       res.json(results);
  //     }
  //   );
  // }
});
sql.get("/faction", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var faction_id = query01.faction_id;
  con.query(
    "SELECT f.faction_id,f.faction_name "+
      "FROM " +
      pbh +
      "hr_faction AS f " +
      " ORDER BY f.faction_id ASC",
    
    (error, results, fields) => {
      if (error) throw error;
      res.status(200);
      res.json(results);
    }
  );
});
sql.get("/ward", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var faction_id = query01.faction_id;
  con.query(
    "SELECT w.ward_id,w.ward_name "+
      "FROM " +
      pbh +
      "hr_ward AS w " +
      " ORDER BY w.ward_id ASC",
    
    (error, results, fields) => {
      if (error) throw error;
      res.status(200);
      res.json(results);
    }
  );
});
module.exports = sql;
