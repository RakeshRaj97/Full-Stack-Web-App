<!--
filename:quiz.html
author:Rakesh Raj
created:28/09/2020
last modified:-25/10/2020
description:Quiz page
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Quiz page" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="author" content="Rakesh Raj"  />
  <link href="styles/style.css" rel="stylesheet" />
  <script src="scripts/enhancements.js"></script>
  <script src="scripts/quiz.js"></script>
  
  <title>Instant Messaging</title>
</head>
<body id="quizPage">
<?php 
	$page = "quizPage";
	include_once "header.inc";
	include_once "menu.inc";
	require_once "settings.php";
	$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
	if ($conn) {
		$query = "create table if not exists attempts (attemptid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
					date_time varchar(14), first_name varchar(20), last_name varchar(20),
					s_id int(10), n_attempt int(1), score int(2))";
		$result = mysqli_query($conn, $query);
		
	}
?>
	
	<main>
	<section id="quiz_main">
	<h2 id="intro">We wish you <span id="intro1"></span></h2>
	<form id='regform' method="post" action="markquiz.php" novalidate="novalidate">
		<fieldset>
			<legend>Student Details</legend>
			<table class="quiz">
			<tr>
			<td><label for="tb1"> First Name:</label></td><td><input type="text" id="tb1" name="First_name" maxlength="25" size="25"  pattern="[a-zA-Z\s-]+" required="required"/></td>
			</tr>
			<tr>
			<td><label for="tb2"> Last Name:</label></td><td><input type="text" id="tb2" name="Last_name" maxlength="25" size="25"  pattern="[a-zA-Z\s-]+" required="required"/></td>
			</tr>
			<tr>
			<td><label for="tb3"> Student ID:</label></td><td><input type="text" id="tb3" name="Student_ID" size="25"  pattern="[0-9]{7}|[0-9]{10}" required="required" oninvalid="setCustomValidity('The student number is either 7 or 10 digits.')"/></td>
			</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>Assessment</legend>
			<table class="quiz">
			
			<tr>
			<td><label for="q1">Q1: WhatsApp is a subsidiary of?</label></td>
			<td>
			<input type="text" id="q1" name="subsidiary" pattern="[a-zA-Z0-9\s,]+" required="required"/>
			</td>
			</tr>
			
			<tr>
			<td><p>Q2: The Zephyr Notification Service invented at MIT's Project Athena?</p></td>
			<td>
			<input type="radio" id="r1" name="mit" value="Yes" required="required" />Yes
			<input type="radio" id="r2" name="mit" value="No" />No
			</td>
			</tr>
			
			<tr>
			<td><p>Q3: Which of the following are features of Instant Messaging?</p></td>
			<td>
			<input type="checkbox" id="cb1" name="feature1" value="Short message" />Short message
			<input type="checkbox" id="cb2" name="feature2" value="File Transfer"  />File Transfer
			<input type="checkbox" id="cb3" name="feature3" value="Video Chat/Voice over IP" />Video Chat/Voice over IP
			<input type="checkbox" id="cb4" name="feature4" value="Banking/Online Transactions" />Banking/Online Transactions
			</td>
			</tr>
			
			<tr>
			<td>
			<label for="dd">Q4: Skype is a subsidiary of?</label>
			</td>
			<td>
			<select id="dd" name="skype">
				<option value="none">Please Select</option>
				<option value="discord">Discord Inc.</option>
				<option value="facebook">Facebook Inc.</option>
				<option value="line">Line Corporation</option>
				<option value="microsoft"> Microsoft Corporation</option>
				<option value="snap">Snap Inc.</option>
				<option value="None">None of the above</option>
			</select>
			</td>
			</tr>
			<tr>
			<td>
			<label for="ta">Q5: Write any one of the IM applications which has more than 100 million userbase.</label>
			</td>
			<td>
			<textarea id="ta" name="userbase" cols="40" rows="5" placeholder="Write any one application software" ></textarea>
			</td>
			</tr>
			</table>
			<div id="submit">
			<input type="submit" class="button" name="submit" value="SUBMIT"/>
			<input type="reset" class="button" name="reset" value="RESET"/>
			</div>
		</fieldset>
	</form>
	<p id="err"></p>
	<p id="time"></p>
	<section class="references">
		<h3>References</h3>
		<ol>
		<li><a href="https://www.w3schools.com/css/css3_buttons.asp" target="_blank">CSS Buttons</a></li>
		<li><a href="https://www.w3schools.com/tags/tag_textarea.asp" target="_blank">HTML textarea Tag</a></li>
		<li><a href="https://www.w3schools.com/jsref/met_win_settimeout.asp" target="_blank">setTimeout</a></li>
		<li><a href="https://www.geeksforgeeks.org/javascript-cleartimeout-clearinterval-method/" target="_blank">clearTimeout</a></li>
		<li><a href="https://www.w3schools.com/jsref/met_win_alert.asp" target="_blank">alert</a></li>
		<li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Location/assign" target="_blank">window.location.assign</a></li>
		<li><a href="https://www.w3schools.com/jsref/met_win_confirm.asp" target="_blank">confirm</a></li>
		<li>Week 2, 3, 4, 5, 6, 7, 8, 9, 10 Lecture slides</li>
		<li>Lab02, Lab03, Lab04, Lab05, Lab06, Lab07, Lab08, Lab09 and Lab10 materials</li>
		</ol>
		</section>
	</section>
	</main>
	<?php 
		include_once "footer.inc";
	?>
</html>		
			
			
		
		