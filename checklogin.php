<?php
    session_start();
    // $username = mysql_real_escape_string($_POST['username']);
    // $password = mysql_real_escape_string($_POST['password']);
    $bool = true;

    $con=mysqli_connect("localhost", "root", "") or die (mysql_error());     //Connect to server
    mysqli_select_db($con,"first_db") or die ("Cannot connect to database"); //Connect to database
    $query = mysqli_query($con,"Select * from usrs WHERE username='".$_POST['username']."'"); // Query the 
                                                                            // users table
    $exists = mysqli_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysqli_fetch_assoc($query)) // display all rows from query
       {
          $table_users = $row['username'];    
          $table_password = $row['password'];  // the first password row is passed on 
          if($_POST['username'] == $table_users) // checks if there 
          {
            if($_POST['password'] == $table_password)
            {
                $_SESSION['user'] = $_POST['username'];    // set the username in a session. 
                                                // This serves as a global variable
                header("location: home.php");     // redirects the user to the authenticated 
                                                // home page
            }
            else
            {
                Print '<script>alert("Incorrect Password!");</script>';        // Prompts the user
                Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
            }
         }
         
       
                                               // to $table_password, and so on 
                                               // until the query is finished
       }
       
    }
    else
   {
        Print '<script>alert("Incorrect username!");</script>';        // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
   }
?>