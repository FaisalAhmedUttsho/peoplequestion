<!DOCTYPE html>
<?php 
session_start();
include("includes/connection.php");
include("functions/functions.php");
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/home_style.css" media="all">
</head>
<body>
	<div class="container">
		<div id="head_warp">
			<div id="header">
				<ul id="menu">
					<li><a href="home.php"> Home</a></li>
					<li><a href="members.php"> Members</a></li>
					<strong>Topics:</strong>
					<?php
					  $get_topics="select * from topics";
					  $run_topics=mysqli_query($con,$get_topics);

					  while($row= mysqli_fetch_array($run_topics)){
						$topic_id=$row['topic_id'];
						$topic_name=$row['topic_name'];

					  echo "<li><a href='topic.php?topic=$topic_id'>$topic_name</a></li>";
					  }
					?>
				</ul>
				<form method="get" action="results.php" id="form1">
					<input type="text" name="user_query" placeholder="Search a topic">
					<input type="submit" name="search" value="Search">
				</form>	
				
			</div>
		</div>
		<div class="content">
		    <div id="user_timeline">
				<div id="user_details">
					<?php
					  $user=$_SESSION['user_email'];
					  $get_user="select * from users where user_email='$user' ";
					  $run_user=mysqli_query($con,$get_user);
					  $row=mysqli_fetch_array($run_user);
					  $user_id=$row['user_id'];
					  $user_name=$row['user_name'];
					  $user_country=$row['user_country'];
					  $user_image=$row['user_image'];
					  $register_date=$row['user_reg_date'];
					  $last_login=$row['user_last_login'];
					  $user_posts="select * from users where user_id='$user_id'";
					  $run_posts=mysqli_query($con,$user_posts);
					  $posts=mysqli_num_rows($run_posts);
					  //getting the number of unread message
					  $sel_msg="select * from messages where receiver='$user_id' AND status='unread' ORDER BY 1 DESC";
					  $run_msg=mysqli_query($con,$sel_msg);
					  $count_msg=mysqli_num_rows($run_msg);
					  echo "<center>
					  <img src='users/$user_image' width='200' height='200'/>
					  </center>
					  <div id='user_mention'>
					  <p><strong>Name:</strong> $user_name</p>
					  <p><strong>Country:</strong> $user_country</p>
					  <p><strong>Last Login:</strong> $last_login</p>
					  <p><strong>Member Since:</strong> $register_date</p>
					  <p><a href='my_messages.php?inbox&u_id=$user_id'>Messages($count_msg)</a></p>
					  <p><a href='my_posts.php?u_id=$user_id'>My Posts</a></p>
					  <p><a href='edit_profile.php?u_id=$user_id'>Edit my account</a></p>
					  <p><a href='logout.php'>Logout</a></p>
					  </div>"
					?>
				</div>
		    </div>   
		    <div id="message">
		    	<?php
		    	if(isset($_GET['u_id'])){
 		        $u_id=$_GET['u_id'];
		        $get_user="select * from users where user_id='$u_id' ";
	            $run_user=mysqli_query($con,$get_user);
		        $row=mysqli_fetch_array($run_user);
                $u_id=$row['user_id'];
	            $user_name=$row['user_name'];
		        $user_image=$row['user_image'];
		        $reg_date=$row['user_reg_date'];
		          } 
		    	?>
		    	<div id="content_timeline">
		    	<h2>Send message to <span style="
		    	color: red"><?php echo $user_name;?></span></h2>
		    	 <form action="messages.php?u_id=
		    	 <?php echo $u_id?>" method="post" id="f">
		    		
		    		<input type="text" name="msg_title" size="49" required="required" placeholder="Message Subject.."><br/>
		    		<textarea cols="50" rows="5" name="msg" placeholder="Message Topic.."></textarea><br/>
		    		<input type="submit" name="message" value="Send Message">
		    	 </form><br/>	
		    	<img src="users/<?php echo $user_image; ?>" style="border:2px solid blue; border-radius: 5px;" width="100" height="100"><br/><br/>
		    		<P><strong><?php echo $user_name; ?></strong>is a member of this site since:<?php echo $reg_date;?></P>
		    	</div 
		    		<?php
		    		     if(isset($_POST['message'])){
		                 $msg_title=($_POST['msg_title']);
		                 $msg=($_POST['msg']);
			             $insert="insert into messages(sender,receiver,msg_sub,msg_topic,reply,status,msg_date) values('$user_id','$u_id','$msg_title','$msg','no_reply','unread',NOW() )";
			              $run=mysqli_query($con,$insert);
			               if($run){
				          echo "<center><h2 id='content_timeline'>Message was successfully send to ". $user_name ." </h2></center>";
				           }
				         else{
				        echo "<center><h2>Message was not sent....!</h2></center>";

			            }

			          }
		    		?>
		    </div>
        </div>
	</div>

</body>
</html>