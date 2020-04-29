<?php
				$dbhost = 'localhost';
				$dbport = '27017';
                $dbname = 'itex';
                $c_clients = 'itex.clients';

				$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");
                $filter = ['balance'=>[ '$lt' => 0]];
				$query = new MongoDB\Driver\Query($filter, []);
				$clients = $conn->executeQuery($c_clients , $query);
				
				foreach ($clients as $client) {
						echo "Name: $client->login <br> Balance: $client->balance<br>";
				}
			?>