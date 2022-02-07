const express = require("express");
const path = require("path");
const bodyParser = require("body-parser");
// const fs = require("fs");
// const https = require('https');
const cors = require("cors");
const port = 4500;
// const mongoose = require("mongoose");
// const { auth } = require("./middlewares/auth");
// const datauser = require("./models/users");
// const privateKey = fs.readFileSync('../ssl/wildcard_moph_go_th.key');
// const certificate = fs.readFileSync('../ssl/wildcard_moph_go_th.crt');
// const options = {key: privateKey, cert: certificate};

const app = express();

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));


///////////////////////aof////////////////////
const login = require("./login/login");

///////////////////////end////////////////////

///////////////////////aof////////////////////
app.use("/login", login);

///////////////////////end////////////////////

///////////////////////may////////////////////

///////////////////////end////////////////////
// app.get("/index", (req, res) => {
//     res.status(200).sendFile(path.join(__dirname, "views/index.php"));
//   });
// app.get("/user", (req, res) => {
//   res.status(200).sendFile(path.join(__dirname, "views/users/users.html"));
// });

// const server = https.createServer(options, app);

// server.listen(port, () => {
//     console.log("ERP server starting on port : " + port)
// });

app.listen(port, () => {
  console.log("ERP Running as port " + port);
});
