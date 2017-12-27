<?php
include('./classes/DB.php');
include('./classes/Login.php');
$tokenIsValid = False;
if (Login::isLoggedIn()) {
        if (isset($_POST['changepassword'])) {
                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrepeat = $_POST['newpasswordrepeat'];
                $userid = Login::isLoggedIn();
                if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) {
                        if ($newpassword == $newpasswordrepeat) {
                                if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
                                        DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));                                        
										echo "<script type='text/javascript'>";
										echo "alert('Password changed successfully!');";
										echo"</script>";
                                }
                        } 			
						 else {
                                echo "<script type='text/javascript'>";
								echo "alert('Password not Matched');";
								echo"</script>";
                        }
                } else {                
						echo "<script type='text/javascript'>";
						echo "alert('Incorrect old password!');";
						echo"</script>";
                }
        }
} else {
        if (isset($_GET['token'])) {
        $token = $_GET['token'];
        if (DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))) {
                $userid = DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
                $tokenIsValid = True;
                if (isset($_POST['changepassword'])) {
                        $newpassword = $_POST['newpassword'];
                        $newpasswordrepeat = $_POST['newpasswordrepeat'];
                                if ($newpassword == $newpasswordrepeat) {
                                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
                                                DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                                echo "<script type='text/javascript'>";
												echo "alert('Password changed successfully!');";
												echo"</script>";
                                                DB::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
                                        }
                                } else {
                                        echo "<script type='text/javascript'>";
										echo "alert('Password not Matched');";
										echo"</script>";										
                                }
                        }
        } else {
                die('Token invalid');
        }
} else {
        die('Not logged in');
}
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeNetwork</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<div class="login-clean">
<!------------------------ Sidebar ------------------------------------------------->
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
<!---------------------------------------------- End of sidebar --------------------------------->
	<form action="<?php if (!$tokenIsValid) { echo 'change-password.php'; } else { echo 'change-password.php?token='.$token.''; } ?>" method="post">
		<h2 class="sr-only">Create Account</h2>
			<div class="illustration"><i class="icon ion-ios-people"></i></div>
        <div class="form-group">
			<?php if (!$tokenIsValid) { echo '<input class="form-control" type="password" name="oldpassword" value="" placeholder="Current Password ...">'; } ?>
		</div>
        <div class="form-group">
			<input class="form-control" type="password" name="newpassword" value="" placeholder="New Password ...">
		</div>
        <div class="form-group">
			<input class="form-control" type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password ...">
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-block" type="submit" name="changepassword" value="Change Password" data-bs-hover-animate="shake">Change Password</button>
		</div>
	</form>
</div>

