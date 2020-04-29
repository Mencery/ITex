<html>
	<head>
		<title>Main</title>
	</head>
	<body>
	<form method="GET" action="getMessage.php">
		<label>Message from:</label>
		<select name="login">
			<?php
				$dbhost = 'localhost';
				$dbport = '27017';
				$dbname = 'itex';
				$c_clients = 'itex.clients';

				$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

				$query = new MongoDB\Driver\Query([], []);
				$clients = $conn->executeQuery($c_clients , $query);
				
				foreach ($clients as $client) {
						echo "<option>";
						echo $client->login;
						echo "</option>";
				}
			?>
		</select>
		<input type="submit" value="Ok"/>
    </form>
    <form method="GET" action="getTraffic.php">
		<label>Traffic to:</label>
		<select name="userName">
            <?php			
         $dbhost = 'localhost';
         $dbport = '27017';
         $dbname = 'itex';
         $c_clients = 'itex.clients';

         $conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

         $query = new MongoDB\Driver\Query([], []);
         $clients = $conn->executeQuery($c_clients , $query);
				foreach ($clients as $client) {
						echo "<option>";
						echo $client->login;
						echo "</option>";
				}
			?>
		</select>
		<input type="submit" value="Ok"/>
	</form>
	
	<form method="GET" action="getNagativeBalance.php">
		<label>Users with negative score:</label>
		<input type="submit" value="Ok"/>
    </form>
    <button id="clients">Get Clients</button>
    <div id="table">

    </div>
<script src="https://code.jquery.com/jquery-3.1.0.min.js" charset="utf-8"></script>
<script>
$( document ).ready(()=>{
    $.ajax({
        url: "getClientTable.php",
        method: "GET",
         success: function(clients) {
            localStorage.setItem("clients", clients);
        },
        error: function(){alert("Not found");}
        
      });
});
$("#clients").on("click",()=>{
   
    let clients  = localStorage.getItem("clients");
   
$("#table").html(clients);
});

</script>
	</body>
</html>