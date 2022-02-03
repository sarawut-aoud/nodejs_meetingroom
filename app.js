const express = require("express");
const app = express();
const path = require("path");
const mongoose = require("mongoose");
const depart = require("./models/department");
const room = require("./models/product");
const style = require("./models/roomstyle");
const { url } = require("inspector");

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
  express.static(path.join(__dirname, "plugins/sweetalert2")),
  express.static(path.join(__dirname, "plugins/toastr")),

);
app.use(
  "/style",
  express.static(path.join(__dirname, "public/styles")),
  express.static(path.join(__dirname, "public/javascript")),
  express.static(path.join(__dirname, "public/images"))
);

app.use(express.json());


//!  เรียกดูไฟล์ บน url
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "views/index.html"));
});
app.get("/user", (req, res) => {
  res.sendFile(path.join(__dirname, "views/users.html"));
});
app.get("/manage", (req, res) => {
  res.sendFile(path.join(__dirname, "views/manager.html"));
});

// ! database
 app.get("/room", async (req, res) => {
   const products = await room.find({});
   res.json(products);
 });
app.get("/style", async (req, res) => {
  const products = await style.find({});
  res.json(products);
});
app.get("/depart", async (req, res) => {
  const products = await depart.find({});
  res.json(products);
});

app.get("/api/:id", async (req, res) => {
  const { id } = req.params;

  try {
    const product = await depart.findById(id);
    res.json(product);
  } catch (error) {
    res.status(400).json(error);
  }
});

app.post("/api", async (req, res) => {
  const payload = req.body;
  try {
    const product = new depart(payload);
    await product.save();
    res.status(201).end();
  } catch (error) {
    res.status(400).json(error);
  }
});

app.put("/api/:id", async (req, res) => {
  const payload = req.body;
  const { id } = req.params;

  try {
    const product = await depart.findByIdAndUpdate(id, { $set: payload });
    res.json(product);
  } catch (error) {
    res.status(400).json(error);
  }
});

app.delete("/api/:id", async (req, res) => {
  const { id } = req.params;

  try {
    await depart.findByIdAndDelete(id);
    res.status(204).end();
  } catch (error) {
    res.status(400).json(error);
  }
});

app.listen(PORT, () => {
  console.log(`Application is running on port ${PORT}`);
});
