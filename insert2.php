<!DOCTYPE HTML>
<html>
<title></title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="maindiv">
            <div class="divA">
                <div class="title"><h2>Insert Data Using PHP</h2></div>
                <div class="divB">
                    <div class="divD">
                        <p>Click On Menu</p>

                        <?php                        
                        $connection = mysqli_connect("localhost", "root", "", "company");
						
						if (isset($_GET['submit'])) {
                        #$id = $_GET['id'];
                        $name = $_GET['name'];
                        $email = $_GET['email'];
                        $mobile = $_GET['contact'];
                        $address = $_GET['address'];
                        $query = mysqli_query($connection,"insert into employee (name, email, contact, address) values ('$name', '$email', '$mobile', '$address')");
   						header('location:index.php');
						}

						echo "<form method=\"get\">";
						#echo "Employee ID:<br>";
						#echo "<input type=\"text\" name=\"id\"><br>";
						echo "Name:<br>";
						echo "<input type=\"text\" name=\"name\"><br>";
						echo "Email:<br>";
						echo "<input type=\"text\" name=\"email\"><br>";
						echo "Contact:<br>";
						echo "<input type=\"text\" name=\"contact\"><br>";
						echo "Address:<br>";
						echo "<input type=\"text\" name=\"address\"><br>";
						echo "<input type=\"submit\" name=\"submit\" value=\"Insert\">";
						echo "</form>";
                        ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>        
       
    </div>
</body>
</html>
<?php
//mysql_close($connection);
?>