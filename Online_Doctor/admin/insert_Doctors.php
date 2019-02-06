<!DOCTYPE html>
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

		<title>Insert Doctors Information</title>
		
	</head>
	<body bgcolor="steelblue">
		<form method="post" action="insert_Doctors.php" enctype="multipart/form-data">
			<div>
				<table align="center" border="10" width="600">
				<tr>
					<td align="center" colspan="5" bgcolor="lightblue">
						<h1>Doctor's Information </h1>
					</td>
				</tr>
				
				<tr>
					<td align="right">Name:</td>
					<td><input type="text" name="DoctorsName" size="30"></td>
				</tr>
				
				<tr>
					<td align="right">Department:</td>
					<td>
						<select name="DoctorsDepartment">
							<option>Select Department </option>
							<option value="Anesthesiology">Anesthesiology</option>
							<option value="Cardiology">Cardiology</option>
							<option value="Colorectal Surgery">Colorectal Surgery</option>
							<option value="Cosmetic Surgery">Cosmetic Surgery</option>
							<option value="Dental Surgery">Dental Surgery</option>
							<option value="Dermatologist">Dermatologist</option>
							<option value="Digestive">Digestive</option>
							<option value="Eye Center">Eye Center</option>
							<option value="Fertility">Fertility</option>
							<option value="Gastroenterology">Gastroenterology</option>
							<option value="Gynecology">Gynecology</option>
							<option value="Hematology">Hematology</option>
							<option value="Hepatology">Hepatology</option>
							<option value="Kidney & Urology">Kidney & Urology</option>
							<option value="Medicine">Medicine</option>
							<option value="Mother & Child">Mother & Child</option>
							<option value="Neurology">Neurology</option>
							<option value="Neuphrology">Neuphrology</option>
							<option value="Neuromedicine">Neuromedicine</option>
							<option value="Orthopedic">Orthopedic</option>
							<option value="Phycology">Phycology</option>
							<option value="Others">Phycology</option>
							<option></option>
						</select>
					
					</td>
				</tr>
				
				<tr>
					<td align="right">Degree:</td>
					<td><input type="text" name="DoctorsDegree" size="30"></td>
				</tr>
				
				
				
				<tr>
					<td align="right">About:</td>
					<td><textarea name="DoctorsContent" cols="40" rows="10"></textarea></td>
				</tr>
				<tr>
					<td align="right">Time:</td>
					<td><input type="text" name="DoctorsTime" size="30"></textarea></td>
				</tr>
				<tr>
					<td align="right">Image:</td>
					<td><input type="file" name="DoctorsImage"></td>
				</tr>
				
				<tr>
					<td align="right" colspan="5" ><input type="submit" name="submit" value="SAVE"></td>
				</tr>
				

				</table>
			</div>
		</form>

	
<?php

	include('includes/connect.php');
	if(isset($_POST['submit']))
	{
		
		$DoctorsName = $_POST['DoctorsName'];
		$DoctorsDepartment = $_POST['DoctorsDepartment'];
		$DoctorsDegree = $_POST['DoctorsDegree'];
		$DoctorsContent = $_POST['DoctorsContent'];
		$image_name = $_FILES['DoctorsImage']['name'];
		$image_type = $_FILES['DoctorsImage']['type'];
		$image_size = $_FILES['DoctorsImage']['size'];		
		$image_tmp = $_FILES['DoctorsImage']['tmp_name'];
		$p=1;
		
		if($DoctorsName == '' or $DoctorsDepartment == '' or $DoctorsDegree == '' or $DoctorsContent == '' or $image_size >80000 or $image_name==null)
		{
			if($image_size >80000)
			{
				echo "<script>alert('Image is larger, only 50kb size is allowed')</script>";
			}
			else
			{
				echo "<script>alert('Your field is empty yet')</script>";
			}
			$p=0;
			exit();
		}
		else
		{
			if($image_type == "image/jpeg" or $image_type == "image/png" or $image_type == "image/gif")
			{
				if($image_size<=80000)
				{
					move_uploaded_file($image_tmp,"../images/$image_name");
				}
					
			}
			else
			{
				echo "<script>alert('image type is invalid')</script>";
			}
		}
		
		$query = "insert into doctors(Doctors_Name,Doctors_Department,Doctors_Degree,Doctors_Image,Doctors_Content) values('$DoctorsName','$DoctorsDepartment','$DoctorsDegree','$image_name','$DoctorsContent')";
		
		if(mysql_query($query))
		{
			if($p==0)
			{
				exit();
			}
			else
			{
				echo " <center><h1>Doctors Information Has Been Included</h1></center>";
			}
		}
		
		
		header("location: index.php");				

	}

?>
	</body>
</html>



<?php } ?>




















