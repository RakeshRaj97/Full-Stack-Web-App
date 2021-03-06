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
			$sid = trim($_POST["sid"]);
			$query_id = "select * from attempts where s_id=\"$sid\"";
			$result = mysqli_query($conn, $query_id);
			if(!$result){
				echo "<p>Somthing is wrong with		", $query_id, "<p>";
			} else {
				if(mysqli_affected_rows($conn)>0) {
				echo "<table border =\"1\">\n";
				echo "<tr>\n "
					 ."<th scope =\"col1\">ID</th>\n"
					 ."<th scope =\"col1\">Date and Time</th>\n"
					 ."<th scope =\"col1\">First Name</th>\n"
					 ."<th scope =\"col1\">Last Name</th>\n"
					 ."<th scope =\"col1\">Student ID</th>\n"
					 ."<th scope =\"col1\">Number of Attempts</th>\n"
					 ."<th scope =\"col1\">Score</th>\n"
					 ."</tr>\n";
				
				while ($row= mysqli_fetch_assoc($result)){
					echo "<tr>\n ";
					echo "<td>", $row["attemptid"],"</td>\n";
					echo "<td>", $row["date_time"],"</td>\n";
					echo "<td>", $row["first_name"],"</td>\n";
					echo "<td>", $row["last_name"],"</td>\n";
					echo "<td>", $row["s_id"],"</td>\n";
					echo "<td>", $row["n_attempt"],"</td>\n";
					echo "<td>", $row["score"],"</td>\n";
					echo "</tr>\n";
				}
				echo "</table>\n";
				mysqli_free_result($result);
				}
				else {
					echo "No records found for the user";
				}
				mysqli_close($conn);
			
			}
		}
	?>
</body>
</html>