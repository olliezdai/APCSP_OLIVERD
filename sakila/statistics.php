<!DOCTYPE HTML>
<html>
<title></title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="maindiv">
            <div class="divA">
                <div class="title"><h2>Statistics</h2></div>
                <div class="divB">
					<?php                        
						$connection = mysqli_connect("localhost", "root", "", "sakila");
						$customersQuery = mysqli_query($connection, "SELECT customer_id FROM RENTAL");
						
						$topWhat = 10;
						$topArr = [0];
						$topArr = array_pad($topArr, $topWhat, 0);
						$topCustArr = [0];
						$topCustArr = array_pad($topCustArr, $topWhat, 0);
						
						$counterID = 1;
						$counterNum = 0;
						while ($row = mysqli_fetch_array($customersQuery)) 
						{
							#Assumes that customersQuery is sorted by customer_id
							if($row['customer_id'] == $counterID){
								$counterNum =  $counterNum + 1;
							}else{
									#echo "<p>*</br>{$counterID} {$counterNum}</br> * </p>";
								for($i = 0; $i < 10; $i++){
									if($counterNum > $topArr[$i]){
										for($j = sizeof($topArr)-2; $j > $i-1; $j--){
											$topArr[$j+1] = $topArr[$j];
											$topCustArr[$j+1] = $topCustArr[$j];
										}
										$topArr[$i] = $counterNum;
										$topCustArr[$i] = $counterID;
										#foreach($topCustArr as $value){
										#	echo "<p>{$value}</p>";
										#}
										#for($k = 0; $k < 10; $k++){
										#	echo "<p>{$topCustArr[$k]} - {$topArr[$k]}</p>";
										#}
										break;
									}
								}
								$counterID = $row[0];
								$counterNum = 1;
							}
                        }
						#Print now-finished array of customers and their rental counts
						echo "<b>TOP $topWhat CUSTOMERS: </b><br/>";
						echo "<table style=\"width:25%; border: 1px solid black;border-collapse: collapse;\">
								<tr style=\"border: 1px solid black;\">
									<td ><b>Name</b></td>
									<td style=\"border: 1px solid black;\"><b>Rentals</b></td>
								</tr>";
						
						for($k = 0; $k < 10; $k++){
							$queryFinal = mysqli_query($connection, "SELECT first_name, last_name FROM customer WHERE customer_id='{$topCustArr[$k]}'");
							$nameArray = mysqli_fetch_array($queryFinal);
							#echo "<p>{$topCustArr[$k]} - {$nameArray['first_name']} {$nameArray['last_name']} --- Number of rentals: {$topArr[$k]}</p>";
							echo "
								<tr>
									<td>{$nameArray['first_name']} {$nameArray['last_name']}</td>
									<td style=\"border-left: 1px solid black;border-right: 1px solid black; padding-left: 8px;\">{$topArr[$k]}</td>
								</tr>
							";
						}
						echo "</table>";
						
						$queryActors = mysqli_query($connection,
							"SELECT first_name, last_name, count(*) films FROM actor JOIN film_actor USING (actor_id) 
							GROUP BY actor_id, first_name, last_name ORDER BY films DESC LIMIT 10"
						);
						
						#START ACTOR TABLE
						echo "</br>";
						echo "<b>TOP 10 Actors: </b><br/>";
						echo "<table style=\"width:25%; border: 1px solid black;border-collapse: collapse;\">
								<tr style=\"border: 1px solid black;\">
									<td ><b>Name</b></td>
									<td style=\"border: 1px solid black;\"><b>Films</b></td>
								</tr>";
						while($row = mysqli_fetch_array($queryActors)){
							echo "
								<tr>
									<td>{$row['first_name']} {$row['last_name']}</td>
									<td style=\"border-left: 1px solid black;border-right: 1px solid black; padding-left: 8px;\">{$row['films']}</td>
								</tr>
							";
						}
						echo "</table>";
						#END ACTOR TABLE
						
						
						$queryMovies = mysqli_query($connection,
							"SELECT title, count(*) rentals FROM rental JOIN inventory USING (inventory_id) JOIN film USING (film_id) GROUP BY title ORDER BY rentals DESC LIMIT 10;"
						);
						
						#START MOVIES TABLE
						echo "</br>";
						echo "<b>TOP 10 Movies: </b><br/>";
						echo "<table style=\"width:25%; border: 1px solid black;border-collapse: collapse;\">
								<tr style=\"border: 1px solid black;\">
									<td ><b>Name</b></td>
									<td style=\"border: 1px solid black;\"><b>Rentals</b></td>
								</tr>";
						while($row = mysqli_fetch_array($queryMovies)){
							echo "
								<tr>
									<td>{$row['title']}</td>
									<td style=\"border-left: 1px solid black;border-right: 1px solid black; padding-left: 8px;\">{$row['rentals']}</td>
								</tr>
							";
						}
						echo "</table>";
						#END MOVIES TABLE
						
						
						
					?>
					<br />
					<p><a href="index.php">Home</a></p>
                    </div>
                </div>
            </div>        
    </div>
</body>
</html>
<?php
//mysql_close($connection);
?>