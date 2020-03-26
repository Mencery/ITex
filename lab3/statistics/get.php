<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=itex', 'root', '1234');
$stmt = $dbh->prepare("select start, finish, in_trafic, out_trafic from seanse where id_client =
(select id from client where login = ?)");
$login = $_GET['login'];

$stmt->execute(array($login));
$result =  "<table border='1'><tr><caption>$login<br></caption><th>start</th><th>finish</th><th>in_trafic</th><th>out_trafic</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $result= $result. "<tr><td>$row[start]</td><td>$row[finish]</td><td>$row[in_trafic]</td><td>$row[out_trafic]</td></tr>";
}
echo  $result;
?>