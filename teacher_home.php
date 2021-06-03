<html>
	<head>
		<title>Teacher_Home</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

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
    
		 $id=$_GET['id'];
		 $query="select * from User_Details where usertype= '1' and teacher_id='$id' ";
		 $result = mysqli_query($conn, $query);
		 $count = mysqli_num_rows($result);
		 if($count>0)
		 {
?>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Edit Result</th>
			</tr>
<?php while($rows = mysqli_fetch_array($result)) {?>
			<tr>
				<td><?php echo($rows['id']) ?></td>
				<td><?php echo($rows['name']) ?></td>
				<td><?php echo($rows['email']) ?></td>
				<td><a href="edit_result.php?id=<?php echo $rows['id']; ?>">Edit Result </a></td>
			</tr>	
			<?php
				}
			}
			?>
		</table>
	</body>
</html>

