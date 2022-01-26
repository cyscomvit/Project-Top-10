const express = require('express');
const app = express();
const port = 3000;
const jwt = require('./jwt')
const cookieParser = require('cookie-parser');
const sprightly = require('sprightly');

app.engine('spy' , sprightly);
app.set('view engine' , 'spy');
app.set('views', './');
app.use(express.urlencoded({
    extended: true
  }))
  
  app.use(cookieParser());

app.get('/', (req, res) => {

    res.sendFile(__dirname + '/index.html')

});


app.post('/login' , (req, res) => {
    var data = {
        username : req.body.username,
        password: req.body.password
    }
    if(data.username == 'admin' && jwt.sha256(data.password) != '94c42c41c4f3a03190b742b652bfd75d874ddc0e1724f89e50e3518804efccee'){
        res.send('wrong password')
    }
    var token = jwt.Encodejwt(data , {
        alg: 'HS256',
        typ : 'JWT'
    });
    res.cookie('OWASP_JWT_Token', token);
    res.sendFile(__dirname + '/home.html')
});

app.get('/home' , (req, res) => {
    const token = req.cookies.OWASP_JWT_Token;
    if(token){
        var decoded = jwt.Decodejwt(token);
        if(decoded == 'Invalid Token'){
            res.send('Invalid token');
        }
        else if(decoded.username == 'admin'){
            res.render('challenge.spy', {message : "You are logged in as admin! Challenge completed!"});
        }
        else{
            res.render('challenge.spy', {message : "Your username is : " + decoded.username + " You are not admin , challenge failed!" });
        }
    }
    else {
        res.render('challenge.spy', {message : "You are not logged in!"});
    }

});

app.listen(port, () => console.log(`Example app listening on port ${port}!`));


