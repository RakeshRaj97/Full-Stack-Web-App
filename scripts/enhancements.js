/**
* Author: Rakesh Raj Gopala Sai Krishnan 102617651
* Target: quiz.html
* Purpose: This file is for enhancements for the quiz.html page
* Created: 28/09/2020
* Last updated: 25/10/2020
* Credits: Swinburne University of Technology
*/

"use strict";

// enhancement 1 - timer and auto submission

// redirect to result.html after timeout 
// save the attempt count using localStorage



function redirect(){
	if (localStorage.clickcount) {
		localStorage.clickcount = Number(localStorage.clickcount)+1;
		} 
	else {
		localStorage.clickcount = 1;
	}

	localStorage.setItem("atmpt", localStorage.clickcount);
	window.location.assign("markquiz.php");
}



// timer with 30 seconds
function startTimer(secs=60){
	var display = document.getElementById("time");
	display.innerHTML = "<h3>Time left " + secs + " seconds</h3>";
	// redirect to result.html once timeout
	if (secs < 1) {
		clearTimeout(timer);
		var message = "Time over. Auto-submitting answers!";		
		alert(message);
		redirect();
	}
	secs--;
	var timer = setTimeout('startTimer('+secs+')',1000);
}

// enhancement 2 - instruction pop-up before quiz
// display sample message if "ok" is selected else redirect to the index.php page
function instructions(){
	if (confirm("Each Question carries 2 marks and you have 60 seconds to complete the quiz")) {
		var sample = "<h2>All the best</h2>";
		document.getElementById("intro1").innerHTML = sample;
	}
	else {
		window.location.assign("index.php");
	}
}
