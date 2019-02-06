<!doctype html>
<html>
<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/screen.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

</head>
<body>
    
    <div id="container">

        <aside id="Just_A_Random_ID">
            <div class="widget">
                <h2>Log in/Register</h2>
                <div class="inner">
                    <form action="login.php" method = "post">
						<ul id="login">
							<li>
								User Name:<br>
								<input type="text" name="username">
							</li>
				
							<li>
								Password:<br>
								<input type="password" name="password">
							</li>
							
							<li>
								<input type="submit" value="Login">
							</li>
							
							<li>
								<a href="register.php">Register</a>
							</li>							
							
						</ul>
					</form>
                </div>
            </div>
        </aside>
      
    </div>
    <footer>
        &copy; sithila520@gmail.com. All rights reserved.
    </footer>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>