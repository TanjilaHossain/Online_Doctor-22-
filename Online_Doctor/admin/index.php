<?php
	session_start();
	if(!isset($_SESSION['user_name']))
	{
		header("location: login.php"); 
	}
	else
	{
		
?>


<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="admin_style.css">
	</head>
	<body>
	<header>
		<h1>
			Welcome to Admin Panel
		</h1>
		
		<h2>
			Welcome: <font color="steelblue" size="5"> <?php echo $_SESSION['user_name'];?></font>
		</h2>
		
	</header>
	<aside>
		<h1>Manage Content<h1>
		<h3><a href = "logout.php">Admin Logout</a></h3>
		<h3><a href = "index.php?view=view">View Doctors</a></h3>
		<h3><a href = "index.php?insert=insert">Insert New Doctors Information</a></h3>
	</aside>
	<center><h1>This is Admin Panel</h1>
	
		<p>Admin can manage all of this websites content here
		</p>
		<h1><?php echo @$_GET['deleted'];?> </h1>
	
	</center>
	<?php
	
		if(isset($_GET['insert']))
		{
			include("insert_Doctors.php");
		}
	?>
		<?php if (isset($_GET['view'])) {?>
		
		<table width = "1000" align="center" border="3">;
			<tr>
				<td align = "center" colspan="9" bgcolor = "lightblue">
					<h1>View All the Doctor's Information</h1>
				</td>
			</tr>
			<tr>
				<th>Doctors Id</th>
				<th>Doctors Name</th>
				<th>Doctors Department</th>
				<th>Doctors Degree</th>
				<th>Doctors Image</th>
				<th>Doctors Content</th>
				<th>EDIT </th>
				<th>DELETE</th>
			</tr>
			<?php
		include("includes/connect.php");
		if(isset($_GET['view']))
		{	
			$i = 1;
			$query = "select *from doctors";
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run))
			{
				$DoctorsId=$row['Doctors_Id'];
				$DoctorsName = $row['Doctors_Name'];
				$DoctorsDepartment = $row['Doctors_Department'];
				$DoctorsDegree = $row['Doctors_Degree'];
				$DoctorsImage = $row['Doctors_Image'];
				$DoctorsContent = $row['Doctors_Content'];
			
				 
		?>
			<tr>
				<td align="center"><?php echo $i++ ?></td>
				<td align="center"><?php echo $DoctorsName; ?></td>
				<td align="center"><?php echo $DoctorsDepartment; ?></td>
				<td align="center"><?php echo $DoctorsDegree; ?></td>
				<td align="center"><img src="../images/<?php echo $DoctorsImage; ?>" width="50" height="50"></td>
				<td align="center" width="100"><?php echo $DoctorsContent; ?></td>
				<td align="center"><a href="edit.php?edit=<?php echo $DoctorsId;?>">edit</a></td>
				<td align="center"><a href="delete.php?del=<?php echo $DoctorsId ; ?>">delete</a></td>
			</tr>
			
		<?php }} } ?>	
		</table>
			
	</body>
</html>

<?php } ?>









