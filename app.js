const express = require("express");
const app = express();
const path = require("path");
const mongoose = require("mongoose");
const depart = require("./models/department");
const room = require("./models/product");
const style = require("./models/roomstyle");
const staff = require("./models/staff");
const manager = require("./models/manager");
const datauser =require("./models/users");


const MONGODB_URI =
  process.env.MONGODB_URI || "mongodb://localhost:27017/db_demo";
const PORT = process.env.PORT || 4500;

mongoose.connect(MONGODB_URI, { useNewUrlParser: true });

mongoose.connection.on("error", (err) => {
  console.error("MongoDB error", err);
});

//! เรียกใช้ /"path"
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
  express.static(path.join(__dirname, "public/images")),
);

app.use(express.json());


//!  เรียกดูไฟล์ บน url 127.0.0.1:4500/
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "views/index.html"));
});

//todo => User ผู้ใช้
app.get("/user", (req, res) => {
  res.sendFile(path.join(__dirname, "views/users/users.html"));
});
//todo => User ผู้ใช้
app.get("/user-status", (req, res) => {
  res.sendFile(path.join(__dirname, "views/users/user_status.html"));
});

//todo => Staff ธุรการ
app.get("/staff", (req, res) => {
  res.sendFile(path.join(__dirname, "views/staff/staff.html"));
});
app.get("/request", (req, res) => {
  res.sendFile(path.join(__dirname, "views/staff/request.html"));
});

//todo => Manager หัวหน้า
app.get("/manage", (req, res) => {
  res.sendFile(path.join(__dirname, "views/manager/manager.html"));
});

// ! database
app.get("/data_manager", async (req, res) => {
  const data = await manager.find({});
  res.json(data);
});
app.get("/data_user", async (req, res) => {
  const data = await datauser.find({});
  res.json(data);
});
app.get("/data_staff", async (req, res) => {
  const data = await staff.find({});
  res.json(data);
});
// app.get("/style", async (req, res) => {
//   const data = await style.find({});
//   res.json(data);
// });
// app.get("/depart", async (req, res) => {
//   const data = await depart.find({});
//   res.json(data);
// });

// app.get("/api/:id", async (req, res) => {
//   const { id } = req.params;

//   try {
//     const data = await depart.findById(id);
//     res.json(data);
//   } catch (error) {
//     res.status(400).json(error);
//   }
// });

// {
//   "username": "manager4",
//   "password": "1234",
//    "prefix": "นาย",
//    "fname": "ศราวุธ4",
//    "lname": "อวดกล้า4",
//    "phone": "0979284920",
//    "person_id": "1160400251822",
//    "level": "1"
// }

app.post("/data_user", async (req, res) => {
  const payload = req.body;
  try {
    const data = new datauser(payload);
    await data.save();
    res.status(201).end();
  } catch (error) {
    res.status(400).json(error);
  }
});
app.post("/data_staff", async (req, res) => {
  const payload = req.body;
  try {
    const data = new staff(payload);
    await data.save();
    res.status(201).end();
  } catch (error) {
    res.status(400).json(error);
  }
});
app.post("/data_manager", async (req, res) => {
  const payload = req.body;
  try {
    const data = new manager(payload);
    await data.save();
    res.status(201).end();
  } catch (error) {
    res.status(400).json(error);
  }
});

// app.put("/api/:id", async (req, res) => {
//   const payload = req.body;
//   const { id } = req.params;

//   try {
//     const data = await depart.findByIdAndUpdate(id, { $set: payload });
//     res.json(data);
//   } catch (error) {
//     res.status(400).json(error);
//   }
// });

// app.delete("/api/:id", async (req, res) => {
//   const { id } = req.params;

//   try {
//     await depart.findByIdAndDelete(id);
//     res.status(204).end();
//   } catch (error) {
//     res.status(400).json(error);
//   }
// });

app.listen(PORT, () => {
  console.log(`Application is running on port ${PORT}`);
});
