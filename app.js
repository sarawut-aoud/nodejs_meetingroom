const express = require("express");
const path = require('path');
const bodyParser = require('body-parser');
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
app.use(
    "/css",
    express.static(path.join(__dirname, "node_modules/bootstrap/dist/css")),
    express.static(path.join(__dirname, "plugins/fontawesome-free/css")),
    express.static(path.join(__dirname, "plugins/select2/css")),
    express.static(path.join(__dirname, "plugins/select2-bootstrap4-theme")),
    express.static(path.join(__dirname, "plugins/tempusdominus-bootstrap-4/css")),
    express.static(path.join(__dirname, "plugins/overlayScrollbars/css")),
    express.static(path.join(__dirname, "plugins/icheck-bootstrap")),
    express.static(path.join(__dirname, "plugins/daterangepicker")),
    express.static(path.join(__dirname, "plugins/summernote")),
    express.static(path.join(__dirname, "plugins/sweetalert2-theme-bootstrap-4")),
    express.static(path.join(__dirname, "plugins/toastr")),
    express.static(path.join(__dirname, "plugins/datatables-bs4/css")),
    express.static(path.join(__dirname, "plugins/datatables-responsive/css")),
    express.static(path.join(__dirname, "plugins/datatables-buttons/css")),
    express.static(path.join(__dirname, "plugins/fullcalendar")),
    express.static(path.join(__dirname, "plugins/fullcalendar-interactions")),
    express.static(path.join(__dirname, "plugins/fullcalendar-daygrid")),
    express.static(path.join(__dirname, "plugins/fullcalendar-timegrid")),
    express.static(path.join(__dirname, "plugins/fullcalendar-bootstrap"))
  );
  app.use(
    "/js",
    express.static(path.join(__dirname, "node_modules/jquery/dist")),
    express.static(path.join(__dirname, "node_modules/bootstrap/dist/js")),
    express.static(path.join(__dirname, "plugins/jquery-ui")),
    express.static(path.join(__dirname, "plugins/bootstrap/js")),
    express.static(path.join(__dirname, "plugins/select2/js")),
    express.static(path.join(__dirname, "plugins/moment")),
    express.static(path.join(__dirname, "plugins/daterangepicker")),
    express.static(path.join(__dirname, "plugins/tempusdominus-bootstrap-4/js")),
    express.static(path.join(__dirname, "plugins/summernote")),
    express.static(path.join(__dirname, "plugins/overlayScrollbars/js")),
    express.static(path.join(__dirname, "plugins/bootstrap-switch/js")),
    express.static(path.join(__dirname, "plugins/inputmask")),
    express.static(path.join(__dirname, "plugins/sweetalert2")),
    express.static(path.join(__dirname, "plugins/toastr")),
    express.static(path.join(__dirname, "plugins/datatables")),
    express.static(path.join(__dirname, "plugins/datatables-bs4/js")),
    express.static(path.join(__dirname, "plugins/datatables-responsive/js")),
    express.static(path.join(__dirname, "plugins/datatables-buttons/js")),
    express.static(path.join(__dirname, "plugins/fullcalendar")),
    express.static(path.join(__dirname, "plugins/fullcalendar-daygrid")),
    express.static(path.join(__dirname, "plugins/fullcalendar-timegrid")),
    express.static(path.join(__dirname, "plugins/fullcalendar-interaction")),
    express.static(path.join(__dirname, "plugins/fullcalendar-bootstrap"))
  );
  app.use(
    "/style",
    express.static(path.join(__dirname, "public/styles")),
    express.static(path.join(__dirname, "public/javascript")),
    express.static(path.join(__dirname, "public/images"))
  );
///////////////////////end////////////////////
app.get("/index", (req, res) => {
    res.status(200).sendFile(path.join(__dirname, "views/index_copy.html"));
  });
  app.get("/user", (req, res) => {
    res.status(200).sendFile(path.join(__dirname, "views/users/users.html"));
  });

// const server = https.createServer(options, app);

// server.listen(port, () => {
//     console.log("ERP server starting on port : " + port)
// });

app.listen(port, () => {
    console.log('ERP Running as port '+port);
})