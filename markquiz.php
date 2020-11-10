<!--
filename:markquiz.php (assign3)
author:Rakesh Raj
created:24/10/2020
last modified:-24/10/2020
description:Mark Quiz
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Mark Quiz" />
  <meta name="keywords" content="php" />
  <meta name="author" content="Rakesh Raj"  />
  <link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<h1>Quiz Results</h1>
	<?php
	session_start();
	if(!isset($_SESSION["attempt_count"])) $_SESSION["attempt_count"]=0;
	$attempt_count=$_SESSION["attempt_count"];
	
	require_once("settings.php");
	$conn = mysqli_connect($host, $user, $pwd, $sql_db);			
	if(!$conn){
		echo "<p>Database Connection failure</p>";
	}
	else if ($attempt_count<2) {	
		function sanitise_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
		}
		if(isset ($_POST["First_name"])){
			$firstname=$_POST["First_name"];
		}
		else {
			header("location: quiz.php");
		}
		if(isset($_POST["Last_name"])) $lastname = $_POST["Last_name"];
		if(isset($_POST["Student_ID"])) $sid = $_POST["Student_ID"];
		if(isset($_POST["subsidiary"])) $ques1 = $_POST["subsidiary"];
		if(isset($_POST["mit"])) $ques2 = $_POST["mit"];
		else $ques2="Unknown option";
		if(isset($_POST["skype"])) $ques4 = $_POST["skype"];
		if(isset($_POST["userbase"])) $ques5 = $_POST["userbase"];
		$ques3 = array();
		if(isset($_POST["feature1"])) array_push($ques3,"Short message");
		if(isset($_POST["feature2"])) array_push($ques3,"File Transfer");
		if(isset($_POST["feature3"])) array_push($ques3,"Video Chat/Voice over IP");
		if(isset($_POST["feature4"])) array_push($ques3,"Banking/Online Transactions");
		$ques3=implode(", ",$ques3);
		
		// sanitise inputs
		$firstname=sanitise_input($firstname);
		$lastname=sanitise_input($lastname);
		$sid=sanitise_input($sid);
		$ques1=sanitise_input($ques1);
		$ques2=sanitise_input($ques2);
		$ques3=sanitise_input($ques3);
		$ques4=sanitise_input($ques4);
		$ques5=sanitise_input($ques5);
		
		$errMsg="";
		$score=0;
		$result="pass";
		$date_time=date('Y-m-d h:i:sa');
		
		if ($firstname==""){
			$errMsg .="<p>You must enter your first name.</p>";
			$result="fail";
		}
		else if (!preg_match("/^[a-zA-Z\s-]{1,20}$/",$firstname)){
			$errMsg .= "<p>Only alpha letters with max length 20 are allowed in your first name.</p>";
		}
		if ($lastname==""){
			$errMsg .="<p>You must enter your last name.</p>";
			$result="fail";
		}
		else if (!preg_match("/^[a-zA-Z\s-]{1,20}$/",$lastname)){
			$errMsg .= "<p>Only alpha letters with max length 20 are allowed in your last name.</p>";
		}
		if (!is_numeric($sid)){
			$errMsg .="<p>Your Student_ID must be a number.</p>";
			$result="fail";
		}
		else if (!preg_match("/^[0-9]{7}|[0-9]{10}$/", $sid)){
			$errMsg .= "<p>Your Student_ID must be either 7 or 10 digits.</p>";
		}
		
		// question 1
		if ($ques1==""){
			$errMsg .="<p>You must answer question 1.</p>";
			$result="fail";
		}
		else if ($ques1 == 'facebook') {
			$score = $score + 2;
		}
		
		// question 2
		if ($ques2=="" or $ques2=="Unknown option") {
			$errMsg .="<p>You must answer question 2.</p>";
			$result="fail";
		}
		else if ($ques2=="Yes") {
			$score = $score + 2;
		}
		
		// question 3
		if ($ques3=="") {
			$errMsg .="<p>You must answer question 3.</p>";
			$result="fail";
		}
		else if($ques3=="Short message, File Transfer, Video Chat/Voice over IP") {
			$score = $score + 2;
		}
		
		// question 4
		if ($ques4=="none") {
			$errMsg .="<p>You must answer question 4.</p>";
			$result="fail";
		}
		if ($ques4=="microsoft") {
			$score = $score + 2;
		}
		
		// question 5
		if ($ques5=="") {
			$errMsg .="<p>You must answer question 5.</p>";
			$result="fail";
		}
		if (($ques5=="facebook messenger") || ($ques5=="whatsapp") || ($ques5=="imessage") || ($ques5=="snapchat") || ($ques5=="wechat")) {
			$score = $score + 2;
		}
		
		if($errMsg !=""){
			echo "<p>$errMsg</p>";
			$result="fail";
			echo"<p><a href=\"quiz.php\">Back</a></p>"; 
		}
		else if ($score==0) {
			echo "<p>Your score is zero.</p>";
			$result="fail";
			echo"<p><a href=\"quiz.php\">Back</a></p>"; 
		}
		if ($result=="pass"){
			$sql_table = "attempts";
			$query_id="select * from attempts where s_id=$sid";
			$query_exec=mysqli_query($conn,$query_id);
			if(mysqli_affected_rows($conn)<3) {
				$attempt_count=1;
				if(mysqli_affected_rows($conn)==1){
					$attempt_count=2;
				}
				else if(mysqli_affected_rows($conn)==2) {
					$attempt_count=3;
				}			
				
				$query = "insert into $sql_table (date_time, first_name, last_name, s_id, n_attempt, score) values ('$date_time','$firstname', '$lastname', '$sid', '$attempt_count', '$score');";
				$query_result = mysqli_query($conn, $query);
				if(!$query_result){
					echo "<p>Somthing is wrong with ", $query, "<p>";
				}
				else if($attempt_count==3){
					echo "<p>Successfully added new record</p>";
					echo "<p>FirstName: ",$firstname,"</p>";
					echo "<p>LastName: ",$lastname,"</p>";
					echo "<p>Student ID: ",$sid,"</p>";
					echo "<p>Number of Attempts: ",$attempt_count,"</p>";
					echo "<p>Score: ",$score,"</p>";
					echo "<p>Reached Maximum Attempts</p>";
					echo"<p><a href=\"index.php\">Home</a></p>";
				}
				else {
					echo "<p>Successfully added new record</p>";
					echo "<p>FirstName: ",$firstname,"</p>";
					echo "<p>LastName: ",$lastname,"</p>";
					echo "<p>Student ID: ",$sid,"</p>";
					echo "<p>Number of Attempts: ",$attempt_count,"</p>";
					echo "<p>Score: ",$score,"</p>";
					echo"<p><a href=\"quiz.php\">Retry</a></p>";
				}
			} 
			else {
				echo"<p>Reached maximum attempts</p>";	
				echo"<p><a href=\"index.php\">Home Page</a></p>"; 
				unset($_SESSION["attempt_count"]);
			}
			mysqli_close($conn);
		}
	}
	?>
</body>
</html>