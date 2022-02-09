/// - Hos - ///
// const mysql = require("mysql");
// const con = mysql.createConnection({
//     host: '192.168.9.7',
//     user: 'erp',
//     password: 'Erp@PhetchabunHospital',
//     database: 'db_asset',
//     charset: 'utf8'
// })
// con.connect((err) => {
//     if (err) {
//         console.error('Error connecting : '+err.stack)
//         return
//     }
//     con.query("SET NAMES UTF8");
//     console.log('Connected as ID : '+con.threadId)
// })
// module.exports = con
/// - END Hos - ///
/// - TAR - ///
const mysql = require("mysql");
const con = mysql.createConnection({
  host: "127.0.0.1",
  user: "root",
  password: "",
  database: "db_meeting",
  charset: "utf8",
});
con.connect((err) => {
  if (err) {
    console.error("Error connecting : " + err.stack);
    return;
  }
  con.query("SET NAMES UTF8");
  console.log("Connected as ID : " + con.threadId);
});
module.exports = con;
