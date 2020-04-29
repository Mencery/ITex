<?php
				$dbhost = 'localhost';
				$dbport = '27017';
				$dbname = 'itex';
				$c_clients = 'itex.clients';

				$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");
				
				$query = new MongoDB\Driver\Query([], []);
                $clients = $conn->executeQuery($c_clients , $query);
                $result =  "<table border='1'><tr><th>login</th><th>ip</th><th>balance</th></tr>";
				foreach($clients as $client){
                    $result =  $result."<tr>";
                    $result =  $result. "<td>$client->login</td><td>$client->ip</td><td>$client->balance</td>";
                    $result =  $result."</tr>";
                }
                $result =  $result."</table>";
                echo $result;
				
			?>