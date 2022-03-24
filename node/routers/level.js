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
   
  con.query(
    "SELECT lv.lv_id , lv.level " +
      "FROM tbl_level AS lv  ",
    (error, results, fields) => {
      if (error) throw error;
      res.status(200);
      res.json(results);
    }
  );
});

module.exports = sql;
