<html>
	<head>
		<title>Message</title>
	</head>
	<body>
		<?php
				$dbhost = 'localhost';
				$dbport = '27017';
				$dbname = 'itex';
				$c_clients = 'itex.clients';

				$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");
				$filter = $filter = ['login' =>$_GET['login']];

				$query = new MongoDB\Driver\Query($filter, []);
				$clients = $conn->executeQuery($c_clients , $query);
				
				foreach($clients as $client){
					echo $client->message;
				}
				
			?>
	</body>
</html>