<!DOCTYPE HTML>
<html>
<title></title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="maindiv">
            <div class="divA">
                <div class="title"><h2>Delete Data Using PHP</h2></div>
                <div class="divB">
                    <div class="divD">
                        <p>Click On Menu</p>

                        <?php                        
                        $connection = mysqli_connect("localhost", "root", "", "company");
									
                        $query = mysqli_query($connection,"select * from employee");
                        while ($row = mysqli_fetch_array($query)) 
						{
							$delete = null;
							echo "<b>{$row['name']}\t\t</b>";
							if(isset($_GET['delete'])){
								$delete = $_GET['delete'];
								if($row['id'] == $delete){
									echo "<b><a href=\"delete.php?delete={$delete}&verified\">Are You Sure?</a></b>";
								}else{
									echo "<b><a href=\"delete.php?delete={$row['id']}\">Delete</a> </b>";
								}
							}else{
								echo "<b><a href=\"delete.php?delete={$row['id']}\">Delete</a> </b>";
							}
                            echo "<br />";
  
                        }
						
                        ?>
                    </div>
                    <?php
                    if (isset($_GET['verified']) && isset($_GET['delete'])) {
                        $delete = $_GET['delete'];
                        $query1 = mysqli_query($connection,"delete FROM employee WHERE id={$delete}");
						header('location:index.php');
					}
					?>
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