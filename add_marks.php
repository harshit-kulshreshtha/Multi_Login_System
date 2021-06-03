
<html>
<head>
<title>Add Marks</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Add the Marks of Students</h1>
<form method="post" action="" id="add_marks">
	
	<label>Maths</label>
	<input type=number name="maths"/>
	<label>Physics</label>
	<input type=number name="physics"/> 
	<label>Chemistry</label>
	<input type=number name="chemistry"/>
	<label>English</label>
	<input type=number name="english"/>
	<label>Computer</label>
	<input type=number name="computer"/>
	<input type="submit" />
</form>
</body>
</html>
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
    
    $query = "create table  if not exists result (id varchar(20),student_id varchar(20), maths int,physics int, chemistry int,english int,computer int);";
    $result = mysqli_query($conn, $query);
    
    /*
    if($result)
        echo("<br/>Table is created successfully");
    else
        die(mysqli_error($conn));
    */
    
    $id=$_GET['id'];
    $maths=$_POST['maths'];
    $physics=$_POST['physics'];
    $chemistry=$_POST['chemistry'];
    $english=$_POST['english'];
    $computer=$_POST['computer'];
    
    $query ="insert into result values('".$id."', '".$id."','".$maths."','".$physics."','".$chemistry."', '".$english."','".$computer."');";
    $result = mysqli_query($conn, $query);
    /*
    if($result)
        echo("<br/>One row is inserted");
    else
        die(mysqli_error($conn));
	*/
?>   
    
    

