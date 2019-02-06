<?php
	function register_user($register_data)
    {
		
		array_walk($register_data, 'array_sanitize');
		$register_data['password'] = md5($register_data['password']);
		
		$fields =  '`' . implode('`, `',array_keys($register_data)) . '`';
		$data =  '\'' . implode('\', \'',$register_data) . '\'';
		
		mysql_query("insert into `users` ($fields) values($data)");
    }
	
	
	function user_count()
    {
		return mysql_result(mysql_query("select count(user_id) from users where active = 1 "),0);
    }


	function user_data($user_id)
    {
		$data = array();
		$user_id = (int)$user_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();

		if($func_num_args > 1)
		{
			unset($func_get_args[0]);
			$fields =  '`' . implode('`, `',$func_get_args) . '`';
			//echo "select $fields from users where user_id= $user_id";
			//die();
			$data = mysql_fetch_array(mysql_query("select $fields from users where user_id=$user_id"));
			
			return $data;
		}
	}
	
	function logged_in()
    {
		return (isset($_SESSION['user_id']))? true : false;
    }
	
    function user_exists($username)
    {
		$username = sanitize($username);
		
		return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users where username = '$username' "),0)==1)? true : false;
		
    }
	
	function email_exists($email)
    {
		$email = sanitize($email);
		
		return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users where email = '$email' "),0)==1)? true : false;
		
    }
	
	function user_active($username)
    {
		$username = sanitize($username);
		
		return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users where username = '$username' AND active = 1 "),0)==1)? true : false;
		
    }
	
	function user_id_from_username($username)
    {
		$username = sanitize($username);
		
		return mysql_result(mysql_query("SELECT user_id FROM users where username = '$username' "),0,'user_id');
		
    }
	
	function login($username, $password)
    {
		$user_id = user_id_from_username($username);
		
		$username = sanitize($username);
		$password = md5($password);
		
		return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users where username = '$username' AND password ='$password' "),0)==1)? $user_id : false;

		
    }
?>
