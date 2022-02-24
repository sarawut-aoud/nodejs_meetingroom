const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");
const con = require("../config/config");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();

router.get("/", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.id;

  if (!id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT ev.ev_id , ev.ev_createdate, ev.ev_title ,ev.ev_startdate,ev.ev_enddate, ev.ev_starttime ,ev.ev_endtime, ev.ev_status ,ev.ev_people," +
        "ro.ro_id,ro.ro_name , users.id " +
        "FROM tbl_event AS ev " +
        "INNER JOIN tbl_rooms AS ro " +
        "ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_user AS users " +
        "ON (ev.id = users.id ) " +
        "WHERE users.id = ? " +
        "GROUP BY ev.event_id",
      [id],
      (error, results, fields) => {
        if (error) throw error;

        for (var i = 0; i < results.length; i++) {
          var ev_id = results[i].ev_id;
          var ev_status = results[i].ev_status;
          if (ev_id) {
            con.query(
              "SELECT * FROM tbl_seting WHERE ev_id = ? AND id = ? AND set_status = ?",
              [ev_id, id, ev_status],
              (error, total, fields) => {
                if (error) throw error;
                for (var x = 0; x < total.length; x++) {
                  if (total == 0) {
                    con.query(
                      "DELETE FROM tbl_seting WHERE ev_id = ?",
                      [ev_id],
                      (error, results, fields) => {
                        if (error) throw error;
                        con.query(
                          "INSERT INTO tbl_seting(id,ev_id,set_status) " +
                            "VALUES(?,?,?)",
                          [id, ev_id, ev_status],
                          (error, results, fields) => {
                            if (error) throw error;
                            return res.json(results);
                          }
                        );
                      }
                    );
                  }
                }
              }
            );
          }
        }
      }
    );
  }
});

module.exports = router;
