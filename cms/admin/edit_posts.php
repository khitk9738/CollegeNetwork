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
	<script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
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


<?php 

include("includes/connect.php");

if(isset($_GET['edit'])){
	
	$edit_id = $_GET['edit'];
	
	$edit_query = "select * from posts where post_id='$edit_id'";
	
	$run_edit = mysqli_query($con,$edit_query); 
	
	while ($edit_row=mysqli_fetch_array($run_edit)){
	
	
		$post_id = $edit_row['post_id'];
		$post_title = $edit_row['post_title'];
		$post_author = $edit_row['post_author'];
		$post_keywords = $edit_row['post_keywords'];
		$post_image = $edit_row['post_image'];
		$post_content = $edit_row['post_content'];
	}
}
?>

<div class="container">
<div class="row">	
<div class="col-md-10">
<div class="timelineposts">
<li class="list-group-item">
<form method="post" class="btn btn-default" action="edit_posts.php?edit_form=<?php echo $edit_id; ?>" enctype="multipart/form-data">
	
	<table width=100% align="center"  >
		
		<tr>
			<td align="center" style="background:linear-gradient(140deg, rgb(81, 255, 182), rgb(87, 160, 255));;" colspan="6"><h1>Edit The Post Here</h1></td>
		</tr>
		
		<tr>
			<td align="right">Post Title:</td>
			<td><input type="text" name="title" size="30" value="<?php echo $post_title; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Post Author:</td>
			<td><input type="text" name="author" size="30"value="<?php echo $post_author; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Post Keywords:</td>
			<td><input type="text" name="keywords" size="30"value="<?php echo $post_keywords; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Post Image:</td>
			<td>
			<input type="file" name="image"> 
			<img src="../images/<?php echo $post_image;?>" width="100" height="100"></td>
		</tr>
		
		<tr>
			<td align="right">Post Content:</td>
			<td><textarea name="content" cols="30" rows="15"><?php echo $post_content; ?></textarea></td>
		</tr>
		<script>
            CKEDITOR.replace( 'content' );
        </script>
		
		<tr>
			<td align="center" colspan="6"><input type="submit" name="update" value="Update Now"></td>
		</tr>		
	</table>

</form>

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

<?php
	
	if(isset($_POST['update'])){
	
	$update_id = $_GET['edit_form'];
	$post_title1 = $_POST['title'];
	  $post_date1 = date('m-d-y');
	  $post_author1 = $_POST['author'];
	  $post_keywords1 = $_POST['keywords'];
	  $post_content1 = $_POST['content'];
	  $post_image1= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	
	if($post_title1=='' or $post_author1=='' or $post_keywords1=='' or $post_content1=='' or $post_image1==''){
	
	echo "<script>alert('Any of the fields is empty')</script>";
	exit();
	}

	else {
	
	 move_uploaded_file($image_tmp,"../images/$post_image1");
		
		$update_query = "update posts set post_title='$post_title1',post_date='$post_date1',post_author='$post_author1',post_image='$post_image1',post_keywords='$post_keywords1',post_content='$post_content1' where post_id='$update_id'";
		
		if(mysqli_query($con,$update_query)){
		
		echo "<script>alert('Post has been updated')</script>";
		
		echo "<script>window.open('view_posts.php','_self')</script>";
		
		}
	
	}
	}



?>
