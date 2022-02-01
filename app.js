const express = require("express");
const app = express();
const path = require('path');
const mongoose = require("mongoose");
const depart = require("./models/department");
const room = require("./models/product");
const style = require("./models/roomstyle");
const MONGODB_URI =
  process.env.MONGODB_URI || "mongodb://localhost:27017/db_demo";
const PORT = process.env.PORT || 4500;

mongoose.connect(MONGODB_URI, { useNewUrlParser: true });

mongoose.connection.on("error", (err) => {
  console.error("MongoDB error", err);
});

app.use(express.json());

app.use(
  "/css",
  express.static(path.join(__dirname, "node_modules/bootstrap/dist/css"))
);
app.use(
  "/js",
  express.static(path.join(__dirname, "node_modules/bootstrap/dist/js"))
);
app.use(
  "/js",
  express.static(path.join(__dirname, "node_modules/jquery/dist"))
);
app.use("/style", express.static(path.join(__dirname, "public/styles")));
app.use("/img", express.static(path.join(__dirname, "public/images")));


app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, 'views/index.html'))
});
 app.get("/user",(req, res)=>{
     res.sendFile(path.join(__dirname,'views/users.html'))
 })
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
    const product = await Product.findById(id);
    res.json(product);
  } catch (error) {
    res.status(400).json(error);
  }
});

app.post("/api", async (req, res) => {
  const payload = req.body;
  try {
    const product = new Product(payload);
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
    const product = await Product.findByIdAndUpdate(id, { $set: payload });
    res.json(product);
  } catch (error) {
    res.status(400).json(error);
  }
});

app.delete("/api/:id", async (req, res) => {
  const { id } = req.params;

  try {
    await Product.findByIdAndDelete(id);
    res.status(204).end();
  } catch (error) {
    res.status(400).json(error);
  }
});

app.listen(PORT, () => {
  console.log(`Application is running on port ${PORT}`);
});
