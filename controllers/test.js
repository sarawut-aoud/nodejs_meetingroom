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