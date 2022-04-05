const express = require("express");
const crypto = require("crypto");

const key = require("../function/key");
const con = require("../config/config");

const app = express();
const router = express.Router();

const dbname = require("../function/database");

const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

router.get("/", async (req, res) => {
  res.send({ status: "1", message: "ยินดีต้อนรับเข้าสู่ระบบ" });
});

router.post("/login", async (req, res, next) => {
  const q = req.body;
  const password = crypto
    .createHash("md5")
    .update(q.inputPassword)
    .digest("hex");
  const sql =
    "SELECT o.person_username, o.person_firstname ,o.person_lastname   " +
    "FROM " +
    pbh +
    "hr_personal AS o  " +
    "WHERE o.person_username = ? " +
    "AND o.person_password = ? ";
  const params = [q.inputUsername, password];
  con.query(sql, params, (err, rows) => {
    if (err) {
      console.log(err);
      return res.json({
        status: "0",
        message: "ไม่สามารถเชื่อมต่อฐานข้อมูลบุคลากรได้",
      });
    } else {
      if (rows.length > 0) {
        (req.username = rows[0].person_username),
          (req.firstname = rows[0].person_firstname),
          (req.lastname = rows[0].person_lastname);
        return next();
      } else {
        return res.json({
          status: "0",
          message:
            "Username หรือ Password ไม่ถูกต้อง<br>หรือคุณไม่มีสิทธิ์เข้าใช้งาน!",
        });
      }
    }
  });
});
router.post("/login", async (req, res) => {
  req.username;
  req.firstname;
  req.lastname;
 
  con.query(
    "SELECT ps.person_username, ps.person_prefix," +
      "AES_DECRYPT(ps.person_id, UNHEX(SHA2(?, 512))) AS person_id, " +
      "ps.person_firstname, " +
      "ps.person_lastname, " +
      "ps.person_right, " +
      "ps.person_page, " +
      "ofs.office_id, " +
      "ofs.office_name " +
      "FROM " +
      pbh +
      "hr_personal AS ps  " +
      "LEFT JOIN " +
      pbh +
      "hr_office_sit AS ofs " +
      "ON (ps.office_id = ofs.office_id ) " +
      "WHERE ps.person_username = ? ",
    [''+key+'', req.username],
    (error, results, fields) => {
      if (error) throw error;
      if (results.length > 0) {
        var personid = "";
        if (!results[0].person_id) {
          personid = "";
        } else {
          personid = results[0].person_id.toString("utf8");
        }
        return res.json({
          person_username: results[0].person_username,
          person_prefix: results[0].person_prefix,
          person_firstname: results[0].person_firstname,
          person_lastname: results[0].person_lastname,
          person_id: personid,
          person_menu: results[0].person_menu,
          person_page: results[0].person_page,
          person_photo: results[0].person_photo,
          person_right: results[0].person_right,
          person_token: results[0].person_token,
          office_id: results[0].office_id,
          office_name: results[0].office_name,
        });

        // (position_id = results[0].position_id),
        // (position_name = results[0].position_name),
        // (sign_id = results[0].sign_id);
      }
    }
  );
});

router.post("/level", async (req, res) => {
  var q = req.body;
 
  const sql =
    "SELECT l.level_id, " +
    "IF (d.duty_lv IS NULL, 0, d.duty_lv) AS duty_id, " +
    "IF (d.duty_name IS NULL, '', d.duty_name) AS duty_name, " +
    "IF (f.faction_id IS NULL, 0, f.faction_id) AS faction_id, " +
    "IF (f.faction_name IS NULL, '', f.faction_name) AS faction_name, " +
    "IF (p.depart_id IS NULL, 0, p.depart_id) AS depart_id, " +
    "IF (p.depart_name IS NULL, '', p.depart_name) AS depart_name, " +
    "IF (w.ward_id IS NULL, 0, w.ward_id) AS ward_id, " +
    "IF (w.ward_name IS NULL, '', w.ward_name) AS ward_name " +
    "FROM " +
    pbh +
    " hr_level AS l " +
    "LEFT JOIN " +
    pbh +
    " hr_duty AS d " +
    "ON (l.duty_id = d.duty_id) " +
    "LEFT JOIN " +
    pbh +
    " hr_faction AS f " +
    "ON (l.faction_id = f.faction_id) " +
    "LEFT JOIN " +
    pbh +
    " hr_depart AS p " +
    "ON (l.depart_id = p.depart_id) " +
    "LEFT JOIN " +
    pbh +
    " hr_ward AS w " +
    "ON (l.ward_id = w.ward_id) " +
    "WHERE l.person_id =  AES_ENCRYPT(?, UNHEX(SHA2(?, 512)))"; //AES_ENCRYPT(?, UNHEX(SHA2(?, 512)))
  const params = [q.id,''+key+''];

  con.query(sql, params, (err, rows) => {
    if (err) {
      return res.json({
        status: "0",
        message: "ไม่สามารถเชื่อมต่อฐานข้อมูลระดับปฏิบัติงานได้",
      });
    } else {
      if (rows.length > 0) {
        // console.log(rows);
        return res.json(rows);
      } else {
        return res.json({
          status: "0",
          message: "ไม่พบข้อมูลหน่วยงานที่สังกัด",
        });
      }
    }
  });
});

module.exports = router;
