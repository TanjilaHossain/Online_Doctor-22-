<!DOCTYPE html>


<html>
	<head>

		<title>REGISTER</title>
		
	</head>
	<body bgcolor="steelblue">
		<form method="post" action="register.php" enctype="multipart/form-data">
			<div>
				<table align="center" border="10" width="600">
				<tr>
					<td align="center" colspan="5" bgcolor="lightblue">
						<h1>REGISTER</h1>
					</td>
				</tr>
				
				<tr>
					<td align="right">:</td>
					<td></td>
				</tr>
				
				<tr>
					<td align="right">:</td>
					<td></td>
				</tr>
				
				<tr>
					<td align="right">:</td>
					<td></td>
				</tr>
				
				<tr>
					<td align="right">:</td>
					<td></td>
				</tr>
				<tr>
					<td align="right">:</td>
					<td></td>
				</tr>
				
				<tr>
					<td align="center" colspan="5" ><input type="submit" name="submit" value="REGISTER"></td>
				</tr>
				
				</table>
			</div>
		</form>

	</body>
</html>
<!------this is db 
php

	include('includes/connect.php');
	<-----
	if(isset($_POST['submit']))
	{
		$ = $_POST['DoctorsName'];
		$ = $_POST['DoctorsDepartment'];
		$ = $_POST['DoctorsDegree'];
		$ = $_POST['DoctorsContent'];
		$image_name = $_FILES['']['name'];
		$image_type = $_FILES['']['type'];
		$image_size = $_FILES['']['size'];		
		$image_tmp = $_FILES['']['tmp_name'];
		$p=1;
		
		if($ == '' or $ == '' or $ == '' or $ == '' or $image_size >80000 or $image_name==null)
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
					move_uploaded_file($image_tmp,"images/$image_name");
				}
					
			}
			else
			{
				echo "<script>alert('image type is invalid')</script>";
			}
		}
		
		$query = "insert into ----------------()";
		
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
		
		
		

	}




----->

















