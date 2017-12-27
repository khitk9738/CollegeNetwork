<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (!Login::isLoggedIn()) {
        die("Not logged in.");
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


        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-people"></i></div>
			<b><center><p>Are you sure you'd like to logout?</p></center></b>
		 
            
            <div class="form-group" >
                <button class="btn btn-primary btn-block" id="logout" name="logout" type="button" data-bs-hover-animate="shake">LogOut</button>
            </div><a href="index.html" class="forgot">Go to Home</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
        $('#logout').click(function() {
				
				$.ajax({
                        type: "POST",
                        url: "api/logout",
                        processData: false,
                        contentType: "application/json",
						
                        success: function(r) {
                                console.log(r),
								alert("Logged out Successfully");
								window.location = "index.html"
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