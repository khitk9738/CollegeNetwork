<?php 

include("includes/connect.php");

$select_posts = "select * from posts order by 1 DESC LIMIT 0,16";

$run_posts = mysqli_query($con,$select_posts);

while($row=mysqli_fetch_array($run_posts)){
	echo "<li class='list-group-item'>";
	$post_id = $row['post_id']; 
	$post_title = $row['post_title'];
	$post_date = $row['post_date'];
	$post_author = $row['post_author'];
	$post_image = $row['post_image'];
	$post_content = substr($row['post_content'],0,200);

?>


<center>
<h2>
<a href="pages.php?id=<?php echo $post_id; ?>">

<?php echo $post_title; ?>

</a>

</h2>

<p align="left">Published on:&nbsp;&nbsp;<b><?php echo $post_date; ?></b></p>

<p align="right">Posted by:&nbsp;&nbsp;<b><?php echo $post_author; ?></b></p>

<center><img src="images/<?php echo $post_image; ?>" width="500" height=auto /></center></b>


<strong><p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p></strong>

<hr>

<?php 
	echo "</li>";
} ?>
</center>
</li>





