<!--
filename:search_student_id.php (assign3)
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
<body id="changeScore">
	<?php
		$page="changeScore";
		include_once "header.inc";
		include_once "menu.inc";
		require_once "settings.php";
		
		$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
		if (!$conn) {
			echo "<p>Database connection failure</p>";
		} else {
			$c_sid = trim($_POST["c_sid"]);
			$score = trim($_POST["score"]);
			$attempt = trim($_POST["attempt"]);
			$query = "update attempts set score=$score where (s_id=$c_sid and n_attempt=$attempt)";
			$result = mysqli_query($conn, $query);
			if(!$result){
				echo "<p>Somthing is wrong with		", $query, "<p>";
			} else {
				if(mysqli_affected_rows($conn)>0) {
					echo "<p>Record(s) have been Updated.</p>";		
				}
				else {
					echo "<p>No records found</p>";
				}
			}			
			mysqli_close($conn);
			
			}
		
	?>
</body>
</html>