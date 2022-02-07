const datauser=require('./../models/users');

let auth =(req,res,next)=>{
    let token =req.cookies.auth;
    datauser.findByToken(token,(err,user)=>{
        if(err) throw err;
        if(!user) return res.json({
            error :true
        });

        req.token= token;
        req.user=user;
        next();

    })
}

module.exports={auth};

