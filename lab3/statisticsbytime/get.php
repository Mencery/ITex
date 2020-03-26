<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=itex', 'root', '1234');
$stmt = $dbh->prepare("select login, start, finish, in_trafic, out_trafic 
from seanse inner join client on seanse.id_client = client.id
where start> ? and  finish< ?");
$from = $_GET['from'];
$to = $_GET['to'];
$stmt->execute(array($from,$to));
$xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$xml_output .= "<response>\n"; 
#$result = "<table border='1'><tr><th>login</th><th>start</th><th>finish</th><th>in_trafic</th><th>out_trafic</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $xml_output .= "\t<row>\n";
    $xml_output .= "\t\t<login>" . $row['login'] . "</login>\n";
    $xml_output .= "\t\t<start>" . $row['start'] . "</start>\n";
    $xml_output .= "\t\t<finish>" . $row['finish'] . "</finish>\n";
    $xml_output .= "\t\t<in_trafic>" . $row['in_trafic'] . "</in_trafic>\n";
    $xml_output .= "\t\t<out_trafic>" . $row['out_trafic'] . "</out_trafic>\n";
    $xml_output .= "\t</row>\n";
}
$xml_output .= "</response>\n";
echo  $xml_output;
