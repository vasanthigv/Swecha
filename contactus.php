<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['phone']);
		$address = htmlspecialchars($_POST['address']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'vassu.cool@gmail.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Phone</h4><p>'.$phone.'</p>
					<h4>Address</h4><p>'.$address.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>swecha-contact</title>
	<link href="stuff/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="swecha.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div class="container-fluid">
		<!-- Menu bar using bootstrap -->
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-md  navbar-light">
					<a class="navbar-brand" href="index.html"><img src="stuff/images/logo1.png" class="img-fluid" ></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#stoggle">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="stoggle">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="index.html" style="font-family: swecha;">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="aboutus.html" style="font-family: swecha;">About Us</a>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="activities.html" style="font-family: swecha;">Activities</a>
								</li>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link" href="#" style="font-family: swecha;">Get Involved</a>
									<div class="dropdown-content">
										<a href="volunteer.html">Volunteer</a>
										<a href="join.html">Join our team</a>
									</div>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="#" style="font-family: swecha;">Donate</a>
								</li>

								<li class="nav-item">
									<a class="nav-link activeclass" href="#" style="font-family: swecha;">Contact Us</a>
								</li>
							</ul>
						</div>
				</nav>
			</div>
		</div><!--menu bar-->
	</div>
	<div class="container">
	<h1>CONTACT US</h1>
		<div class="row" style="padding: 10px;">
			<div  class="col-md-6">
			<h3>All General Queries</h3>
			info.swechanitw@gmail.com
			<br>
			</div>
			<div class="col-md-6" >
			<h3>Donation Related Queries</h3>
			Kranthi:+91 9999999999 <br>
			Meghana:+91 8888888888 <br>
			donation.swechanitw@gmail.com <br>
			</div>
		</div>
	
	<div style="padding: 10px; clear:both;">
	<h1 >HELPDESK</h1>
	For any grievance,suggestions and queries kindly write to us. <br>
	*All fields are mandatory
	</div>
	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="form-group">
		<table class="table table-light">
			<tr>
				<td>Name*</td>
				<td><input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" ></td>
			</tr>
			<tr>
				<td>Email*</td>
				<td><input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" class="form-control" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" class="form-control" value="<?php echo isset($_POST['address']) ? $address : ''; ?>"></td>
			</tr>
			<!--<tr>
				<td>Message*</td>
				<td><input type="text" name="message" class="form-control">
			</tr>-->
			<tr>
				<td></td>
				<td><textarea name="message"  placeholder="Write your message here..."><?php echo isset($_POST['message']) ? $message : ''; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" name="submit" class="btn tealbtn">Submit</button></td>
			</tr>
		</table>
	</div>
</form>

</div>
<div class="container-fluid">

			<div class="footer row"> <!--footer-->
				<div class="col-md-6 col-sm-12 col-12 col-lg-6" style="text-align: justify;margin-top: 10px;">
					<h4>ABOUT US</h4>
					Smile Foundation is an Indian development organisation directly benefitting over 400,000 children and families through more than 200 welfare projects in education,health, livelihood and woman empowerment spread across remote villages and slums in 25 states in India.Smile Foundation is an Indian development organisation directly benefitting over 400,000 children and families through more than 200 welfare projects in education,health, livelihood and woman empowerment spread across remote villages and slums in 25 states in India.
				</div>
				<div class="col-md-2 col-sm-6 col-12 col-lg-2 footlink" style="margin-top: 10px;" >
					<h4>QUICK LINKS</h4>
					<a href="#" class="linkcol">Education</a><br>
					<a href="#" class="linkcol">Health</a><br>
					<a href="#" class="linkcol">Women Empowerment</a><br>
					<a href="#" class="linkcol">Career Guidance</a><br>
					<a href="#" class="linkcol">Menstual hygiene</a><br>
					<a href="#" class="linkcol">School for all</a><br>

				</div>
				<div class="col-md-1 col-sm-6 col-6 col-lg-1" style="margin:50px 0px 50px 0px;">
					<button id="write" class="btn yellowbtn" data-toggle="modal" data-target="#contactpopup">write to us</button>
				</div>
				<div class="modal fade" id="contactpopup">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">WRITE TO US</h3>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<table class="table table-light">
										<tr>
											<td>Name*</td>
											<td><input type="text" name="name" class="form-control" autofocus="autofocus"><span id="txt1"></span></td>
										</tr>
										<tr>
											<td>Email*</td>
											<td><input type="text" name="email" class="form-control"><span id="txt2"></span></td>
										</tr>
																				
										<tr>
										<td></td>
										<td><textarea name="message" placeholder="Write your message here..."></textarea><span id="txt3"></span></td>
										</tr>
										
										</table>

							</div>
						</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-secondary">Send Message</button>
								
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12 col-lg-3" style="margin:50px 0px 50px 0px;><!--social media-->
					<a href="#"><img src="stuff/images/fb.png" class="imgsocial"></a>
					<a href="#"><img src="stuff/images/twitter.png" class="imgsocial"></a>
					<a href="#"><img src="stuff/images/youtube.png" class="imgsocial"></a>
					
				</div>

			</div>
			<div class="row">
			<div class="bottom col-md-12" >&copy;Swecha NITW 2018</div>
			
			</div>

		</div> <!--container-->



<!-- 
<script type="text/javascript">
	function valname()
{
	var name1=document.myform.name.value;
	if(name1=="")
	{
		document.getElementById("txt1").innerHTML="  field can't be left empty";
	}
}
	function valemail()
{
	var name1=document.myform.email.value;
	if(name1=="")
	{
		document.getElementById("txt2").innerHTML="  field can't be left empty";
	}
}
	function valmsg()
{
	var name1=document.myform.message.value;
	if(name1=="")
	{
		document.getElementById("txt3").innerHTML="  field can't be left empty";
	}
}
function final()
{
	var name1=document.myform.name.value;
	var name2=document.myform.email.value;
	var name3=document.myform.message.value;
	if(name1==""||name2==""||name3=="")
	{
		alert("please enter all the required fields");
	}
}
</script>
 --><script src="stuff/js/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="stuff/js/bootstrap.js"></script>
</body>
</html>