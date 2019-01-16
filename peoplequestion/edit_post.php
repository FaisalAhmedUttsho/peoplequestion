<?php 
session_start();
include("includes/connection.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
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
					  echo "
					  <center>
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
					  </div>
					  "
					?>
				</div>
		    </div>   
		    <div id="content_timeline">
		    	<?php
		    	if(isset($_GET['post_id'])){
 		         $get_id=$_GET['post_id'];
 	             $get_post="select * from posts where post_id='$get_id'";
 	             $run_post=mysqli_query($con,$get_post);
 	             $row_post=mysqli_fetch_array($run_post);
 		         $post_title=$row_post['post_title'];
 		         $post_con=$row_post['post_content'];
                }
		    	?>
            <form  method="post" id="f">
		    		<h2>Edit Your Post</h2>
		    		<input type="text" name="title" value="<?php echo $post_title?>" size="82" required="required"><br/>
		    		<textarea cols="83" rows="4" name="content"><?php echo $post_con?></textarea><br/>
		    		<select name="topic">
		    			<option>Select Topic
		    			</option>
		    			<?php
		    			getTopics();
		    			?>
		    		</select>
		    		<input type="submit" name="update" value="Update Post">
		    		
		    </form>
		          <?php
			        if(isset($_POST['update'])){

			         $title=$_POST['title'];
			         $content=$_POST['content'];
			         $topic=$_POST['topic'];
			         $update="update posts set post_title='$title',post_content='$content',topic_id='$topic' where post_id='$get_id'";
			          $run=mysqli_query($con,$update);
			          if($run){
			          echo "<script>alert('Your Post Has Been Updated')</script>";
			          //echo "<script>window.open('home.php','_self')</script>";
			          header("location:home.php");
		              }
		              }
                    ?>

		    </div>
        </div>
	</div>

</body>
</html>