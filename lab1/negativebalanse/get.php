<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=itex', 'root', '1234');
$stmt =  "select login, name, balance from  client where balance<0";
print "<table border='1'><tr><th>login</th><th>name</th><th>balance</th></tr>";;
foreach ($dbh->query($stmt) as $row){
    print "<tr><td>$row[login]</td><td>$row[name]</td><td>$row[balance]</td></tr>";
}
print "</table>";

