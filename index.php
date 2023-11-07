<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <?php
            echo "<p>Hello World!</p>";
        ?>
        <p><a href="login.php"> Click here to login </a></p>
        <p><a href="register.php"> Click here to register</a></p> 

        <h2 align="center">Public Posts</h2>
    	<table border="1px" width="100%">
        <tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Edit Time</th>
		</tr>
        <?php
            $con=mysqli_connect("localhost", "root","") or die(mysql_error());     //Connect to server
            mysqli_select_db($con,"first_db") or die("Cannot connect to database");//connect to 
                                                                             //database
            $query = mysqli_query($con,"Select * from list where public like 'yes'");                      // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                Print "<tr>";
			    Print '<td align="center">'. $row['id'] . "</td>";
			    Print '<td align="center">'. $row['details'] . "</td>";
			    Print '<td align="center">'. $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
			    Print '<td align="center">'. $row['date_edited'] .  " - " . $row['time_edited'] ."</td>";
			    Print "</tr>";
            }
        ?>
		</table>
       
    </body>
</html>