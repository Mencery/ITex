
		<?php
				$dbhost = 'localhost';
				$dbport = '27017';
				$dbname = 'itex';
				$c_clients = 'itex.clients';
				$c_seanse = 'itex.seanse';
			
				$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

				$filter = ['login' => $_GET['userName']];
				$query = new MongoDB\Driver\Query($filter, []);
				$clients = $conn->executeQuery($c_clients , $query);
				
				foreach($clients as $client){
					$filter = ['clientIp' => $client->ip];
					
					$query = new MongoDB\Driver\Query($filter, []);
					$traffics = $conn->executeQuery($c_seanse , $query);
					foreach($traffics as $traffic){
						echo "Traffic for $client->login:<br>
								Input traffic: $traffic->amountOfInputTraffic <br> 
								Output traffic: $traffic->amountOfOutputTraffic";
					}
				}
			?>