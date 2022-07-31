<html>
<head>
	<meta charset="UTF-8">
	<title>Sensor Value Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	
<link rel="stylesheet" href="style.css">

</head>
    <body>
        <top>
            <h1>result page</h1>
                <?php
                    $SERVER ="localhost";
                    $username="root";
                    $password="";
                    $dbname="reem";

                    $conn=mysqli_connect($SERVER,$username,$password,$dbname);
                   if(empty($_GET['value']))
                   {
                    echo '<h2>' . "You should enter vaule <br> ". '</h2>';
                    echo '<h2>' . " Not Submit". '</h2>';
                   }
                   else
                   {
                    $value = $_GET['value'];
                    echo  '<h2>' . "the value: " . $_GET['value'] . '</h2>';
                    echo '<h2>' . " is successfully submit". '</h2>';
                   }

                   $query= " INSERT into reem (value) VALUES ('$value') " ;
                   $run=mysqli_query($conn,$query) 
                   
               
                   
                ?>

                
            </form>
        </top>
        <?php
                $query = " SELECT * FROM reem ORDER BY value ";
                $result = $conn->query($query);
                $conn->close();
                ?>
                <section>
		<h1>GETTING SENSOR VALUES FROM Database</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Sensor Value</th>
				
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['value'];?></td>
				
			</tr>
			<?php
				}
			?>
		</table>
	</section>

    </body>
</html>