var mongoose = require("mongoose");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");
const confiq = require("../config/config_tar").get(process.env.NODE_ENV);
const salt = 10;

const userSchema = mongoose.Schema({
  uid: {
    type: String,
    required: true,
  },
  username: {
    type: String,
    required: true,
   
  },
  password: {
    type: String,
    required: true,
    minlength: 8,
  },
  password2: {
    type: String,
    required: true,
    minlength: 8,
  },
  prefix: {
    type: String,
    required: true,
    maxlength: 100,
  },
  fname: {
    type: String,
    required: true,
    maxlength: 100,
  },
  lname: {
    type: String,
    required: true,
    maxlength: 100,
  },
  phone: {
    type: String,
    required: true,
    maxlength: 14,
  },
  person_id: {
    type: String,
    required: true,
    maxlength: 13,
  },
  de_id :{
    type: String,
    required: true,
  },
  level:{
    type: Number,
    required: true,
  },
  token: {
    type: String,
  },
});

userSchema.pre("save", function (next) {
  var user = this;

  if (user.isModified("password")) {
    bcrypt.genSalt(salt, function (err, salt) {
      if (err) return next(err);

      bcrypt.hash(user.password, salt, function (err, hash) {
        if (err) return next(err);
        user.password = hash;
        user.password2 = hash;
        next();
      });
    });
  } else {
    next();
  }
});

//to login
userSchema.methods.comparepassword = function (password, cb) {
  bcrypt.compare(password, this.password, function (err, isMatch) {
    if (err) return cb(next);
    cb(null, isMatch);
  });
};

// generate token

userSchema.methods.generateToken = function (cb) {
  var user = this;
  var token = jwt.sign(user._id.toHexString(), confiq.SECRET);

  user.token = token;
  user.save(function (err, user) {
    if (err) return cb(err);
    cb(null, user);
  });
};

// find by token
userSchema.statics.findByToken = function (token, cb) {
  var user = this;

  jwt.verify(token, confiq.SECRET, function (err, decode) {
    user.findOne({ _id: decode, token: token }, function (err, user) {
      if (err) return cb(err);
      cb(null, user);
    });
  });
};

//delete token

userSchema.methods.deleteToken = function (token, cb) {
  var user = this;

  user.update({ $unset: { token: 1 } }, function (err, user) {
    if (err) return cb(err);
    cb(null, user);
  });
};

module.exports = mongoose.model("tbl_users", userSchema);
