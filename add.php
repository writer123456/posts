<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $details = $_POST['details'];
       $time = strftime("%X"); //time
       $date = strftime("%B %d, %Y"); //date
       $decision = "no";
   
       $con=mysqli_connect("localhost","root","") or die(mysql_error());       //Connect to server
       mysqli_select_db($con,"first_db") or die("Cannot connect to database"); //Connect to database
       foreach( $each_check as $_POST['public'])                          //gets the data from
       {
          if($each_check != null){ //checks if checkbox is checked
             $decision = "yes"; // sets the value
          }
       }

       mysqli_query($con,"INSERT INTO list(details, date_posted, time_posted, public) VALUES ('".$details."','".$date."','".$time."','".$decision."')"); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php"); //redirects back to home
    }
?>