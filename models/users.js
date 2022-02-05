const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const productSchema = new Schema(
  [
    {
      username: String,
      password: String,
      prefix: String,   //คำนำหน้า
      fname: String,    //ชื่อ
      lname: String,    //นามสกุล
      phone: String,    
      person_id: String,    //เลขบัตรประชาชน
      level: Number,    // ระดับผู้ใช้งาน 3
    },
  ],
  { timestamps: true, versionKey: false }
);

const ProductModel = mongoose.model("tbl_users", productSchema);

module.exports = ProductModel;
