<?php 
	
	define("TITLE", "Deaundrie | Contact");

	include ('includes/header.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--	<link rel="stylesheet" type="text/css" href="normalize.css">-->
<!--	<link rel="stylesheet" type="text/css" href="footer-dwaap.css">-->
	<link rel="stylesheet" type="text/css" href="contact.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,300italic' rel='stylesheet' type='text/css'>
	<title> Deaundrie Howard</title>
</head>
<body>
	
  <!-- Contact Section -->
    
    <div class="container-fluid jumbotron">
    		<h1 style="text-align:center;" class="lead"> Contact </h1>
    		<p style="text-align:center;">Please feel free to say hello! </p>

    		<?php 

    			//Check for header injections
    			function has_header_injection($str) {
    				return preg_match("/[\r\n]/", $str);

    		}

    			// Check to see if the Contact Submit was pressed 
    			if (isset($_POST["contact_submit"])) {

    				$name = trim($_POST['name']);
    				$email = trim($_POST['email']);
    				$msg = $_POST['message'];
  				
  				// Check to see if $name or $email have header injections

    			if (has_header_injection($name) || has_header_injection($email)) {
    				die(); // IF true, will quit script
    			}

    			// Add a recipient email to a variable 
    			$to = "deaundrie7@gmail.com";

    			//Create a subject 
    			$subject = "$name sent you a message via your portfolio\'s contact form";

    			//Construct the message
    			$message  = "Name: $name\r\n";
    			$message .= "Email: $email\r\n";
    			$message .= "Message: $message\r\n";

    			$message = wordwrap($message, 72);

    			// Set the mail header into a variable
    			$headers = "MIME-Verson: 1.0\r\n";
    			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    			$headers .= "From: $name <$email> \r\n";
    			$headers .= "X-Priority: 1\r\n";
    			$headers .= "X-MSMail-Priority: High\r\n\r\n";

    			// Send the email!!

    			mail($to, $subject, $message, $headers)
    		?>
    		<h5> Thank you for contacting me! </h5>
    		<p> Please allow 24 hours for a response. </p>
    		<?php } else { ?>


    </div>
    <div class="container">
    		<form method="post" role="form" action=" " id="contact-form" class="form-group">
    			<label for="name" class="control-label"> Name: </label>
    			<input class="form-control" type="text" name="name" id="name" required>

    			<label for="email"> Email: </label>
    			<input  class="form-control" type="email" name="email" id="email">

    			<label for="message"> Message: </label>
    			<textarea  class="form-control" id="message" name="messgea" required> </textarea>

    			<input type="submit" class="btn btn-success" name="contact_submit" value="Send Message" style="padding:10px;">
    		</form>
    </div>
<?php } ?>

    <!-- End of Contact -->

	<!-- Javascript, Boostrap.js, & Other Frameworks -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>

    <!-- Footer Section -->
    <?php 
    	include ('includes/footer.php')
    ?>
    <!-- End of Footer -->
 </body>
 </html>