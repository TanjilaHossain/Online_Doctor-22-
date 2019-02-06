<?php
	
	include('core/init.php');
	//logged_in_redirect();
	
	
	if(empty($_POST) == false)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) == true || empty($password) == true)
		{
			$errors[]='you need to enter username and password both';
		}	
		else if(user_exists($username) == false)
		{
			$errors[]='we can\'t find that username. Have you registered? ';
		}
		else if(user_active($username) == false)
		{
			$errors[]='You haven\'t activated your account! ';
		}
		else
		{
			
			
			
			$login = login($username,$password);
			if($login == false)
			{
				$errors[]='That username/password combination is incorrect! ';
			}
			else
			{
				$_SESSION['user_id']  = $login;
				header('location: index.php');
				exit();
			}
		}
		print_r($errors);
	}
	else
	{
		$errors[]= 'landed';
	}
	
	
	include('includes/overall/header.php');
	
if(empty($errors)==false)
{
	?>
	<h2>we tried to log uou in but ....</h2>

<?php
	echo output_errors($errors);
}
	include('includes/overall/footer.php');



?>











