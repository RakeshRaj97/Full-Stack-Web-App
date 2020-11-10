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
<body id="searchStudentId">
	<?php
		$page="searchStudentId";
		include_once "header.inc";
		include_once "menu.inc";
		require_once "settings.php";
		
		$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
		if (!$conn) {
			echo "<p>Database connection failure</p>";
		} else {
			$d_sid = trim($_POST["d_sid"]);
			$query_id = "delete from attempts where s_id=\"$d_sid\"";
			$result = mysqli_query($conn, $query_id);
			if(!$result){
				echo "<p>Somthing is wrong with		", $query_id, "<p>";
			} else {
				if(mysqli_affected_rows($conn)>0) {
					echo "<p>Record(s) have been deleted.</p>";		
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