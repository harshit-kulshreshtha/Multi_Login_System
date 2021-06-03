<?php
session_start();
    $conn = mysqli_connect("localhost","harshit", "harshit");
    /*
    if($conn)
        echo("The connection is successful");
    else{
    	//echo("error in connection");
        die(mysqli_error($conn));
        }
    */
    
    $query = "create database if not exists Teacher_Student";
    $db = mysqli_query($conn,$query);
    
    /*
    if($db)
        echo("<br/>Database is created successfully");
    else
    {
    	//echo("error in connection db");
        die("<br/>".mysqli_error($conn));
    }
    */
    
    $db = mysqli_select_db($conn,"Teacher_Student");
    
    /*
    if($db)
        echo("<br/>Database is selected successfully");
    else
        die(mysqli_error($conn));
    */
   
   $email=$_POST['email'];
	$passw=$_POST['password'];
	
	$query="select * from User_Details where email= '$email' and password= '$passw'";
	$result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
	if($count>0)
	{
		while($rows = mysqli_fetch_array($result))
		{
				$_SESSION['user_data']=$rows['name'];
				$_SESSION['ID']=$rows['id'];
				echo($_SESSION['user_data']);
				if($rows['usertype']==2){
	
					$id=$rows['id'];
					header("Location:teacher_home.php?id=$id");	
				}
				else{
					header("Location:student_home.php");
				}
	
	  }
	}
	else{
		header("Location:index1.html?error=Invalid Login Details");		
	}	

