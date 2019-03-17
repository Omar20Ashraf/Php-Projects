<?php

//connect to dataase
$con=mysqli_connect("localhost","root","","shoutit");

//Test Connection

if(mysqli_connect_errno())
{
	//i can use die instead of echo if i dont want the content of the page to 
	//display
	//die ("Failed To Connect To Mysql: ".mysqli_connect_errno());
	echo "Failed To Connect To Mysql: ".mysqli_connect_errno();
}