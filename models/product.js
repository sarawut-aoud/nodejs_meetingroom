const mongoose = require('mongoose')
const Schema = mongoose.Schema

const productSchema = new Schema([{
  ro_id: String,
  ro_name: String,
  ro_people: Number,
  ro_detail: String
}], { timestamps: true, versionKey: false })

const ProductModel = mongoose.model('tbl_room', productSchema)

module.exports = ProductModel