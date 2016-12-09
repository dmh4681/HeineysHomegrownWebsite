<html>
 <head>
  <title>Contact Information</title>
  <link type="text/css" rel="stylesheet" href="main.css" />
 </head>
 
 <body>
 
 <?php
 
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$visitor_email = $_POST['email'];
		$message = $_POST['message'];

		//Validate first
		if(empty($name)||empty($visitor_email)) 
		{
			echo "Name and email are mandatory!";
			exit;
		}

		if(IsInjected($visitor_email))
		{
			echo "Bad email value!";
			exit;
		}

		$email_from = 'dylan@heineyhomegrownhealth.com';//<== update the email address
		$email_subject = "New Form submission";
		$email_body = "You have received a new message from the user $name.\n".
			"Here is the message:\n $message";
    
		$to = "dylan@heineyhomegrownhealth.com";//<== update the email address
		$headers = "From: $email_from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		//Send the email!
		mail($to,$email_subject,$email_body,$headers);
		//done. redirect to thank-you page.
		//header('Location: thank-you.html');

		// Function to validate against any email injection attempts
		function IsInjected($str)
		{
		$injections = array('(\n+)',
					'(\r+)',
					'(\t+)',
					'(%0A+)',
					'(%0D+)',
					'(%08+)',
					'(%09+)'
					);
		$inject = join('|', $injections);
		$inject = "/$inject/i";
		if(preg_match($inject,$str))
			{
			return true;
		}
		else
			{
			return false;
		}
		}
	}
	else
	{
		echo "<div class="header"> 
	<h1 class="deepshadow">Heiney Homegrown Health</h1>
 
  <div class="nav">
   <ul>
   <li><a href="index.html">Home / Blog </a> </li>
   <li><a class="active" href="contact.html"> Contact Information </a> </li>
  </ul>
  </div>
  </div>
  
 <div class="content">
 <div id="scrollable">
  
  <table id="contact-table">
  <caption> Contact Information </caption>
  
  <tr>
	<td> Dylan Heiney</td>
  </tr>
  
  <tr>
	<td> National Academy of Sports Medicine Certified Personal Trainer (NASM-CPT) </td>
  </tr>
  
  <tr>
	<td> Email: dylan.heineytrainer@gmail.com</td>
  </tr>
  
  <tr>
	<td> Phone: 314.596.8623 (cell) </td>
  </tr>
  
  <tr>
	<td> 
		<a href="https://www.facebook.com/dylan.heiney"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/facebook.svg">Facebook</a>
		<a href="https://twitter.com/dheineytrainer"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/twitter.svg">Twitter</a>
		<a href="https://www.instagram.com/dheineytrainer/"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/instagram.svg">Instragram</a>
	</td>
  </tr>
  
  </table>
  
 <div class="contact-message"> 
  <p>Currently I have very little to show on my Twitter and Instagram accounts (I made them both recently),
  so I apologize for that. I mainly intend to use this personal website / blog to communicate with the world,
  so I may not keep up with Twitter, Instagram, AND Facebook every day. However, feel free to reach out to me on 
  any of these social media sites if you have any questions for me! My preferred method of communication in regards to training 
  is email. To make it even easier for you, I have provided a short form below that you may use to send me a quick message. (The email form
  is currently not functional but I am working on it!)</p>
 </div>
 

 <div class="emailform">
	
	<form method="post" action="contact.php">
	
		<label for="name">Full Name</label>
		<input type="text" name="name">
		
		<label for="email_from">Email Address</label>
		<input type="text" name="email">
		
		<label for="reason">Reason for email</label>
		<select name="reason">
			<option value="training">Interested in Personal Training</option>
			<option value="price">Question about specific packages / pricing</option>
			<option value="qa">General question about fitness, health, and wellness</option>
			<option value="other">Other</option>
		</select>
		
		<label for="message">Message to Dylan Heiney</label>
		<textarea name="message">Write your message here ...</textarea>

		
		<input type="submit" name="submit" value="Send Email">
	</form>
	
 </div>
 </div>
 </div>";
	}
 
  
  
  
  ?>
 </body>
</html>