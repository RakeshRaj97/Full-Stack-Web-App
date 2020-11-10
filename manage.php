<!--
filename:manage.php (assign3)
author:Rakesh Raj Gopala Sai Krishnan
created:25/10/2020
last modified:-25/10/2020
description:Supervisor page
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Quiz page" />
  <meta name="keywords" content="PHP, HTML5" />
  <meta name="author" content="Rakesh Raj"  />
  <link href="styles/style.css" rel="stylesheet" />
  <title>Instant Messaging</title>
</head>
<body id="managePage">
	<?php
		$page="managePage";
		include_once "header.inc";
		include_once "menu.inc";
		require_once "settings.php";
		
		function sanitise_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
		}
		
		$result="pass";
		echo "<h1>Supervisor Page</h1>";
		echo "<form method=\"post\" action=\"manage.php\">\n";
		echo "<label>Username:</label>"; 
		echo "<input type=\"text\" name=\"user\" size=\"20\" required=\"required\"/>\n";
		echo "<label>Enter Password:</label>";
		echo "<input type=\"password\" name=\"pass\" />\n";
		echo "<input type=\"submit\" name=\"login\" value=\"login\"/>";
		echo "</form>";
			
		$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
		if (!$conn) {
			echo "<p>Database connection failure</p>";
		}
		else {
			if(isset($_POST["user"]) and isset($_POST["pass"])) {
			$user=$_POST["user"];
			sanitise_input($user);
			$pass=$_POST["pass"];
			sanitise_input($pass);
			$query="select * from manage where (user=\"$user\" and pass=\"$pass\")";
			$result=mysqli_query($conn,$query);
			if (mysqli_affected_rows($conn)>0) {
				$msg = 'Login Complete! Thanks';
				echo "$msg";
				echo "<meta http-equiv='refresh' content='0'>";
				echo "<script> window.location.assign('supervisor.php'); </script>";
			}
			else if(mysqli_affected_rows($conn)==0){
				$msg = 'Login Failed! Retry';
				echo "$msg";
				$result="fail";
				}
			}
		}
		include_once "footer.inc";
	?>
</body>
</html>