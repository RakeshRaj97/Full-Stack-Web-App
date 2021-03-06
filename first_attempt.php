<!--
filename:listall.php (assign3)
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
<body id="firstAttempt">
	<?php
		$page="firstAttempt";
		include_once "header.inc";
		include_once "menu.inc";
		require_once "settings.php";
		
		$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
		if (!$conn) {
			echo "<p>Database connection failure</p>";
		} else {
			$query = "SELECT s_id, first_name, last_name FROM attempts where score=10 and n_attempt=1";
			$result = mysqli_query($conn, $query);
			if(!$result) {
				echo "<p>Error with query</p>";
			} else {
				if(mysqli_affected_rows($conn)>0) {
					echo "<table border =\"1\">\n";
					echo "<tr>\n "						 
						 ."<th scope =\"col1\">Student ID</th>\n"
						 ."<th scope =\"col1\">First Name</th>\n"
						 ."<th scope =\"col1\">Last Name</th>\n"
						 ."</tr>\n";
					
					while ($row= mysqli_fetch_assoc($result)){
						echo "<tr>\n ";
						echo "<td>", $row["s_id"],"</td>\n";
						echo "<td>", $row["first_name"],"</td>\n";
						echo "<td>", $row["last_name"],"</td>\n";						
						echo "</tr>\n";
					}
					echo "</table>\n";
					mysqli_free_result($result);
				}
				mysqli_close($conn);
			}
		}
	?>
</body>
</html>