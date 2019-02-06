<html>
	<body>	
	
	<?php
		
		include("index.php");
		include("includes/connect.php");
		
		$edit_Id =  @$_GET['edit'];
		
		$query="select *from doctors where Doctors_Id='$edit_Id'";
		$run=mysql_query($query);

		while($row = mysql_fetch_array($run))
		{
			$edit_DoctorsId=$row['Doctors_Id'];
			$DoctorsName = $row['Doctors_Name'];
			$DoctorsDepartment = $row['Doctors_Department'];
			$DoctorsDegree = $row['Doctors_Degree'];
			$DoctorsImage = $row['Doctors_Image'];
			$DoctorsContent = $row['Doctors_Content'];
					

	?>

		<form method="post" action="edit.php?edit_from=<?php echo $edit_DoctorsId ?>" enctype="multipart/form-data">
			<div>
				<table align="center" border="10" width="600">
				<tr>
					<td align="center" colspan="5" bgcolor="lightblue">
						<h1>EDITING DOCTOR's INFORMATION </h1>
					</td>
				</tr>
				
				<tr>
					<td align="right">Name:</td>
					<td><input type="text" name="DoctorsName" size="30" value="<?php echo $DoctorsName;?>"></td>
				</tr>
				
				<tr>
					<td align="right">Department:</td>
					<td>
						<select name="DoctorsDepartment">
							<option><?php echo $DoctorsDepartment; ?></option>
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
							<option></option>
						</select>
					
					</td>
				</tr>
				
				<tr>
					<td align="right">Degree:</td>
					<td><input type="text" name="DoctorsDegree" size="30" value="<?php echo $DoctorsDegree;?>"></td>
				</tr>
				
				
				
				<tr>
					<td align="right" value="<?php echo $DoctorsContent;?>">About:</td>
					<td><textarea name="DoctorsContent" cols="40" rows="10"> <?php echo $DoctorsContent;?></textarea></td>
				</tr>
				<tr>
					<td align="right">Image:</td>
					<td><input type="file" name="DoctorsImage">
					<img src="../images/<?php echo $DoctorsImage;?>" width="60" height="60">
					</td>
				</tr>
				
				<tr>
					<td align="right" colspan="5" ><input type="submit" name="update" value="Update Now"></td>
				</tr>
	<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>

<?php
	
	if(isset($_POST['update']))
	{
		$update_Id = $_GET['edit_from'];
		
		$DoctorsName = $_POST['DoctorsName'];
		$DoctorsDepartment = $_POST['DoctorsDepartment'];
		$DoctorsDegree = $_POST['DoctorsDegree'];
		$DoctorsContent = $_POST['DoctorsContent'];
		$image_name = $_FILES['DoctorsImage']['name'];
		$image_type = $_FILES['DoctorsImage']['type'];
		$image_size = $_FILES['DoctorsImage']['size'];		
		$image_tmp = $_FILES['DoctorsImage']['tmp_name'];	

		move_uploaded_file($image_tmp,"../images/$image_name");
		$update_query="update doctors set Doctors_Name='$DoctorsName',Doctors_Department='$DoctorsDepartment',Doctors_Degree='$DoctorsDegree',Doctors_Image='$image_name',Doctors_Content='$DoctorsContent'	where Doctors_Id='$update_Id'";
		
		
		if(mysql_query($update_query))
		{
			echo"<script>alert('Doctors Information has been updated')</script>";
			echo"<script>windows.open('view.php','_self)</script>'";
		}
		
		
		
	}
	
?>
















