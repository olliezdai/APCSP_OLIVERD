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
						$film_id = $_GET['film_id'];
						$query = mysqli_query($connection,"select * from inventory where film_id like '{$film_id}'");
						
						echo "<b><p>Select item to be rented:</p></b>";
						while ($inventory = mysqli_fetch_array($query))
						{
							$query2 = mysqli_query($connection, "select * from film where film_id like '{$film_id}'");
							$film = mysqli_fetch_array($query2);
							$query3 = mysqli_query($connection,"SELECT INVENTORY_IN_STOCK({$inventory['inventory_id']})");
							$in_stock = mysqli_fetch_array($query3);
							if($in_stock[0] == true){
								#links to rental.php where the transaction will occur
								echo "<p><a href=\"rental2.php?film_id={$film_id}&inventory_id={$inventory['inventory_id']}\">{$film['title']}&nbsp Store ID: {$inventory['store_id']}</a></p>";
							}else if($in_stock[0] == false){
								echo "<p><s>{$film['title']}&nbsp Store ID: {$inventory['store_id']}</s></p>";
							}else{
								echo "<p>STOCK ERROR</p>";
							}
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