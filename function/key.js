const con = require('../config/config');
const mysql = require('mysql');
// const ip = require('ip');
const hostname = require('hostname');
// const fs = require('fs');
const path = require('path');
//const { response } = require('express');

exports.maxID = function (column, table) {
    const date = new Date();
    const month = ("0" + (date.getMonth() + 1)).slice(-2);
    const year = (date.getFullYear()+543).toString().substr(2,2);
    const max = year.toString()+month.toString();
    let newID = '';
    var id = '';
    var id_new = '';
        
    return new Promise(resolve => {
        const sql = "SELECT MAX(" + column + ") AS MaxID FROM " + table;
        const params = [column, table]
        con.query(sql, params, (err, rows) => {
            newID = rows[0].MaxID;
            
            if (newID == null || newID == "") {
                id = max+"00001";
            } else {
                id_new = newID.toString().substr(0, 4);
    
                if (id_new == max) {
                    newID = (newID + 1);
                    newID = newID.toString().substr(4, 5);
                    id = max+newID;
                } else {
                    id = max+"00001";    
                }
            }

            resolve(id);
        });
    });
};

exports.fiscalID = function (column, table) {
    const date = new Date();
    const month = ("0" + (date.getMonth() + 1)).slice(-2);
    let year = date.getFullYear()+543;

    if (month == 10 || month == 11 || month == 12) {
        year = (year + 1).toString().substr(2,2);
    } else {
        year = year.toString().substr(2,2);
    }

    let newID = '';
    var id = '';
    var id_new = '';
        
    return new Promise(resolve => {
        const sql = "SELECT MAX(" + column + ") AS MaxID FROM " + table;
        const params = [column, table]
        con.query(sql, params, (err, rows) => {
            newID = rows[0].MaxID;
            
            if (newID == null || newID == "") {
                id = year+"0001";
            } else {
                id_new = newID.toString().substr(0, 2);
                
                if (id_new == year) {
                    newID = (newID + 1);
                    newID = newID.toString().substr(2, 4);
                    id = year+newID;
                } else {
                    id = year+"0001";    
                }
            }

            resolve(id);
        });
    });
};

exports.fiscalYear = function (req_date) {
    if (req_date != "") {
        let date = req_date.split('-');
        let year = parseInt(date[0])+543;
        let month = date[1];

        if (month == 10 || month == 11 || month == 12) {
            year = (year + 1);
        } else {
            year = year;
        }
        
        return year;
    } else {
        const date = new Date();
        const month = ("0" + (date.getMonth() + 1)).slice(-2);
        let year = date.getFullYear()+543;

        if (month == 10 || month == 11 || month == 12) {
            year = (year + 1);
        } else {
            year = year;
        }

        return year;
    }
};

exports.getDate = function () {
    const date = new Date();
    const day = ("0" + date.getDate()).slice(-2);
    const month = ("0" + (date.getMonth() + 1)).slice(-2);
    const year = date.getFullYear();

    return year + '-' + month + '-' + day;
};

exports.getTime = function () {
    const date = new Date();
    const hours = ("0" + date.getHours()).slice(-2);
    const min = ("0" + date.getMinutes()).slice(-2);
    const sec = ("0" + date.getSeconds()).slice(-2);

    return hours + min + sec;
};

exports.fileUpload = function (fileOldPath, fileNewPath, fileName, fileType, fileSize) {
    // let extArr = fileType.split('/');
    // let ext = extArr[extArr.length-1];

    return new Promise((resolve, reject) => {
        fs.readFile(fileOldPath, function (err, data) {
            const newPath = path.join(__dirname, '../uploads/' + fileNewPath + '/', fileName);
            
            if (!fileType.match(/\/(jpg|jpeg|png)$/)) {
                resolve("รองรับเฉพาะไฟล์นามสกุล\r\nPNG/JPG/JPEG เท่านั้น!");
            } else {
                if (fileSize > 2000000) {
                    resolve("รองรับไฟล์ขนาดไม่เกิน 2 MB เท่านั้น!");                
                } else {
                    fs.writeFile(newPath, data, function (err) {
                        if (err) {
                            resolve("ไม่สามารถ Upload ไฟล์ได้!");
                        } 
                        
                        resolve("1");
                    });                
                }
            }
        }); 
    });
};

exports.dataLog = function (opt, table, cmd, user) {
    const ipAddress = ip.address();
    const hostName = hostname();
    const sql = "INSERT INTO log "
                +"(log_opt, log_table, log_cmd, log_user, log_hostname, log_ip, log_time) "
                +"VALUES "
                +"(?, ?, ?, ?, ?, ?, ?) ";
    const CURRENT_TIMESTAMP = mysql.raw('now()');
    const params = [opt, table, cmd, user, hostName, ipAddress, CURRENT_TIMESTAMP]
    con.query(sql, params, (err,rows) => {
        
    });
};
////////may/////

exports.Year = function (req_date) {
    if (req_date != "") {
        let date = req_date.split('-');
        let year = parseInt(date[0]);
        let month = date[1];

        if (month == 10 || month == 11 || month == 12) {
            year = (year + 1);
        } else {
            year = year;
        }
        
        return year;
    } else {
        const date = new Date();
        const month = ("0" + (date.getMonth() + 1)).slice(-2);
        let year = date.getFullYear();

        if (month == 10 || month == 11 || month == 12) {
            year = (year + 1);
        } else {
            year = year;
        }

        return year;
    }
};