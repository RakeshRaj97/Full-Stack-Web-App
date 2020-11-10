<!--
filename:index.php
author:Rakesh Raj
created:29/08/2020
last modified:-25/10/2020
description:Home page
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
	    <meta name="description" content=" Introductory Home Page" />	
	    <meta name="keywords" content="HTML5, Instant Messaging" />
	    <meta name="author" content="Rakesh Raj Gopala Sai Krishnan"  />
	    <link href="styles/style.css" rel="stylesheet"/>
	    <title>Instant Messaging</title>
	</head>
<body id="indexPage" >
<?php 
	$page = "indexPage";
	include_once "header.inc";
	include_once "menu.inc";
	
?>
	
	
	<main>
	<div class="index_main">
	
		<a href="https://www.brosix.com/blog/what-is-instant-messaging/" target="_blank"><img id="animate" src="images/chat.png" alt="default"/></a>
		
		<section class="about">
		<h2>About IM Technology</h2>
		<p>Instant Messaging offers real-time text transmissions over the internet. The great thing about instant messaging is that it is almost as instantaneous as telephone conversations and features the record-keeping capability of email messaging. 
		While face-to-face interaction and meetings are, of course, still beneficial, instant messaging makes communication more convenient and accessible even if those you need to communicate with are a desk away or a country away. 
		More advanced instant messaging can add file transfers, clickable hyperlinks, Voice over IP, or Video chat.</p>
		</section>
		<section class="references">
		<h3>References</h3>
		<ol>
		<li><a href="https://www.brosix.com/blog/what-is-instant-messaging/" target="_blank">Brosix blog</a></li>
		<li><a href="https://en.wikipedia.org/wiki/Instant_messaging" target="_blank">Instant Messaging-Wikipedia</a></li>
		<li><a href="https://stackoverflow.com/questions/18076173/how-to-keep-an-image-centered-and-responsive" target="_blank">Fluid page layout with image centered</a></li>
		<li>Week 3 and 4 Lecture slides</li>
		<li>Lab03 and Lab04 materials</li>
		</ol>
		</section>
	</div>
	</main>
	<?php 
		include_once "footer.inc";
	?>
		
</body>
</html>	