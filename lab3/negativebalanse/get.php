<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=itex', 'root', '1234');
$stmt =  $dbh->prepare("select login, name, balance from  client where balance<0");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo  $json ;
