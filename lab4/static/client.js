var socket = io.connect('http://localhost:3000');
$('#login-submit').on('click', () => {
    console.log(1);
    var userName = $('#user-name').val();
    socket.emit('createUser', userName);
});

$('#send-button').on('click', function () {
    var message = $('#message-input').val();
    socket.emit('message', message);
    $('#message-input').val(null);
});

socket.on('messageToClients', function (msg, name) {
    console.log(name + '| => ' + msg);
    $('textarea').val($('textarea').val() + name + ': ' + msg + '\n');
});

socket.on('userName', (userName) => {
    $('textarea').val($('textarea').val() + 'You\'r username => ' + userName + '\n');
    $('#login-form').hide();
    $('#chat').show();
});

socket.on('newUser', (userName) => {
    $('textarea').val($('textarea').val() + userName + ' connected!\n');
});