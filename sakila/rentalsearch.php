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
						echo "<form class=\"form\" method=\"get\">";
						if(isset($_GET['searchparameter'])){ 
							$fieldvalue = $_GET['searchparameter'];
							echo "<input class=\"input\" type=\"search\" name=\"searchparameter\" value=\"{$fieldvalue}\"/>"; 
						} else {
							echo "<input class=\"input\" type=\"search\" name=\"searchparameter\"/>";
						}
						echo "<input class=\"submit\" type=\"submit\" name=\"search\" value=\"search\" />";
						echo "</form>";         						
					if(isset($_GET['search']))
					{
						$connection = mysqli_connect("localhost", "root", "", "sakila");
					
						$searchp = $_GET['searchparameter'];
						$query = mysqli_query($connection,"select * from film where title like '%{$searchp}%'");
						
						$rows=mysqli_num_rows($query);
						
						echo "<b>";
						if($rows == 1){
							echo "<p>{$rows} Match</p>";
						} else {
							echo "<p>{$rows} Matches</p>";
						}
						echo "</b>";
						
						while ($row = mysqli_fetch_array($query))
						{
							echo "<p><a href=\"select_stock2.php?film_id={$row['film_id']}\">{$row['title']}</a></p>";
						}
					}       
					?>
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