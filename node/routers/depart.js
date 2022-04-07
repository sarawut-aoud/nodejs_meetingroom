const express = require("express");
const path = require("path");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");
const con = require("../config/config");
const dbname = require("../function/database");
const key = require("../function/key");
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
  if (!depart_id) {
    con.query(
      "SELECT d.depart_id , d.depart_name, d.faction_id " +
        "FROM " +
        pbh +
        "hr_depart AS d " +
        "ORDER BY d.depart_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT d.depart_id ,d.depart_name, d.faction_id " +
        "FROM " +
        pbh +
        "hr_depart AS d " +
        "WHERE d.depart_id = ? " +
        "ORDER BY d.depart_id ASC",
      [depart_id],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});

sql.get("/de_faction", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var faction_id = query01.faction_id;
  if (!faction_id) {
    return res.json({ status: 0, error: true, message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT depart_id ,depart_name,faction_id " +
        "FROM " +
        pbh +
        "hr_depart " +
        "WHERE faction_id = ? ",
      [faction_id],
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  }
});
sql.get("/faction", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var faction_id = query01.faction_id;
  if (!faction_id) {
    con.query(
      "SELECT f.faction_id,f.faction_name " +
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
  } else {
    con.query(
      "SELECT f.faction_id,f.faction_name " +
        "FROM " +
        pbh +
        "hr_faction AS f " +
        "WHERE f.faction_id = ? " +
        " ORDER BY f.faction_id ASC",
      [faction_id],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});
sql.get("/ward", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var ward_id = query01.ward_id;

  if (!ward_id) {
    con.query(
      "SELECT w.ward_id,w.ward_name " +
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
  } else {
    con.query(
      "SELECT w.ward_id,w.ward_name " +
        "FROM " +
        pbh +
        "hr_ward AS w " +
        "WHERE w.ward_id = ?" +
        " ORDER BY w.ward_id ASC",
      [ward_id],

      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});

sql.get("/duty", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var id = query01.id;

  if (!id) {
    con.query(
      "SELECT duty_name  " + "FROM " + pbh + "hr_duty  ",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      "SELECT du.duty_name  " +
        "FROM " +
        pbh +
        "hr_personal as u " +
        "INNER JOIN " +
        pbh +
        "hr_level as l ON (l.person_id = u.person_id)" +
        "INNER JOIN " +
        pbh +
        "hr_duty as du ON(l.duty_id = du.duty_id)" +
        "WHERE l.person_id =  AES_ENCRYPT(?, UNHEX(SHA2(?, 512)))",
      [id, "" + key + ""],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});

module.exports = sql;
