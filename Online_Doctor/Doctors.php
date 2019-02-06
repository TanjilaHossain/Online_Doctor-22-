
<html>
	<head>
		<title>DOCTORS INFORMATION</title>
		<link rel="stylesheet" href="Styles/style.css" media="all"/>
	</head>
	<body>
		<div class="main_wrapper">
			<?php
				include("includes/connect.php");
				$query = "select *from doctors";
				$run = mysql_query($query);
				while($row = mysql_fetch_array($run))
				{
					$DoctorsId = $row['Doctors_Id'];
					$DoctorsName = $row['Doctors_Name'];
					$DoctorsDepartment = $row['Doctors_Department'];
					$DoctorsDegree = $row['Doctors_Degree'];
					$DoctorsImage = $row['Doctors_Image'];
					$DoctorsContent = $row['Doctors_Content'];
				
				
					?>
					<h2>
						<?php 
							echo $DoctorsName;
						?>
					</h2>
					<h2>
						<?php 
							echo $DoctorsDepartment;
						?>
					</h2>
					<h2>
						<?php 
							echo $DoctorsDegree;
						?>
					</h2>
					
					<img src="images/<?php echo $DoctorsImage; ?>" width="300" height="400"/>
					
					<p align="justify">
						<?php 
							echo $DoctorsContent;
						?>
					</p>
					<p align="right"><a href="details.php">DETAILS</a></p>
					
					<?php } ?>
		</div>
	</body>
</html>