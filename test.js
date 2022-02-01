// app.js
var createError = require("http-errors");
const express = require("express");
const path = require("path");
const mongoose = require("mongoose");
const Product = require("./models/product");
mongoose.connect("mongodb://localhost:27017/db_demo", {
  useNewUrlParser: true,
});

const app = express();

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
// app.use('/link',express.static(path.join(__dirname,'views')))

// app.get("/", (req, res) => {
//     res.sendFile(path.join(__dirname, 'views/index.html'))
// });
// app.get("/user",(req, res)=>{
//     res.sendFile(path.join(__dirname,'views/users.html'))
// })

app.use(express.json());

// // สร้าง database schema
// const Cat = mongoose.model('Cat', { name: String })

// // สร้าง instance จาก model
// const kitty = new Cat({ name: 'JavaScript' })

// // save ลง database (return เป็น Promise)
// kitty.save().then(() => console.log('meow'))

// app.listen(4500, () => {
//     console.log('Listening on port ' + 4500);
// });

// mock data
const api = [{}];

// post
app.post("/api", async (req, res) => {
  const payload = req.body;
  const product = new Product(payload);
  await product.save();
  res.status(201).end();
});

//get
// Product.find({ ro_id: '1' })
app.get("/api/:id", async (req, res) => {
  const { id } = req.params;
  const product = await Product.findById(id);
  res.json(product);
});

// update
const data = {
    $set: {
      newValue: 'new data'
    }
  }
  Product.findByIdAndUpdate('ObjectId', data)

  app.put('/api/:id', async (req, res) => {
    const payload = req.body
    const { id } = req.params
  
    const product = await Product.findByIdAndUpdate(id, { $set: payload })
    res.json(product)
  })

  app.delete('/products/:id', async (req, res) => {
    const { id } = req.params
  
    await Product.findByIdAndDelete(id)
    res.status(204).end()
  })
  
// run app
app.listen(9000, () => {
  console.log("Application is running on port 9000");
});
