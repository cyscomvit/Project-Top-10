const CryptoJS = require('crypto-js');
const dotenv = require('dotenv').config();
const Encodejwt = (data , header) => {

    var secret = process.env.JWT_SECRET;
    
    function base64url(source) {

        encodedSource = CryptoJS.enc.Base64.stringify(source);
        
        encodedSource = encodedSource.replace(/=+$/, '');
        
        encodedSource = encodedSource.replace(/\+/g, '-');

        encodedSource = encodedSource.replace(/\//g, '_');
        
        return encodedSource;
    }

    var stringifiedHeader = CryptoJS.enc.Utf8.parse(JSON.stringify(header));

    var encodedHeader = base64url(stringifiedHeader);
    
    var stringifiedData = CryptoJS.enc.Utf8.parse(JSON.stringify(data));

    var encodedData = base64url(stringifiedData);

    var signature;
   
    if(header.alg == 'none'){

        signature = ''; 
    }
    else {
        
        signature = CryptoJS.HmacSHA256(encodedHeader + '.' + encodedData, secret);

        signature = base64url(signature);
    }

   var token = encodedHeader + "." + encodedData + "." + signature;

    return token;
}

const Decodejwt = (token) => {
    var base64HeaderUrl = token.split('.')[0];
    var base64Payload = token.split('.')[1];
    var payload = Buffer.from(base64Payload, 'base64');
    var header = Buffer.from(base64HeaderUrl, 'base64');

    var calculatedToken = Encodejwt(JSON.parse(payload.toString()) , JSON.parse(header.toString()));
    if(calculatedToken == token){
        return JSON.parse(payload.toString());
    }
    else {
        return 'Invalid Token';
    }
}
const sha256 = (data) => {
    return CryptoJS.SHA256(data).toString();
}

module.exports = {
    Encodejwt,
    Decodejwt,
    sha256,
}