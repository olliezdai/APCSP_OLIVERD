<!DOCTYPE HTML>
<html>
<title></title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="maindiv">
            <div class="divA">
                <div class="title"><h2>Rental</h2></div>
                <div class="divB">
                    <div class="divD">
						<?php
						
						$connection = mysqli_connect("localhost", "root", "", "sakila");
						
						if(isset($_GET['film_id']) && isset($_GET['inventory_id'])){
							echo "<form class=\"form\" method=\"get\">";
                            echo "<input class=\"input\" name=\"i_id\" type=\"hidden\" value=\"{$_GET['inventory_id']}\" />";
                            echo "<input class=\"input\" name=\"f_id\" type=\"hidden\" value=\"{$_GET['film_id']}\" />";
							echo "<label>" . "Customer ID:" . "</label>" . "<br />";
                            echo"<input class=\"input\" name=\"c_id\"/>" . "<br />";
							echo "<label>" . "Employee ID:" . "</label>" . "<br />";
                            echo"<input class=\"input\" name=\"e_id\"/>" . "<br />";
                            echo "<input class=\"submit\" type=\"submit\" name=\"rent\" value=\"Rent\" />";
                            echo "</form>";
						}else if(isset($_GET['rent'])){
							$c_id = $_GET['c_id'];
							$e_id = $_GET['e_id'];
							$i_id = $_GET['i_id'];
							$f_id = $_GET['f_id'];
							
							#check customer balance
							$query = mysqli_query($connection,"SELECT get_customer_balance({$c_id}, NOW())");
							$balance = mysqli_fetch_array($query);
							#check balance
							if($balance[0] > 0){
								#refuse or accept payment
								echo "Customer has an outstanding balance of \${$balance[0]}. <br/>Cannot process rental.";
							}else{
								#update rental
								mysqli_query($connection, "INSERT INTO rental ( rental_date, inventory_id, customer_id, staff_id) 
									VALUES( NOW(), $i_id, $c_id, $e_id)");
								#update payment
								$pricequery = mysqli_query($connection, "SELECT rental_rate FROM film WHERE film_id LIKE {$f_id}");
								$price = mysqli_fetch_array($pricequery);
								mysqli_query($connection, "INSERT INTO payment ( customer_id, staff_id, rental_id, amount,  payment_date)
									VALUES($c_id,$e_id,LAST_INSERT_ID(), {$price['rental_rate']}, NOW())");
								
								echo "Film rented. Payment processed.";
							}
							
						}else {
							echo "<p>No item selected</p>";
						}
							
						
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