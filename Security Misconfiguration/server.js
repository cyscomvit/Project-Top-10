const express = require("express")
const session = require("express-session")
const mysql = require("mysql")
const bodyParser = require("body-parser")
const path = require("path")

const app = express()
app.use(
    session({
    secret: require("crypto").randomBytes(64).toString("hex"),
    resave: true,
    saveUninitialized: true,
}));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

app.use(express.static(path.join(__dirname+"/public")));

const con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "Mysql1234*",
    database: "nodejs"
});

con.connect(function(err) {
    if (err){
        console.error('error connecting: ' + err.stack);
        return;
    }
    console.log("Connected!");
});

app.listen(5000, function(err){
    if (err) {
        console.log(err);
    }
    else {
        console.log("Server listening on PORT 5000");
    }
});

app.post('/', function(req, res){
    const data = req.body;
    if (data.username && data.pswd){
        con.query("select * from loginuser where username = '"+data.username+"' and password = '"+data.pswd+"';", function (err, result) {
            if (err) {
                console.log(err.message);
                res.header("err",JSON.stringify(err));
                res.send('Incorrect Username and/or Password!');
                res.end();
                return;
            }
            if (result.length > 0){
                req.session.loggedin = true;
                req.session.username = result[0].username;
                res.redirect("/welcome");
            }else{
                res.send("Incorrect Username and/or Password!");
            }
            res.end();
        });
    }else{
        res.send("Please enter Username and Password!");
        res.end();
    }
});

app.get("/welcome",function(req,res){
    if (req.session.loggedin){
        if (req.session.username == 'admin'){
            res.send("<h3>Welcome back, " + req.session.username + "! flag:{s0meth1ng_1mp}</h3>");
        }
        else{
            res.send("<h3>Welcome back, " + req.session.username + "!</h3>");
        }
    }else{
        res.send("Please login to view this page!");
    }
    res.end();
})
