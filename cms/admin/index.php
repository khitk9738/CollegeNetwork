<?php
include('../.././classes/DB.php');
include('../.././classes/Login.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        die('Not logged in');
}
	$username="";
	$username=DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];
	if($username!="Verified"){
		echo "<script>alert('You are not authorised')</script>";
		echo "<script>window.open('../../index1.php','_self')</script>";
	}
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Network</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="../../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/untitled.css">
	<link rel="stylesheet" href="admin_style.css" />
</head>
	
<body>
    <div>
        <nav class="navbar navbar-default hidden-xs navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="../../index1.php"><i class="icon ion-ios-people"></i></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                   
                        
						<form action="../search.php" method="get" class="navbar-form navbar-left" enctype="multipart/form-data">
						<div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control" type="text" name="sbox" value="">
                        </div>
						</form>						
                    
                    <ul class="nav navbar-nav hidden-md hidden-lg navbar-right">
                        <li role="presentation"><a href="../../index1.php">Timeline</a></li>  
						<li role="presentation"><a href="../index.php">Articles</a></li>
                    </ul>
                    <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right">
                        <li role="presentation"><a href="../../index1.php">Timeline</a></li>
                        <li role="presentation"><a href="../index.php">Articles</a></li>
                        <li role="presentation"><a href="../branches.htnl">Branches</a></li>                   
                    </ul>
                </div>
            </div>
        </nav>
    </div>


</div> 

<div class="container">
	<div class="row">	
		<div class="col-md-10">
		<div class="timelineposts">
		<li class="list-group-item">
			<h1>Welcome to your Admin Panel</h1>
			<p> This is your admin panel, where you can manage your website files and content</p>
		</li>
		</div>
		</div>
		<div class="col-md-10">
		<div class="timelineposts">
		<li class="list-group-item">
<?php 
	
	if(isset($_GET['insert'])){
	
	include("insert_post.php");
	
	}


?>
		</li>	
		</div>
		</div>
	</div>	
</div>


<script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<!-- Sidebar-------------------------------------------------------------------------------------->	
 <link href="../../chat/style.css" rel="stylesheet">
    <script src="../../chat/script.js"></script>
 <div class="container"> 
  <div class="chat_box">
	<div class="chat_head"> Options</div>
		<div class="chat_body"> 	
			<center>
			<h2><a href="index.php"><?php echo "ADMIN"; ?></a></h2>
			<h2><a href="../../logout.php">Logout</a></h2>
			<h2><a href="view_posts.php">View Posts</a></h2>
			<h2><a href="index.php?insert=insert">Insert New Post</a></h2>
			</center>
		</div>
	</div>
</div> 
<!-- Sidebar------------------------------ended-------------------------------------------------------->	

</body>

