const express = require("express");
const path = require("path");
const bodyParser = require("body-parser");
// const fs = require("fs");
// const https = require('https');
const cors = require("cors");
const port = 4500;

// const privateKey = fs.readFileSync('../ssl/wildcard_moph_go_th.key');
// const certificate = fs.readFileSync('../ssl/wildcard_moph_go_th.crt');
// const options = {key: privateKey, cert: certificate};

const app = express();

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

///////////////////////aof////////////////////
const login = require("./login/login");

// const signature = require("./hr/signature");
// const officeToken = require("./hr/office-token");
// const hrPersonal = require("./hr/personal");

// const rsAsset = require("./resource/asset");
// const rsItems = require("./resource/items");
// const rsOfficeName = require("./resource/office-name");
// const rsTransfer = require("./resource/asset-transfer");

// const fixGrpToken = require("./fix/fix-group");
// const fixRequest = require("./fix/fix-request");
// const fixRespond = require("./fix/fix-respond");
// const fixImage = require("./fix/fix-images");
// const fixService = require("./fix/fix-service");
// const fixLists = require("./fix/fix-lists");
// const fixSpares = require("./fix/fix-spares");
// const fixStatus = require("./fix/fix-status");
// const fixType = require("./fix/fix-type");
// const fixHistory = require("./fix/fix-history");
// const fixTransfer = require("./fix/fix-transfer");
// const fixStaff = require("./fix/fix-staff");
// // const fixTeam = require("./fix/fix-team");
// const fixDeppartment = require("./fix/fix-department");
// const fixPosition = require("./fix/fix-position");
// const fixPlan = require("./fix/fix-plan");
// // const fixCause = require("./fix/fix-cause");
// // const fixApproved = require("./fix/fix-approved");

// const spProperty = require("./supplies/property");
// const fix_report = require("./fix/fix-report");
// ///////////////////////end////////////////////

// ///////////////////////may////////////////////

// var academic = require('./hr/academic');
// var senior = require('./hr/senior');
// var prefix = require('./hr/prefix');
// var degree = require('./hr/degree');
// var blood = require('./hr/blood');
// var leave_status = require('./hr/leave_status');

// var cult = require('./hr/cult');
// var state = require('./hr/state');
// var typeposition = require('./hr/typeposition');
// var typeacademic = require('./hr/typeacademic');
// var positions = require('./hr/positions');
// var money = require('./hr/money');
// var state_work = require('./hr/state_work');
// var faction = require('./hr/faction');
// var depart = require('./hr/depart');
// var ward = require('./hr/ward');
// var express01 = require('./hr/express01');
// var doctor = require('./hr/doctor');
// var regis = require('./hr/regis');
// var leave_edit = require('./hr/leave_edit');
// var office_sit = require('./hr/office_sit');
// var checkperson = require('./hr/checkperson');
// var checkuser = require('./hr/checkuser');
// var province = require('./hr/province');
// var amphur = require('./hr/amphur');
// var tumbon = require('./hr/tumbon');
// var duty = require('./hr/duty');
// var po_work = require('./hr/po_work');
// var po_level = require('./hr/po_level');
// var po_group = require('./hr/po_group');
// var year = require('./hr/year');
// var cancel_leave = require('./hr/cancel_leave');
// var leave = require('./leave/leave');
// var appleave = require('./leave/appleave');
// var cleave = require('./leave/cleave');
// var holiday_check = require('./leave/holiday_check');
// var leave_sum_report = require('./leave/leave_sum_report');
// var leave_h_app = require('./hr/leave_h_app');
// var restday = require('./hr/restday');
// var employee = require('./employee/employee');
// var employee_signature = require('./employee/employee_signature');
// var leave_heading = require('./hr/leave_heading');

// var kpi_heading = require('./kpi/kpi_heading');
// var kpi_sub_heading = require('./kpi/kpi_sub_heading');
// var kpi_subdetails_heading = require('./kpi/kpi_subdetails_heading');
// var kpi_estimate = require('./kpi/kpi_estimate');
// var kpi_hname = require('./kpi/kpi_hname');
// var kpi_s_heading = require('./kpi/kpi_s_heading');
// var kip_d_heading = require('./kpi/kip_d_heading');
// var kpi_gheading = require('./kpi/kpi_gheading');
// var kpi_rate = require('./kpi/kpi_rate');

///////////////////////end////////////////////

///////////////////////aof////////////////////
app.use("/login", login);

// app.use("/hr/signature", signature);
// app.use("/hr/office-token", officeToken);
// app.use("/hr/personal", hrPersonal);
// app.use("/hr/personal/names", hrPersonal);

// app.use("/resource/asset", rsAsset);
// app.use("/resource/items", rsItems);
// app.use("/resource/items/no", rsItems);
// app.use("/resource/items/name", rsItems);
// app.use("/resource/items/office", rsItems);
// app.use("/resource/office", rsOfficeName);
// app.use("/resource/transfer", rsTransfer);

// app.use("/fix/group", fixGrpToken);
// app.use("/fix/group/names", fixGrpToken);
// app.use("/fix/group/token", fixGrpToken);
// app.use("/fix/request", fixRequest);
// app.use("/fix/respond", fixRespond);
// app.use("/fix/respond/computer", fixRespond);
// app.use("/fix/respond/maintenance", fixRespond);
// app.use("/fix/images", fixImage);
// app.use("/fix/images/name", fixImage);
// app.use("/fix/respond/computer", fixRespond);
// app.use("/fix/service", fixService);
// app.use("/fix/service/computer", fixService);
// app.use("/fix/service/maintenance", fixService);
// app.use("/fix/lists", fixLists);
// app.use("/fix/lists/totals", fixLists);
// app.use("/fix/lists/fix", fixLists);
// app.use("/fix/lists/details", fixLists);
// app.use("/fix/lists/spares", fixLists);
// app.use("/fix/lists/years", fixLists);
// app.use("/fix/spares", fixSpares);
// app.use("/fix/spares/computer", fixSpares);
// app.use("/fix/spares/maintenance", fixSpares);
// app.use("/fix/spares/medical", fixSpares);
// app.use("/fix/spares/lists", fixSpares);
// app.use("/fix/spares/detail", fixSpares);
// app.use("/fix/status", fixStatus);
// app.use("/fix/status/status", fixStatus);
// app.use("/fix/status/groups", fixStatus);
// app.use("/fix/type", fixType);
// app.use("/fix/type/group", fixType);
// app.use("/fix/type/type", fixType);
// app.use("/fix/history", fixHistory);
// app.use("/fix/history/history", fixHistory);
// app.use("/fix/history/status", fixHistory);
// app.use("/fix/history/cost", fixHistory);
// app.use("/fix/transfer", fixTransfer);
// app.use("/fix/transfer/transfer", fixTransfer);
// app.use("/fix/transfer/deliver", fixTransfer);
// app.use("/fix/staff", fixStaff);
// app.use("/fix/staff/names", fixStaff);
// app.use("/fix/staff/level", fixStaff);
// app.use("/fix/staff/line", fixStaff);
// // app.use("/fix/teams/", fixTeam);
// // app.use("/fix/teams/names", fixTeam);
// app.use("/fix/department", fixDeppartment);
// app.use("/fix/department/names", fixDeppartment);
// app.use("/fix/position", fixPosition);
// app.use("/fix/position/names", fixPosition);
// app.use("/fix/plan", fixPlan);
// app.use("/fix/plan/plan", fixPlan);
// app.use("/fix/plan/lists", fixPlan);
// // app.use("/fix/cause", fixCause);
// // app.use("/fix/cause/lists", fixCause);
// // app.use("/fix/approved", fixApproved);
// // app.use("/fix/approved/lists", fixApproved);

// app.use("/supplies/property", spProperty);
// app.use("/supplies/property/property", spProperty);
// app.use("/supplies/property/depreciation", spProperty);
// app.use("/supplies/property/image", spProperty);

// app.use("/fix/fix_report", fix_report);
// app.use("/images/fix", express.static(path.join(__dirname, "uploads/fix")));

///////////////////////end////////////////////

///////////////////////may////////////////////

// app.use('/academic',academic);
// app.use('/senior',senior);
// app.use('/prefix',prefix);
// app.use('/degree',degree);
// app.use('/blood',blood);
// app.use('/leave_status',leave_status);
// app.use('/cult',cult);
// app.use('/state',state);
// app.use('/typeposition',typeposition);
// app.use('/typeacademic',typeacademic);
// app.use('/positions',positions);
// app.use('/money',money);
// app.use('/state_work',state_work);
// app.use('/faction',faction);
// app.use('/depart',depart);
// app.use('/ward',ward);
// app.use('/express01',express01);
// app.use('/doctor',doctor);
// app.use('/regis',regis);
// app.use('/leave_edit',leave_edit);

// app.use('/office_sit',office_sit);
// app.use('/checkperson',checkperson);
// app.use('/checkuser',checkuser);
// app.use('/province',province);
// app.use('/amphur',amphur);
// app.use('/tumbon',tumbon);
// app.use('/duty',duty);
// app.use('/po_work',po_work);
// app.use('/po_level',po_level);
// app.use('/po_group',po_group);
// app.use('/year',year);
// app.use('/leave',leave);
// app.use('/appleave',appleave);
// app.use('/cleave',cleave);
// app.use('/holiday_check',holiday_check);
// app.use('/leave_h_app',leave_h_app);

// app.use('/employee',employee);
// app.use('/employee_signature',employee_signature);

// app.use('/leave_heading',leave_heading);
// app.use('/cancel_leave',cancel_leave);

// app.use('/kpi_heading',kpi_heading);
// app.use('/kpi_sub_heading',kpi_sub_heading);
// app.use('/kpi_subdetails_heading',kpi_subdetails_heading);
// app.use('/kpi_estimate',kpi_estimate);
// app.use('/kpi_hname',kpi_hname);
// app.use('/kpi_s_heading',kpi_s_heading);
// app.use('/kip_d_heading',kip_d_heading);
// app.use('/kpi_gheading',kpi_gheading);
// app.use('/kpi_rate',kpi_rate);

// app.use('/leave_sum_report',leave_sum_report);
// app.use('/restday',restday);

///////////////////////end////////////////////
////! TAR /////
const meeting = require("./routers/events");
const depart = require("./routers/depart");
const user = require("./routers/user");
const level = require("./routers/level");
const tools = require("./routers/tools");
const rooms = require("./routers/room");
const style = require("./routers/roomstyle");
const event = require("./routers/events");
const event_post = require("./routers/event_post");


app.use("/event",event);
app.use("/event_post",event_post);
app.use("/user", user);
app.use("/level", level);
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
