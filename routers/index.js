
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

module.exports = app;