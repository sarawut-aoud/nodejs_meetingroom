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
  let ward_id = req.body.de_id;
  if (!ward_id) {
    con.query(
      "SELECT ward_id,ward_name " +
        "FROM " +
        pbh +
        "hr_ward AS w " +
        "ORDER BY w.ward_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT ward_id,ward_name " +
        "FROM " +
        pbh +
        "hr_ward AS w " +
        "ORDER BY w.ward_id ASC",
      [ward_id],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});
sql.get("/faction", async (req, res) => {
  let ward_id = req.body.de_id;
  con.query(
    "SELECT w.ward_id , f.faction_id ,f.faction_name, dep.depart_id,dep.depart_name " +
      "FROM " +
      pbh +
      "hr_faction AS f " +
      "INNER JOIN " +
      pbh +
      "hr_ward AS w " +
      "ON(w.faction_id = f.faction_id) " +
      "INNER JOIN " +
      pbh +
      "hr_depart AS dep " +
      "ON (dep.faction_id = f.faction_id ) " +
      "WHERE w.ward_id = ? ORDER BY f.faction_id ASC",
    [ward_id],
    (error, results, fields) => {
      if (error) throw error;
      res.status(200);
      res.json(results);
    }
  );
});
module.exports = sql;
