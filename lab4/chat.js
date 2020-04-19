var express = require("express"); // отдельная переменная для удобства
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var fs = require('fs');
var path = require('path');
var port = 3000;

app.use("/static", express.static('./static/'));

app.get('/', function (req, res) {
    res.sendFile(__dirname + '/index.html');
});
io.on('connection', (socket) => {
    var name;
    socket.on('createUser', (userName) => {
        if (!userName) {
            userName = 'U' + (socket.id).toString().substr(1, 4);
        }
        name = userName;
        socket.broadcast.emit('newUser', name );
        socket.emit('userName',  name );
    });
    socket.on('message', (msg) => {
        io.sockets.emit('messageToClients', msg, name);
    });

});

http.listen(port, () => {
    console.log("app runing on port:" + port);
})