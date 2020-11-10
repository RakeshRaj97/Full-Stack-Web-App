/**
* Author: Rakesh Raj Gopala Sai Krishnan 102617651
* Target: quiz.html
* Purpose: This file is to check the data a user has entered into the quiz form
* Created: 28/09/2020
* Last updated: 25/10/2020
* Credits: Swinburne University of Technology
*/

/*
Scoring criteria: Each question carries 2 marks totalling 10 marks. There is no negative marking for wrong answers.
*/
"use strict";

// function to store user values and number of attempts using localStorage
function saveResult (first, last, studID, score){
	if(typeof(Storage)!=="undefined"){
		localStorage.setItem("fname", first);
		localStorage.setItem("lname", last);
		localStorage.setItem("studID", studID);
		localStorage.setItem("score", score);	
		
		// counts number of attempts
		if (localStorage.clickcount) {
		localStorage.clickcount = Number(localStorage.clickcount)+1;
		} 
		else {
		localStorage.clickcount = 1;
		}

		localStorage.setItem("atmpt", localStorage.clickcount);	
	}
}

// function to retrieve values from localStorage and display in results.html page
function getResult(){
	if(typeof(Storage)!=="undefined"){
		if (localStorage.getItem("studID") !== null) {
			// display student id
			var studID= document.getElementById("confirm_id");
			studID.textContent = localStorage.getItem("studID"); // span or label: use textContent
			
			// display user score
			var score= document.getElementById("score");
			score.value = localStorage.getItem("score");    // input: use value
			
			// display full name
			var username = document.getElementById("confirm_name");
			username.textContent = localStorage.getItem("fname")+" "+localStorage.getItem("lname");
			
			// stop retry after 3 attempts
			var attempts = document.getElementById("attempts");
			var count = localStorage.getItem("atmpt");
			attempts.textContent = count;
			if (count=="3") {
				// clear localStorage
				localStorage.clear();
				// hide hyperlink to retry 
				document.getElementById("hideme").style.opacity = "0";
				
				var str = "You have reached maximum number of attempts!";
				document.getElementById("demo").innerHTML = str;
			}
			
		}	
	}
}


function validate() {
	var errMsg="";
	var result=true;
	var score=0;
	
	// get the value of first name, last name and student id
	var first = document.getElementById("tb1").value;
	var last = document.getElementById("tb2").value;
	var id = document.getElementById("tb3").value;
	var studID=document.getElementById("tb3").value;
	
	// question 1
	var q1=document.getElementById("q1").value.trim();
	if (q1.match(/facebook/i) ){  // contains "facebook", case insensitive
			score += 2;
	}
	
	// question 2
	// calculates score only if "yes" is selected else no score is given
	var q2 = document.getElementById("r1");
	if (q2.checked === true) {
		score += 2;
	}
	
	// question 3
	// correct choice is "short message", "file transfer", "voice chat/voice over ip"
	// score is provided only if all three correct choices are chosen
	var cb1 = document.getElementById("cb1").checked;
	var cb2 = document.getElementById("cb2").checked;
	var cb3 = document.getElementById("cb3").checked;
	var cb4 = document.getElementById("cb4").checked;
	// conditions to validate the score
	if (!(cb1 || cb2 || cb3 || cb4)) {
			errMsg += "Please answer Question 3. <br>";
			result = false;
	}
	else if(cb1 && cb2 && cb3 && !cb4) {
		score += 2;
	}
	
	// question 4
	if (document.getElementById("dd").value == "none") {
		errMsg += "Please answer Question 4. <br>";
		result = false;
	}	
	else if (document.getElementById("dd").value == "microsoft") {
		score += 2;
	}
	
	// question 5
	var ta = document.getElementById("ta").value;
	
	// conditions to validate the score
	if (ta === "") {
		errMsg += "Please answer Question 5. <br>";
		result = false;
	}
	else if ((ta.match(/facebook messenger/i)) || (ta.match(/whatsapp/i)) || (ta.match(/imessage/i)) || (ta.match(/snapchat/i)) || (ta.match(/wechat/i)) ) { // case insensitive
		score += 2;
	}
	
	// display error message and return
	if (errMsg!=="") 
		document.getElementById("err").innerHTML=errMsg;
	else if (score===0) {
		document.getElementById("err").innerHTML="Score is Zero";
		result=false;
	}
	else { // no error, score not zero, save data to storage
		saveResult(first, last, id, score);
	}
	
	
	return result;
	
}


function init() {
	if (document.getElementById("quizPage")) {  // quiz page init
		// call enhancement functions from enhancements.js 
		instructions();
		startTimer();
		// validate 
		//document.getElementById("regform").onsubmit = validate;
	
	}
	else if (document.getElementById("resultPage")) { // result page init
		getResult();		
	}
}
window.onload = init;  
