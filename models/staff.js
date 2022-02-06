const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const productSchema = new Schema(
  [
    {
      uid: String,
      username: String,
      password: String,
      prefix: String, //คำนำหน้า
      fname: String, //ชื่อ
      lname: String, //นามสกุล
      phone: String,
      person_id: String, //เลขบัตรประชาชน
      de_id : Number,
      level: Number, // ระดับผู้ใช้งาน 2
    },
  ],
  { timestamps: true, versionKey: false }
);

const ProductModel = mongoose.model("tbl_staff", productSchema);

module.exports = ProductModel;
