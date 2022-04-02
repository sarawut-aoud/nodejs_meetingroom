const express = require("express");
const path = require("path");
const bodyParser = require("body-parser");
// const fs = require("fs");
// const https = require('https');
const cors = require("cors");
const port = 4200;

// const privateKey = fs.readFileSync('../ssl/wildcard_moph_go_th.key');
// const certificate = fs.readFileSync('../ssl/wildcard_moph_go_th.crt');
// const options = {key: privateKey, cert: certificate};

const app = express();

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

///////////////////////aof////////////////////
const login = require("./login/login_new");



///////////////////////aof////////////////////
app.use("/login", login);

///////////////////////end////////////////////
////! TAR /////
const meeting = require("./routers/events");
const depart = require("./routers/depart");
// const user = require("./routers/user");
// const level = require("./routers/level");
const tools = require("./routers/tools");
const rooms = require("./routers/room");
const style = require("./routers/roomstyle");
const event = require("./routers/events");
const event_post = require("./routers/event_post");
const event_put = require("./routers/event_put");
const seting = require("./routers/seting");
const setdevice = require("./routers/setdevice");


app.use("/event",event);
app.use("/seting",seting);
app.use("/setdevice",setdevice);
app.use("/event_post",event_post);
app.use("/event_put",event_put);
// app.use("/user", user);
// app.use("/level", level);
app.use("/depart", depart);
app.use("/meeting", meeting);
app.use("/tools", tools);
app.use("/rooms", rooms);
app.use("/style", style);
////! END ////

// const server = https.createServer(options, app);

// server.listen(port, () => {
//     console.log("ERP server starting on port : " + port)
// });
app.listen(port, () => {
  console.log("ERP Running as port " + port);
});
