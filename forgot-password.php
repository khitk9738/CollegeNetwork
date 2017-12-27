<?php
include('./classes/DB.php');
include('./classes/Mail.php');
if (isset($_POST['resetpassword'])) {
        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $email = $_POST['email'];
        $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
        DB::query('INSERT INTO password_tokens VALUES (LAST_INSERT_ID(), :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
        Mail::sendMail('Forgot Password!', "<a href='http://localhost/social/change-password.php?token=$token'>http://localhost/social/change-password.php?token=$token</a>", $email);
        echo 'Email sent!';
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeNetwork</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    
</head>

<body>
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
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-people"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" id="email" name="email" placeholder="Email...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" id="resetpassword" name="resetpassword" type="button" data-bs-hover-animate="shake">Submit</button>
            </div></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
        $('#resetpassword').click(function() {
                $.ajax({
                        type: "POST",
                        url: "api/forgot",
                        processData: false,
                        contentType: "application/json",
                        data: '{ "email": "'+ $("#email").val() +'" }',
                        success: function(r) {
                                console.log(r),
								alert("Email sent!");
						},		
                        error: function(r) {
                                setTimeout(function() {
                                $('[data-bs-hover-animate]').removeClass('animated ' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'));
                                }, 2000)
                                $('[data-bs-hover-animate]').addClass('animated ' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'))
                                console.log(r)
                        }
                });
        });
		
    </script>
</body>

</html>