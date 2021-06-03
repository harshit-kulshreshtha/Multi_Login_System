<html>
	<head>
		<title>Student_Home</title>
		<link rel="stylesheet" href="style.css">
	</head>

 <?php
session_start();
$email=$_SESSION['user_data'];
$id=$_SESSION['ID'];


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
		 
		 $query="select * from result where student_id='$id' ";
		 $result = mysqli_query($conn, $query);
		 $count = mysqli_num_rows($result);
		 
		 $query2="select * from User_Details where id='$id' ";
		 $result2= mysqli_query($conn, $query2);
		 $count2 = mysqli_num_rows($result2);
		 
		 if($count>0)
		 {
?>
	<body>
	<?php 
	
		if($count2>0)
		{
			while($rows2 = mysqli_fetch_array($result2)) {?>
				<h1>Hello!! <?php echo($rows2['name'])?></h1>
				<h3>You can check your Marks Here</h3>
			<?php	
			}
		}
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
				?>
				<h1><?php
				echo("Your Details is not yet added");
			}
			?>
			</h1>
			<br>
			<br>
		</table>
	</body>
</html>		

