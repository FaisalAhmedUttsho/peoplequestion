<?php 
session_start();
include("../functions/functions.php");
if (isset($_SESSION['admin_email'])) {
	header("location:admin_login.php");
}
else{
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
    <link rel="stylesheet" type="text/css" href="style/admin_style.css">
 </head>
 <body>
    <div class="container">
    	<div id="head" align="center">
            <h1>Admin Panel</h1>
    		
    	</div>
    	<div id="sidebar">
    		<ul id="menu">
    			<li><a href="index.php?view_users">View Users</a></li>
    			<li><a href="index.php?view_posts">view posts</a></li>
    			<li><a href="index.php?view_comments">View Comments</a></li>
    			<li><a href="index.php?view_topics">View Topics</a></li>
    			<li><a href="index.php?add_topic">Add New Topic</a></li>
    			<li><a href="admin_logout.php?">Admin Logout</a></li>	
    		</ul>
    		
    	</div>
    	<div id="content">
    		<h2>
                <!--<?php echo $_GET['welcome']; ?> :Manage your content-->
            </h2>
    		<?php 
    		if (isset($_GET['view_users'])) {
    			include("includes/view_users.php");
    		}
    		if (isset($_GET['view_posts'])) {
    			include("includes/view_posts.php");
    				
    		}
    		 ?>	
    	</div>
    	
    </div>
 </body>
 </html>
 <?php } ?>