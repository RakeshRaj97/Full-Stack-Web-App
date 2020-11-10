<!--
filename:supervisor.php (assign3)
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
<body id="supervisorPage">
	<?php
		$page="supervisorPage";
		include_once "header.inc";
		include_once "menu.inc";
		require_once "settings.php";
	?>
		<h1>Supervisor Page</h1>
		
		<!-- list all attempts -->
		<form method="post" action="list_sorted.php">
		<fieldset>
			<legend>Select an option to sort and list all attempts</legend>
			<input type="radio" id="r1" name="sort" value="Score">
			<label for="r1">Score</label><br>
			<input type="radio" id="r2" name="sort" value="Student ID">
			<label for="r2">Student ID</label><br>
			<input type="radio" id="r3" name="sort" value="First Name">
			<label for="r3">First Name</label><br>
			<input type="radio" id="r4" name="sort" value="Last Name">
			<label for="r4">Last Name</label><br>
			<input type="radio" id="r5" name="sort" value="Date and Time">
			<label for="r5">Date and Time</label><br>
			<input type="radio" id="r6" name="sort" value="Number of Attempts">
			<label for="r6">Number of Attempts</label><br>
			<input type="radio" id="r7" name="sort" value="No Sort">
			<label for="r7">No Sort</label><br>	
			<input type="submit" value="Sort">
		</fieldset>
		</form>
		
		<!-- list all attempts for a particular student -->
		<form id="form1" method="post" action="search_student_id.php"></form>
		<form id="form2" method="post" action="search_student_name.php"></form>
		
		<p><b>Search student attempts using student id/name</b></p>
		<input type="text" name="sid" id="sid" placeholder="Student ID" form="form1"/>
		<input type="submit" value="Search" form="form1"/>
		<br><br>
		<input type="text" name="sname" id="sname" placeholder="Student first name" form="form2"/>
		<input type="submit" value="Search" form="form2"/>		
		
		<!-- List all students who got 100% on their first attempt -->
		<p><a href="first_attempt.php">List all students who got 100% on their first attempt</a></p>
		
		<!-- List all students who got less than 50% on their third attempt -->
		<p><a href="third_attempt.php">List all students who got less than 50% on their third attempt</a></p>
		
		<!-- Delete all attempts for a particular student -->
		<form method="post" action="delete_all.php">
		<fieldset>
			<legend>Delete all attempts for a particular student</legend>
			<p><label for="d_sid">Student ID: </label>
				<input type="text" name="d_sid" id="d_sid" /></p>
			<p>	<input type="submit" value="Delete" /></p>
		</fieldset>
		</form>
		
		<!-- Change score for a quiz attempt -->
		<form method="post" action="change_score.php">
		<fieldset>
			<legend>Change score for a quiz attempt</legend>
			<p><label for="c_sid">Student ID: </label>
				<input type="text" name="c_sid" id="c_sid" /></p>
			<p><label for="attempt">Attempt: </label>
				<input type="text" name="attempt" id="attempt" /></p>
			<p><label for="score">New Score: </label>
				<input type="text" name="score" id="score" /></p>
			<p>	<input type="submit" value="Update Score" /></p>
		</fieldset>
		</form>
		<section class="references">
		<h3>References</h3>
		<ol>
		<li>Week 8, 9, 10 Lecture slides</li>
		<li>Lab08, Lab09 and Lab10 materials</li>
		</ol>
		</section>
	<?php	
		include_once "footer.inc";
	?>
</body>
</html>