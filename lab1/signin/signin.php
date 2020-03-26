<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=itex', 'root', '1234');
$stmt = $dbh->prepare("insert into client values(null,?,?,?,?,?)");
$login = $_GET['login'];
$name = $_GET['name'];
$password = $_GET['password'];
$ip = $_GET['ip'];
$stmt->execute(array($login,$name,$password,$ip,0));
print "registered";