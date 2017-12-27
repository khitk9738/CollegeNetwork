<?php
include('./classes/DB.php');
include('./classes/Login.php');
if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
		$username="";
		$username=DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];
} else {
        die('Not logged in');
}

if (isset($_GET['mid'])) {
        $message = DB::query('SELECT * FROM messages WHERE id=:mid AND (receiver=:receiver OR sender=:sender)', array(':mid'=>$_GET['mid'], ':receiver'=>$userid, ':sender'=>$userid))[0];
        //echo '<h1>View Message</h1>';
        //echo htmlspecialchars($message['body']);
        //echo '<hr />';

        if ($message['sender'] == $userid) {
                $id = $message['receiver'];
        } else {
                $id = $message['sender'];
        }
        DB::query('UPDATE messages SET `read`=1 WHERE id=:mid', array (':mid'=>$_GET['mid']));
        ?>
        <form action="send-message.php?receiver=<?php echo $id; ?>" method="post">
                <textarea name="body" rows="8" cols="80"></textarea>
                <input type="submit" name="send" value="Send Message">
        </form>
        <?php
} else {

?>
<h1>My Messages</h1>
<?php
$messages = DB::query('SELECT messages.*, users.username FROM messages, users WHERE receiver=:receiver AND users.id = messages.sender', array(':receiver'=>$userid));
foreach ($messages as $message) {

        if (strlen($message['body']) > 10) {
                $m = substr($message['body'], 0, 10)." ...";
        } else {
                $m = $message['body'];
        }

        if ($message['read'] == 0) {
                echo "<a href='my-messages.php?mid=".$message['id']."'><strong>".$m."</strong></a> sent by ".$message['username'].'<hr />';
        } else {
                echo "<a href='my-messages.php?mid=".$message['id']."'>".$m."</a> sent by ".$message['username'].'<hr />';
        }

}

?>
 <link href="chat/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="chat/script.js"></script>

<div class="msg_box" style="right:290px">
	<div class="msg_head">My Messages
	</div>
	<div class="msg_wrap">
		<div class="msg_body">
			<div class="msg_a"><?php
				$messages = DB::query('SELECT messages.*, users.username FROM messages, users WHERE receiver=:receiver AND users.id = messages.sender', array(':receiver'=>$userid));
				foreach ($messages as $message) {

					if (strlen($message['body']) > 10) {
							$m = substr($message['body'], 0, 10)." ...";
					} else {
							$m = $message['body'];
					}

					if ($message['read'] == 0) {
						echo "<a href='my-messages.php?receiver=".$message['sender']."'><strong>".$m."</strong></a> sent by ".$message['username'].'<hr />';
					} else {
						echo "<a href='my-messages.php?receiver=".$message['sender']."'>".$m."</a> sent by ".$message['username'].'<br />';
					}

				}
}
?>	
			</div>
		</div>
</div>
</div>  
 
 <?php
 if (!isset($_GET['mid'])) { 
 ?>
  <div class="chat_box">
	<div class="chat_head"> <?php echo $username?></div>
	<div class="chat_body"> 
		 <?php 
		$usrs = DB::query('SELECT  users.* FROM users,followers WHERE follower_id=:followerid AND users.id=followers.user_id',array(':followerid'=>$userid));
		foreach ($usrs as $usr) {
                $m = $usr['username'];
				if($m!=$username){
				echo "<div class='user'>";
                echo"<a href='send-message.php?receiver=".$usr['id']."'>".$m."</a>".'<br />';
				echo "</div>";
				}
		}?>	
	</div>
 </div>
  
 <?php
 } ?>
