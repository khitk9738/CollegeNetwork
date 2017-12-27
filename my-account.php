<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Image.php');
if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        die('Not logged in!');
}
if (isset($_POST['uploadprofileimg'])) {
        Image::uploadImage('profileimg', "UPDATE users SET profileimg = :profileimg WHERE id=:userid", array(':userid'=>$userid));
		echo "<script type='text/javascript'> 
		alert('Profile picture uploaded successfully');
		</script>";
}
	
if (isset($_POST['s_ubmit'])) {
		$name = $_POST['name'];
	$contactno = $_POST['contactno'];
	$regno = $_POST['regno'];
    $branch = $_POST['branch'];
	$college = $_POST['college'];
        DB::query('INSERT INTO addinfo VALUES (:userid,:name,:contactno,:regno,:branch,:college)', array(':userid'=>$userid, ':name'=>$name, ':contactno'=>$contactno, ':regno'=>$regno, ':branch'=>$branch, ':college'=>$college));
		
		echo "<script type='text/javascript'> 
		alert('Information submitted successfully');
		</script>";
	}
?>




<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeNetwork</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    
</head>

<body>

<div class="row">
    <div class="login-clean" >  
	<!------------------------ Sidebar ------------------------------------------------->
	<div class="col-md-3">
<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="slider/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="slider/css/style.css">
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
	<!-- Scripts -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="slider/js/menu_toggle.js"></script>
<i class="fa fa-bars toggle_menu"></i>

	<div class="sidebar_menu">
		<i class="fa fa-times"></i>
		<center>
			<a href="index.html"><h1 class="boxed_item">College<span class="logo_bold">Network</span></h1>
			</a>
		</center>

		<ul class="navigation_section">
			<a href="index1.php"><li class="navigation_item" id="timeline">
				TIMELINE
			</li>
			</a>
			<a href="cms"><li class="navigation_item" id="articles">
				ARTICLES
			</li>
			</a>
			<a href="cms/contribute.php"><li class="navigation_item" id="videos">
				CONTRIBUTE
			</li>
			</a>
			<a href="cms/branches.html"><li class="navigation_item" id="branches">
				BRANCHES
			</li>
			</a>
			<a href="change-password.php"><li class="navigation_item" id="chngpswd">
				CHANGE PASSWORD
			</li>
			</a>
			<a href="logout.php"><li class="navigation_item" id="logout">
				LOGOUT
			</li>
			</a>
			
		</ul>

		<center>
			<a href="create-account.html"><h1 class="boxed_item boxed_item_smaller signup">
			<i class="fa fa-user"></i>
				SIGN UP
			</h1></a>
		</center>
	</div>

	<script src="slider/js/close_menu.js"></script>
</div>
<!---------------------------------------------- End of sidebar --------------------------------->
		<div class="col-md-3">
		<form  action="my-account.php" method="post" enctype="multipart/form-data" >
            <h2 class="sr-only" >Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-people"></i></div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="file" id="username" name="profileimg" >
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary btn-block" name="uploadprofileimg" value="Upload Image" id="login" type="submit" >
            </div>
			</form>
		</div>
		<div class="col-md-6">
			<form  action="my-account.php" method="post" style= "background:linear-gradient(#c0392b, #8e44ad);">
             <h2 class="sr-only ">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-people"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" id="username" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="number" id="password" name="contactno" placeholder="Contact No.">
            </div>
			<div class="form-group">
                <input class="form-control" type="number" id="password" name="regno" placeholder="Registration No.">
            </div>
			<div class="form-group">
                <select name="branch" placeholder="Branch" class="btn btn-default">
					<option value="Branch">Branch</option>
					<option value="Computer Science">Computer Science</option>
					<option value="Information Technology">Information Technology</option>
					<option value="Electronics & Communication">Electronics & Communication</option>
					<option value="Electrical">Electrical</option>
					<option value="Mechanical">Mechanical</option>
					<option value="Civil">Civil</option>
					<option value="Production & Instrumentation">Production & Instrumentation</option>
					<option value="Biotechnology">Biotechnology</option>
				</select>
            </div>
			<div class="form-group">
                <select name="college" placeholder="College" class="btn btn-default">
					<option value="College">College</option>
					<option value="IIT Delhi">IIT Delhi</option>
					<option value="IIT Bombay">IIT Bombay</option>
					<option value="IIT Madras">IIT Madras</option>
					<option value="IIT Kharagapur">IIT Kharagapur</option>
					<option value="IIT Kanpur">IIT Kanpur</option>
					<option value="IIT-BHU">IIT-BHU</option>
					<option value="IIT Guhuwati">IIT Guhuwati</option>
					<option value="IIT Roorkee">IIT Roorkee</option>
					<option value="IIT Hyderabad">IIT Hyderabad</option>
					<option value="IIT Gandhinagar">IIT Gandhinagar</option>
					<option value="IIT Ropar">IIT Ropar</option>
					<option value="IIT Mandi">IIT Mandi</option>
					<option value="NIT Trichy">NIT Trichy</option>
					<option value="NIT Warangal">NIT Warangal</option>
					<option value="NIT Surathkal">NIT Surathkal</option>
					<option value="NIT Allahabad">NIT Allahabad</option>
					<option value="Others">Others</option>
				</select>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" id="login" name="s_ubmit" value="Submit" type="submit" >
            </div>
			</form>
		</div>
    </div>
</div>
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
   
</body>

</html>