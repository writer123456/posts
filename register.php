<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="register.php" method="post">
           Enter Username: <input type="text" 
           name="username" required="required" /> <br/>
           Enter Password: <input type="password" 
                            name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $bool = true;
    $con=mysqli_connect("localhost", "root","") or die(mysql_error());      //Connect to server
    mysqli_select_db($con,"first_db") or due("Cannot connect to database"); //Connect to database
    $query = mysqli_query($con,"Select * from usrs");
    //Query the users table
    while($row = mysqli_fetch_array($query)) //display all rows from query
    {
        if($_POST['username'] == $row['username'])     // checks if there are any matching fields
        {
            $bool = false; // sets bool to false
            Print '<script>alert("Username has been taken!");</script>';     //Prompts the user
            Print '<script>window.location.assign("register.php");</script>';//redirects to 
        //                                                                      //register.php
        }
       
    }

     if($bool) // checks if bool is true
     {
         mysqli_query($con,"INSERT INTO usrs (username, password) VALUES ('".$_POST['username']."','". $_POST['password']."')"); // inserts value into table users
         Print '<script>alert("Successfully Registered!");</script>';      // Prompts the user
         Print '<script>window.location.assign("login.php");</script>'; // redirects to 
    //                                                                       // register.php
     }
}
?>