// init project
var express = require('express');
var app = express();

// http://expressjs.com/en/starter/static-files.html
//app.use(express.static('public'));
app.use(express.static('pet-shop'));

// http://expressjs.com/en/starter/basic-routing.html
app.get("/", function (request, response) {
  response.sendFile(__dirname + '/views/index.html');
});

/*
//Initialize cloud file manager which runs at http://url/cloudcmd
var cloudcommander = require("./cloudcmd.js");
cloudcommander.start(app, "/cloudcmd"); 
*/

// listen for requests
var listener = app.listen(process.env.PORT, function () {
  console.log('App started at port:' + listener.address().port);
});


