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
<body id="listSorted">
	<?php
		$page="listSorted";
		include_once "header.inc";
		include_once "menu.inc";
		require_once "settings.php";
		
		function display_table($result){
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
		
		$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
		if (!$conn) {
			echo "<p>Database connection failure</p>";
		} else {
			$value = trim($_POST["sort"]);
			if ($value=="Score"){
				$query = "select * from attempts order by score desc;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Sorted using Score</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}
			if ($value=="Student ID"){
				$query = "select * from attempts order by s_id;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Sorted using Student ID</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}
			if ($value=="First Name"){
				$query = "select * from attempts order by first_name;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Sorted using First Name</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}
			if ($value=="Last Name"){
				$query = "select * from attempts order by last_name;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Sorted using Last Name</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}
			if ($value=="Date and Time"){
				$query = "select * from attempts order by date_time;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Sorted using Date and Time</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}
			if ($value=="Number of Attempts"){
				$query = "select * from attempts order by n_attempt;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Sorted using number of attempts</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}
			if ($value=="No Sort"){
				$query = "select * from attempts;";
				$result = mysqli_query($conn, $query);
				if(!$result) {
				echo "<p>Error with query</p>";
				} else {
					if(mysqli_affected_rows($conn)>0) {
					echo "<b>Showing table without sort</b>";
					display_table($result);
					} else {
						echo "<p> No records found</p>";
					}
				}					
			}		
			
		}
	?>
</body>
</html>