<?php 

	include('core/init.php');
	protect_page();
	include('includes/overall/header.php');
 
 ?>
		<h1>Contact Us</h1>
		<p>this is going to be protected template</p>
		
<?php
	$query1 = "select distinct Doctors_Department from doctors";
	$result1 = mysql_query($query1);
	
	
?>
		
<html>
	<head></head>
	<body>	
		<form action="" method = "post">
			<ul id="login">
				<li>
					Select Department    :
					<select name="DoctorsDepartment">
					<?php while($row1 = mysql_fetch_array($result1)):;?>
										<option></option>

					<option><?php echo $row1[0];?></option>
					<?php endwhile;?>
					</select>
				
				
					<input type="submit" value="search" name = "submit1">
				</li>
				
				<li>
					Select Doctor        :
					<select>
					<?php 
					if(isset($_POST['submit1']))
					{
						$DoctorsDepartment = $_POST['DoctorsDepartment'];
		
						$query2 = "select Doctors_Name from doctors where Doctors_Department='$DoctorsDepartment'";
						$result2 = mysql_query($query2);
									
					
					}	
					while($row2 = mysql_fetch_array($result2)):;
					?>
					<option><?php echo $row2[0];?></option>
					<?php endwhile;?>
					</select>
				</li>
				
				<li>
					<input type="submit" value="check" name = "check">
				</li>							
								
			</ul>
		</form>

	</body>
</html>

<?php
	if(isset($_POST['check']))
	{
		
	}
	
?>
	
<?php include('includes/overall/footer.php'); ?>
