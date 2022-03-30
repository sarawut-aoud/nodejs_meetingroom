const express = require("express");
const path = require("path");

const app = express();
const bodyParser = require("body-parser");

const dbname = require("../function/database");
const { json } = require("body-parser");
const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

const cors = require("cors");
const con = require("../config/config");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const sql = express.Router();
// select tool with deprt
sql.get("/tools_request", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  var ward_id = query01.ward_id;
  var datetoday = query01.date;

  if (!ward_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่มีข้อมูลแผนก" });
  } else {
    var date2 = Date.parse(datetoday) + 3600 * 1000 * 24 * 7;
    const date_2 = new Date(date2);
    var date_after = date_2
      .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
      .slice(0, 10);
    con.query(
      "SELECT ev.ev_id , ev.ev_title , ev.ev_status, " +
        "DATE_FORMAT(ev.ev_createdate,'%Y-%m-%d') as  ev_createdate ," +
        "DATE_FORMAT(ev.ev_startdate,'%Y-%m-%d') as  ev_startdate ," +
        "DATE_FORMAT(ev.ev_enddate,'%Y-%m-%d') as  ev_enddate, " +
        "ev.ev_starttime , ev.ev_endtime ,ev.ev_people, " +
        "st_name , ro_name  " +
        "FROM tbl_acces AS ace "+
        "INNER JOIN tbl_event AS ev " +
        "ON (ace.ev_id =ev.ev_id) "+
        "INNER JOIN tbl_tools AS tool " +
        "ON (ace.to_id = tool.to_id) "+
        "INNER JOIN "+pbh +" hr_ward AS w " +
        "ON (tool.de_id = w.ward_id) " +
        "INNER JOIN tbl_style AS st " +
        "ON (ev.st_id = st.st_id ) " +
        "INNER JOIN tbl_rooms AS ro " +
        "ON (ev.ro_id = ro.ro_id ) " +
        "INNER JOIN "+pbh+"hr_personal AS user " +
        "ON (ev.id = user.person_id )" +
        "WHERE w.ward_id = ? " +
        "AND (ev.ev_status = '1' OR ev.ev_status = '3') AND " +
        "ev.ev_startdate BETWEEN  ?  AND ?" +
        "GROUP BY  ev.event_id ORDER BY ev.event_id ASC ",
      [ward_id, datetoday, date_after],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }
});
// //?  SELECT Data
sql.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let to_id = query01.to_id;
  let ev_id = query01.ev_id;
  let ward_id = query01.ward_id;

  if (!to_id && !ev_id &&!ward_id) {
    con.query(
      "SELECT t.to_id ,t.to_name  " +
        "FROM tbl_tools AS t " +
        "ORDER BY t.to_id ASC",
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else if (!ev_id && !to_id ) {
    con.query(
      "SELECT t.to_id ,t.to_name ,w.ward_id ,w.ward_name     " +
        "FROM tbl_tools AS t " +
        "INNER JOIN "+ pbh+" hr_ward  AS w ON (t.de_id = w.ward_id) " +
        "WHERE w.ward_id = ? "+
        " ORDER BY t.to_id ASC ",[ward_id],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  }else if(!ev_id && !ward_id){
    con.query(
      "SELECT t.to_id ,t.to_name ,w.ward_id ,w.ward_name   " +
        "FROM tbl_tools AS t " +
        "INNER JOIN "+ pbh+" hr_ward  AS w ON (t.de_id = w.ward_id) " +
        "WHERE t.to_id = ? "+
        " ORDER BY t.to_id ASC ",[to_id],
      (error, results, fields) => {
        if (error) throw error;
        res.status(200);
        res.json(results);
      }
    );
  } else {
    con.query(
      " SELECT  t.to_id , t.to_name ,(SELECT to_id  FROM tbl_acces where  to_id= t.to_id AND ev_id = ?) as acc_toid " +
        " FROM tbl_tools AS t " +
        " ORDER BY t.to_id ASC",
      [ev_id],
      (error, results, fields) => {
        if (error) throw error;
        res.json(results);
      }
    );
  }
});

// //? Insert Data
sql.post("/", async (req, res) => {
  var to_name = req.body.to_name; //todo : req -> Form .... data -> body
  var de_id = req.body.de_id;

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
      "UPDATE tbl_tools SET to_name = ?, de_id = ? WHERE to_id = ?",
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
  let to_id = req.body.to_id;

  if (!to_id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "ไม่สามารถบันทึกได้" });
  } else {
    con.query(
      "SELECT count(to_id) as to_id   FROM  tbl_acces  WHERE to_id = ?",
      [to_id],
      (error, results, fields) => {
        if (error) throw error;

        if (results[0].to_id > 0) {
          return res.send({
            error: false,
            status: "1",
            message: "มีการใช้งานอยู่ไม่สามารถลบข้อมูลได้",
          });
        } else {
          con.query(
            "DELETE FROM tbl_tools WHERE to_id = ?",
            [to_id],
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
