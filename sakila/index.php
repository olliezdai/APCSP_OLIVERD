<!DOCTYPE HTML>
<html>
<title></title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="maindiv">
            <div class="divA">
                <div class="title"><h2>Olibusters Homepage</h2></div>
                <div class="divB">
                    <div class="divD">
                        <p>Click On Menu</p>
						<a href = "rentalsearch.php" >Rent a Film</a> </br>
                    </div>
					<?php                        
					$connection = mysqli_connect("localhost", "root", "", "sakila");
					?>
                </div>
            </div>        
    </div>
</body>
</html>
<?php
//mysql_close($connection);
?>