const mongoose = require('mongoose')
const Schema = mongoose.Schema

const dataSchema = new Schema({
  de_id: String,
  de_name: String,
  de_phone: String
}, { timestamps: true, versionKey: false })

const dataModal = mongoose.model('tbl_department', dataSchema)

module.exports = dataModal