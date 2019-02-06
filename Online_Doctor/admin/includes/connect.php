<?php
	$con=mysql_connect("localhost","root","");
	if(!$con){
		die("can not connect:".mysql_error());
	}
   $db_found= mysql_select_db("online_doctor",$con);
	if(!$db_found)
       print "database not found <BR>";
   

?>