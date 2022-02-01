const mongoose = require('mongoose')
const Schema = mongoose.Schema

const StyleSchema = new Schema([{
  st_id: String,
  st_name: String,
}], { timestamps: true, versionKey: false })

const StyleModal = mongoose.model('tbl_style', StyleSchema)

module.exports = StyleModal