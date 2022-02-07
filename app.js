const express = require("express");
const bodyparser = require("body-parser");
const cookieParser = require("cookie-parser");
const path = require("path");
const mongoose = require("mongoose");
const { auth } = require("./middlewares/auth");

const depart = require("./models/department");
const room = require("./models/product");
const style = require("./models/roomstyle");
const staff = require("./models/staff");
const manager = require("./models/manager");
const datauser = require("./models/users");

const app = express();
//app use
app.use(bodyparser.urlencoded({ extended: false }));
app.use(bodyparser.json());
app.use(cookieParser());

const db = require("./config/config").get(process.env.NODE_ENV);
// database connection
mongoose.Promise = global.Promise;
mongoose.connect(
  db.DATABASE,
  { useNewUrlParser: true, useUnifiedTopology: true },
  function (err) {
    if (err) console.log(err);
    console.log("database is connected");
  }
);

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
  express.static(path.join(__dirname, "public/images"))
);

app.use(express.json());

//!  เรียกดูไฟล์ บน url 127.0.0.1:4500/
app.get("/", (req, res) => {
  res.status(200).sendFile(path.join(__dirname, "views/index.html"));
});

//todo => User ผู้ใช้
app.get("/user", (req, res) => {
  res.status(200).sendFile(path.join(__dirname, "views/users/users.html"));
});
//todo => User ผู้ใช้
app.get("/user-status", (req, res) => {
  res
    .status(200)
    .sendFile(path.join(__dirname, "views/users/user_status.html"));
});

//todo => Staff ธุรการ
app.get("/staff", (req, res) => {
  res.status(200).sendFile(path.join(__dirname, "views/staff/staff.html"));
});
app.get("/request", (req, res) => {
  res.status(200).sendFile(path.join(__dirname, "views/staff/request.html"));
});

//todo => Manager หัวหน้า
app.get("/manage", (req, res) => {
  res.status(200).sendFile(path.join(__dirname, "views/manager/manager.html"));
});
require("./routers/routes")(app);

// adding new user (sign-up route)
app.post("/api/register", function (req, res) {
  // taking a user
  const newuser = new datauser(req.body);
  console.log(newuser);

  if (newuser.password != newuser.password2)
    return res.status(400).json({ message: "password not match" });

  datauser.findOne({ username: newuser.username }, function (err, user) {
    if (user)
      return res.status(400).json({ auth: false, message: "username exits" });

    newuser.save((err, doc) => {
      if (err) {
        console.log(err);
        return res.status(400).json({ success: false });
      }
      res.status(200).json({
        succes: true,
        user: doc,
      });
    });
  });
});
// login user
app.post("/api/login", function (req, res) {
  let token = req.cookies.auth;
  datauser.findByToken(token, (err, user) => {
    if (err) return res(err);
    if (user)
      return res.status(400).json({
        error: true,
        message: "You are already logged in",
      });
    else {
      datauser.findOne({ username: req.body.username }, function (err, user) {
        if (!user)
          return res.json({
            isAuth: false,
            message: " Auth failed ,email not found",
          });

        user.comparepassword(req.body.password, (err, isMatch) => {
          if (!isMatch)
            return res.json({
              isAuth: false,
              message: "password doesn't match",
            });

          user.generateToken((err, user) => {
            if (err) return res.status(400).send(err);
            res.cookie("auth", user.token).json({
              isAuth: true,
              id: user._id,
              username: user.username,
            });
          });
        });
      });
    }
  });
});

//logout user
app.get("/api/logout", auth, function (req, res) {
  req.user.deleteToken(req.token, (err, user) => {
    if (err) return res.status(400).send(err);
    res.sendStatus(200).sendFile(path.join(__dirname, "views/index.html"));
  });
});
// get logged in user
app.get("/api/profile", auth, function (req, res) {
  res.json({
    isAuth: true,
    id: req.user._id,
    username: req.user.username,
    name: req.user.fname +' '+ req.user.lname,
    level: req.user.level,
    de_id: req.user.de_id, 
  });
});
// ! database
// app.get("/data_manager", async (req, res) => {
//   const data = await manager.find({});
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

// app.post("/data_user", async (req, res) => {
//   const payload = req.body;
//   try {
//     const data = new datauser(payload);
//     await data.save();
//     res.status(201).end();
//   } catch (error) {
//     res.status(400).json(error);
//   }
// });

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

const PORT = process.env.PORT || 4500;
app.listen(PORT, () => {
  console.log(`Application is running on port ${PORT}`);
});
