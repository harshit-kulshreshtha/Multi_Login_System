<html>
	<head>
		<title>Edit Result</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

<?php
	echo($_GET['id']);
	$id=$_GET['id'];
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
	$query="select result.*,User_Details.* from result Inner join User_Details on student_id= '$id' and result.student_id=User_Details.id ";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	if($count>0)
        {
	    //echo($rows['student_id']);
	    //echo($rows['name']);
		 	
?>
	<table border="2px solid black">
	<tr>
		<th>Maths</th>
		<th>Physics</th>
		<th>Chemistry</th>
		<th>English</th>
		<th>Computer</th>
	</tr>
	<?php while($rows = mysqli_fetch_array($result)) {?>
			<tr>
				<td><?php echo($rows['maths'])?></td>
				<td><?php echo($rows['physics']) ?></td>
				<td><?php echo($rows['chemistry']) ?></td>
				<td><?php echo($rows['english']) ?></td>
				<td><?php echo($rows['computer']) ?></td>
			</tr>	
			<?php
				}
			}
			else
			{
				echo("Student Details is not yet added");
				
				
			}
			?>
			<br>
			<br>
		</table>

		<a href="add_marks.php?id=<?php echo($id)?>">Add Marks</a>
	</body>
</html>		

