<!--
filename:topic.html
author:Rakesh Raj
created:29/08/2020
last modified:-25/10/2020
description:Topic page
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Topic page" />
		<meta name="keywords" content="HTML5, tags" />
		<meta name="author" content="Rakesh Raj"  />
		<link href="styles/style.css" rel="stylesheet" />
		<title>Instant Messaging</title>
	</head>
<body id="topicPage">
<?php 
	$page = "topicPage";
	include_once "header.inc";
	include_once "menu.inc";
?>
	
	<main>
	<div class="topic_main">
	<figure id="fig">
		<img src="images/img1.jpg" alt="default" />
		<img src="images/img2.jpg" alt="default" />
		<img src="images/img3.jpg" alt="default" />
		<img src="images/img4.jpg" alt="default" />
		
	</figure>
		
	<h1>Deep dive into Instant Messaging</h1>
		
	<section id="contents">
	<h2>Table of contents</h2>
	<ol type="I">
	<li>Instant Messaging Technology and its purpose</li>
	<li>History of IM technology</li>
	<li>Compliance risks &amp; Security</li>
	<li>Future of Instant Messaging</li>
	<li>Comparision of IM Technologies</li>
	</ol>
	</section>	
	
	
	<aside class="index_aside1">
		<img src="images/images.jpg" alt="default"/>
		<p id="hover_info">Some of the key applications with more than 100 million users are WhatsApp, WeChat, iMessage, Facebook Messenger, Snapchat</p>
	</aside>
	
	
	<section id="purpose">
		<h2>Instant Messaging Technology and its purpose</h2>
		<p>IM is used for fast, efficient, and productive communication. Below are some of its purposes, </p>
		<ul>
		<li><p>Instant Communication</p></li>
		<li><p>Improved Efficiency and Productivity</p></li>
		<li><p>To Save Money</p></li>
		<li><p>Communicate with Remote Workers</p></li>
		<li><p>Easy to Implement and Administer</p></li>
		</ul>
	</section>
	
	
	
	<section id="history">
		<h2>History of IM technology</h2>
		<dl>
		<dt>1960s</dt><dd>Compatible Time-Sharing System (CTSS) and Multiplexed Information and Computing Service (Multics) </dd>
		<dt>1980s</dt><dd>The Zephyr Notification Service invented at MIT's Project Athena to allow service providers to locate and send messages to users </dd>
		<dt>1990s</dt><dd>the Quantum Link online service, called as "On-Line Messages" and later "FlashMail", was used for Commodore 64 computers which offered user-to-user messages between concurrently connected customers </dd>
		<dt>2000</dt><dd>Jabber, an open standard protocol, standardized under the name  Extensible Messaging and Presence Protocol (XMPP) which act as a gateway to other IM protocols, reducing the need to run multiple clients </dd>
		<dt>2010</dt><dd>Rise of Social Networking providers such as Facebook Chat, Twitter which uses Web 2.0 instant messaging system </dd>
		</dl>
	</section>
	
	
	<aside class="index_aside2">
		<p>Some of the pros of IM are informal chat, group discussions, etc.,</p>
		<p>Some of the cons of IM are participation, noise, lack of push, etc.,</p>
	</aside>
	
	
	<section id="risks">
		<h2>Compliance risks &amp; Security</h2>
		<p>Though the communications are secured using end to end encryption technologies, there are some risks involved using IM technology such as viruses and worms during file transfers, Identity theft, Firewall tunneling, Data security leaks and Spams</p> 
	</section>
	
	<section id="future">
		<h2>Future of Instant Messaging</h2>
		<p>The future of IM is quite huge and strong. People will become more engage, mobile security will become a top priority, application to person messaging will become widespread and a new computing interface are expected in the near future.
		The report from<a href="http://amp.dynamicsignal.com/rs/362-RJN-040/images/the-state-of-workplace-communications-rb.pdf?_ga=2.158336191.404463700.1532091200-357357348.1530550512" target="_blank"> Dynamic Signal</a> found that only 17 percent of companies had invested in Instant Messaging applications for workplace such as Slack for internal communications.
		Since AI is the next huge thing, we can expect Chatbots helpful in finding and sharing information among employees as they communicate.</p>
	</section>
	
	<section id="comparision">
		<h2>Comparision of cross-platform instant messaging clients</h2>
		<p>The following table compares the user base of some top Instant Messaging Applications</p>
		<table id="topic_table">
		<tr><th>Client</th><th>Developer</th><th>Monthly Active Users</th></tr>
		<tr><td>Discord</td><td>Discord Inc.</td><td>250 million</td></tr>
		<tr><td>Facebook Messenger</td><td>Facebook Inc.</td><td>1300 million</td></tr>
		<tr><td>Discord</td><td>Discord Inc.</td><td>250 million</td></tr>
		<tr><td>Line</td><td>Line Corporation</td><td>203 million</td></tr>
		<tr><td>Skype</td><td>Skype Technologies, a subsidiary of Microsoft Corporation</td><td>300 million</td></tr>
		<tr><td>Snapchat</td><td>Snap Inc.</td><td>294 million</td></tr>
		<tr><td>WhatsApp</td><td>WhatsApp Inc., a subsidiary of Facebook</td><td>2000 million</td></tr>
		</table>
	</section>
	
	<section class="references">
		<h3>References</h3>
		<ol>
		<li><a href="https://en.wikipedia.org/wiki/Instant_messaging" target="_blank">Instant Messaging-Wikipedia</a></li>
		<li><a href="https://www.workforce.com/news/instant-messaging-future-workplace-communication" target="_blank">Future of communication</a></li>
		<li><a href="http://www.corelangs.com/css/box/zoom.html" target="_blank">Animation-zoom effect on hover</a></li>
		<li><a href="https://stackoverflow.com/questions/14263594/how-to-show-text-on-image-when-hovering" target="_blank">Add text on image when hover-stackoverflow</a></li>
		<li><a href="https://codepen.io/dudleystorey/pen/ehKpi" target="_blank">Responsive CSS image slider</a></li>
		<li><a href="https://www.w3schools.com/cssref/css3_pr_animation-timing-function.asp" target="_blank">CSS animation-timing-function Property</a></li>
		<li><a href="https://www.w3schools.com/cssref/css3_pr_animation-play-state.asp" target="_blank">CSS animation-play-state Property</a></li>
		<li><a href="https://www.w3schools.com/cssref/css3_pr_animation-keyframes.asp" target="_blank">CSS @keyframes Rule</a></li>
		<li>Week 2, Week 3 and 4 Lecture slides</li>
		<li>Lab02, Lab03 and Lab04 materials</li>
		</ol>
		</section>

	</div>
	</main>
	<?php 
		include_once "footer.inc";
	?>
	
</body>

</html>