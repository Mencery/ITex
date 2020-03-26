<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=itex', 'root', '1234');
$stmt = $dbh->prepare("select login, start, finish, in_trafic, out_trafic 
from seanse inner join client on seanse.id_client = client.id
where start> ? and  finish< ?");
$from = $_GET['from'];
$to = $_GET['to'];
$stmt->execute(array($from,$to));

$result = "<table border='1'><tr><th>login</th><th>start</th><th>finish</th><th>in_trafic</th><th>out_trafic</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $result .= "<tr><td> $row[login]</td><td> $row[start]</td><td>$row[finish]</td>
    <td>$row[in_trafic]</td><td> $row[out_trafic]</td></tr>";
}
$result .="</table>";
echo  $result;
