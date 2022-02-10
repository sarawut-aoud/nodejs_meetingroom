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
  con.query("SELECT de_id,de_name FROM tbl_department  ORDER BY tbl_department.de_id ASC", (error, results, fields) => {
    if (error) throw error;
    res.status(200);
    res.json(results);
  });
});

module.exports = sql;
