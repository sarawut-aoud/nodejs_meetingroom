const mysql = require("mysql");

const con = mysql.createConnection({
    host: '127.0.0.1', //192.168.9.7
    user: 'root', //erp
    password: '', //Erp@PhetchabunHospital
    database: 'db_asset', 
    charset: 'utf8'
})   

con.connect((err) => {
    if (err) {
        console.error('Error connecting : '+err.stack)
        return
    } 

    con.query("SET NAMES UTF8");
    console.log('Connected as ID : '+con.threadId)
})

module.exports = con

// mongodb
// const config={
//     production :{
//         SECRET: process.env.SECRET,
//         DATABASE: process.env.MONGODB_URI
//     },
//     default : {
//         SECRET: 'mysecretkey',
//         DATABASE: 'mongodb://localhost:27017/db_demo'
//     }
// }


// exports.get = function get(env){
//     return config[env] || config.default
// }