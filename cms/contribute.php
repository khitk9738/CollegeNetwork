
<?php
include('.././classes/DB.php');
include('.././classes/Login.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        die('Not logged in');
}
	$username="";
	$username=DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Network</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
	<link rel="stylesheet" href="style.css" media="all">
	<script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
</head>

<body>
    <header class="hidden-sm hidden-md hidden-lg">
        <div class="searchbox">
            
                <h1 class="text-left">College Network</h1>
                <form action="search.php" method="get" enctype="multipart/form-data">
						<div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control" type="text" name="sbox" value="">
                        </div>
				</form>
			
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">MENU <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li role="presentation"><a href="../profile.php?username=<?php echo $username;?>">My Profile</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="../index1.php">Timeline </a></li>
                        <li role="presentation"><a href="../index.html">Home </a></li>
                        <li role="presentation"><a href="../notify.php">Notifications </a></li>
                        <li role="presentation"><a href="../my-account.php">My Account</a></li>
						<li role="presentation"><a href="../messages.php">Messages</a></li>
                        <li role="presentation"><a href="../logout.php">Logout </a></li>
                    </ul>
                </div>
            </form>
        </div>
        <hr>
    </header>
    <div>
        <nav class="navbar navbar-default hidden-xs navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="../index1.php"><i class="icon ion-ios-people"></i></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                   
                        
						<form action="search.php" method="get" class="navbar-form navbar-left" enctype="multipart/form-data">
						<div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control" type="text" name="sbox" value="">
                        </div>
						
						</form>						
                    
                    <ul class="nav navbar-nav hidden-md hidden-lg navbar-right">
                        <li role="presentation"><a href="../index1.php">Timeline</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="../profile.php?username=<?php echo $username;?>">My Profile</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="../index1.php">Timeline </a></li>
                                <li role="presentation"><a href="../index.html">Home </a></li>
                                <li role="presentation"><a href="../notify.php">Notifications </a></li>
                                <li role="presentation"><a href="../my-account.php">My Account</a></li>
								<li role="presentation"><a href="../messages.php">Messages</a></li>
                                <li role="presentation"><a href="../logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right">
                        <li role="presentation"><a href="contribute.php">Contribute</a></li>
                        <li role="presentation"><a href="index.php">Articles</a></li>
                        <li role="presentation"><a href="branches.html">Branches</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="../profile.php?username=<?php echo $username;?>">My Profile</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="../index1.php">Timeline </a></li>
                                <li role="presentation"><a href="../index.html">Home </a></li>
                                <li role="presentation"><a href="../notify.php">Notifications </a></li>
                                <li role="presentation"><a href="../my-account.php">My Account</a></li>
								<li role="presentation"><a href="../messages.php">Messages</a></li>
                                <li role="presentation"><a href="../logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

								
		
	<div class="container">	
		<div class="row">
				<div class="col-md-9">
                    <ul class="list-group">
                            <div class="timelineposts">
							<li class="list-group-item">
								<form method="post" action="contribute.php" enctype="multipart/form-data">
							
									<table width=100% align="center"  class="btn btn-default">
										
										<tr>
											<td align="center"  style="background:linear-gradient(140deg, rgb(81, 255, 182), rgb(87, 160, 255));;" colspan="6"><strong><h2>Insert New Post Here</h2></strong></td>
										</tr>
										
										<tr>
											<td align="right">Post Title:</td>
											<td><input type="text" name="title" size="30"></td>
										</tr>
										
										<tr>
											<td align="right">Post Author:</td>
											<td><input type="text" name="author" size="30"></td>
										</tr>
										
										<tr>
											<td align="right">Post Keywords:</td>
											<td><input type="text" name="keywords" size="30"></td>
										</tr>
										
										<tr>
											<td align="right">Post Image:</td>
											<td><input type="file" name="image"></td>
										</tr>
										
										<tr>
											<td align="right">Post Content:</td>
											<td><textarea name="content" cols="30" rows="15"></textarea></td>
										</tr>
										<script>
											CKEDITOR.replace( 'content' );
										</script>
										
										<tr>
											<td align="center" colspan="6"><input type="submit" name="submit" value="Publish Now"></td>
										</tr>

			
									</table>
								</form>
								
<?php 
include("includes/connect.php"); 

if(isset($_POST['submit'])){

	  $post_title = $_POST['title'];
	  $post_date = date('m-d-y');
	  $post_author = $_POST['author'];
	  $post_keywords = $_POST['keywords'];
	  $post_content = $_POST['content'];
	  $post_image= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	
	if($post_title=='' or $post_author=='' or $post_keywords=='' or $post_content=='' or $post_image==''){
	
	echo "<script>alert('Any of the fields is empty')</script>";
	exit();
	}

	else {
	
	 move_uploaded_file($image_tmp,"images/$post_image");
	
	  $insert_query = "insert into posts (post_title,post_date,post_author,post_image,post_keywords,post_content) values ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$post_content')";
	
	if(mysqli_query($con,$insert_query)){
	
	echo "<script>alert('post published successfuly')</script>";
	
	}


}


}

?>
							</li>	
								
                            </div>
                    </ul>
                </div>									
		</div>
	</div>
		
           
				
	
    <div class="footer-dark navbar-fixed-bottom">
        <footer>
            <div class="container">
                <p class="copyright">College Network© 2017</p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
   
	<!-- Sidebar-------------------------------------------------------------------------------------->	
 <link href="../chat/style.css" rel="stylesheet">
    <script src="../chat/script.js"></script>
 <div class="container"> 
 <div class="row">
 <div class="col-md-3">
  <div class="chat_box">
	<div class="chat_head"> Recent Posts</div>
	<div class="chat_body" style="overflow-y:auto;max-height:450px;"> 	
		

		

<div>
	<?php 
	include("includes/connect.php");

	$query = "select * from posts order by 1 DESC LIMIT 0,10";

	$run = mysqli_query($con,$query); 
	
	while ($row=mysqli_fetch_array($run)){
	
	$post_id = $row['post_id'];
	$title = $row['post_title'];
	$image = $row['post_image'];

	?>
	<center>
	
	<a href="pages.php?id=<?php echo $post_id; ?>">
	<h3><?php echo $title; ?></h3></a>
	
	<a href="pages.php?id=<?php echo $post_id; ?>">
	<img src='images/<?php echo $image; ?>' width='90%' height=auto></a>
	
	</center>
	
	<?php } ?>
	<br/>
	</div>


</div>
</div>
 </div> 
 </div>
 </div>
<!-- Sidebar------------------------------ended-------------------------------------------------------->	

	
	
</body>

</html>