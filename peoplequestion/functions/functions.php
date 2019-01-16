<?php 
$con=mysqli_connect("localhost","root","","peoplequestion") or die("Connetion was not etablished");
function getTopics(){
	global $con;
	$get_topics="select * from topics";
	$run_topics=mysqli_query($con,$get_topics);
	while($row=mysqli_fetch_array($run_topics)){
		$topic_id=$row['topic_id'];
		$topic_name=$row['topic_name'];
		echo "<option value='$topic_id'>$topic_name</option> ";
	}
}
//function for inserting post
function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;
		$title=addslashes($_POST['title']);
		$content=addslashes($_POST['content']);
		$topic=addslashes($_POST['topic']);
		if($content =='' OR $title==''){
			echo "<h2>Please enter title and description</h2>";
			exit();
		}
		else{
			$insert="insert into posts(user_id,topic_id,post_title,post_content,post_date) values('$user_id','$topic','$title','$content',NOW())";
			$run=mysqli_query($con,$insert);
			if($run){
				//echo "<h3>Posted to timeline,Looks great!</h3>";
				$update="update users set posts='yes' where user_id='$user_id' ";
				$run_update=mysqli_query($con,$update);

			}
		}


	}
}
//function for displaying post
function getPosts(){
	global $con;
	$per_page=5;
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	else{
		$page=1;
	}
	$start_from=($page-1) * $per_page;
	$get_posts="select * from posts ORDER by 1 DESC LIMIT $start_from,$per_page";
	$run_posts=mysqli_query($con,$get_posts);
	while($row_posts=mysqli_fetch_array($run_posts)){
		$post_id=$row_posts['post_id'];
		$user_id=$row_posts['user_id'];
		$post_title=$row_posts['post_title'];
		$content=$row_posts['post_content'];
		$post_date=$row_posts['post_date'];
		//getting the user who has posted the thread
		$user="select * from users where user_id='$user_id' AND posts='yes'";
		$run_user=mysqli_query($con,$user);
		$row_user=mysqli_fetch_array($run_user);
		$user_name=$row_user['user_name'];
		$user_image=$row_user['user_image'];
		//now displayng all at once
		echo "<div id='posts'>
		       <p><img src='users/$user_image' width='50' height='50'></P>
		       <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
		       <p>$post_title</p>
		       <p>$post_date</p>
		       <p>$content</p>
		       <a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to This</button> </a>
		     </div><br/>";
    }
    include("pagination.php");
}
function single_post(){
	if(isset($_GET['post_id'])){
		global $con;
		$get_id=$_GET['post_id'];
	    $get_posts="select * from posts where post_id='$get_id'";
	    $run_posts=mysqli_query($con,$get_posts);
	    while($row_posts=mysqli_fetch_array($run_posts)){
		$post_id=$row_posts['post_id'];
		$user_id=$row_posts['user_id'];
		$post_title=$row_posts['post_title'];
		$content=$row_posts['post_content'];
		$post_date=$row_posts['post_date'];
		//getting the user who has posted the thread
		$user="select * from users where user_id='$user_id' AND posts='yes'";
		$run_user=mysqli_query($con,$user);
		$row_user=mysqli_fetch_array($run_user);
		$user_name=$row_user['user_name'];
		$user_image=$row_user['user_image'];
		//getting the user session
		$user_com=$_SESSION['user_email'];
		$get_com="select * from users where user_email='$user_com' ";
		$run_com=mysqli_query($con,$get_com);
		$row=mysqli_fetch_array($run_com);
		$user_com_id=$row['user_id'];
		$user_com_name=$row['user_name'];
		//now displayng all at once
		echo "<div id='posts'>
		       <p><img src='users/$user_image' width='50' height='50'></P>
		       <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
		       <p>$post_title</p>
		       <p>$post_date</p>
		       <p>$content</p></div><br/>";
		include("comments.php");
		       echo "<form action='' method='post' id='reply'>
		       <textarea cols='50' rows='5' name='comment'placeholder='write your reply'></textarea>
		       <br/>
		       <input type='submit' name='reply' value='Reply to this'/>
		       </form>";
	if(isset($_POST['reply'])){
		    $comment=$_POST['comment'];
		    $insert="insert into comments(post_id,user_id,comment,comment_author,date) values('$post_id','$user_id','$comment','$user_com_name',NOW())";
		    $run=mysqli_query($con,$insert);
		    echo "<h2>Your Reply was added!";   

	    }
	}    
	}
}
function members(){
  global $con;
  $user="select * from users";
  $run_user=mysqli_query($con,$user);
  echo "<br/><h2>New members on this site:</h2><hr>";

  while($row_user=mysqli_fetch_array($run_user)){
  	$user_id=$row_user['user_id'];
  	$user_name=$row_user['user_name'];
  	$user_image=$row_user['user_image'];
   echo "<span><a href='user_profile.php?u_id=$user_id'><img src='users/$user_image' width='50' height='50' title='$user_name'  style='float:left;margin:1px;'</a></span>";
  }
  
 }	
 //function for displaying user post
 function user_posts(){
 	global $con;
 	if(isset($_GET['u_id'])){
 		$u_id=$_GET['u_id'];
 	}
 	$get_posts="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
 	$run_posts=mysqli_query($con,$get_posts);
 	while ($row_posts=mysqli_fetch_array($run_posts)) {
 		$post_id=$row_posts['post_id'];
 		$user_id=$row_posts['user_id'];
 		$post_title=$row_posts['post_title'];
 		$content=$row_posts['post_content'];
 		$post_date=$row_posts['post_date'];
 	//getting the user who has posted the thread
 	$user="select * from users where user_id='$user_id' AND posts='yes'";
 	$run_user=mysqli_query($con,$user);
 	$row_user=mysqli_fetch_array($run_user);
 	$user_name=$row_user['user_name'];
    $user_image=$row_user['user_image'];  
    echo "<div id='posts'>
		       <p><img src='users/$user_image' width='50' height='50'></P>
		       <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
		       <p>$post_title</p>
		       <p>$post_date</p>
		       <p>$content</p>
		       <a href='single.php?post_id=$post_id' style='float:right;'><button>View</button> </a>
		       <a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button> </a>
		       <a href='functions/delete_post.php?post_id=$post_id'style='float:right;'><button>Delete</button> </a>
		     </div><br/>";
		     include("delete_post.php");
		 }


 	}
 function user_profile(){
 	global $con;
 	if(isset($_GET['u_id'])){
 		$user_id=$_GET['u_id'];
		$get_user="select * from users where user_id='$user_id' ";
	    $run_user=mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);
        $user_id=$row['user_id'];
	    $user_name=$row['user_name'];
		$user_country=$row['user_country'];
		$user_gender=$row['user_gender'];
		$user_image=$row['user_image'];
		$register_date=$row['user_reg_date'];
		$last_login=$row['user_last_login'];
		if($gender='male'){
			$msg="send him a message";
		}
		else{
			$msg="send her a message";
		}
		echo "<div>
		<img src='users/$user_image' width='200' height='200'/>
		<p><strong>Name:</strong> $user_name</p>
	    <p><strong>Gender:</strong> $user_gender</p>
	    <p><strong>Country:</strong> $user_country</p>
		<p><strong>Last Login:</strong> $last_login</p>
		<p><strong>Member Since:</strong> $register_date</p>
		<a href='messages.php?u_id=$user_id'><button>$msg</button></a><hr>
		</div>";

 	}
 }
 //function for displaying category post
 function show_topics(){
 	global $con;
 	if(isset($_GET['topic'])){
 		$id=$_GET['topic'];
 	}
 	$get_posts="select * from posts  where topic_id='$id' ORDER by 1 DESC ";
 	$run_posts=mysqli_query($con,$get_posts);
 	while ($row_posts=mysqli_fetch_array($run_posts)) {
 		$post_id=$row_posts['post_id'];
 		$user_id=$row_posts['user_id'];
 		$post_title=$row_posts['post_title'];
 		$content=$row_posts['post_content'];
 		$post_date=$row_posts['post_date'];
 	//getting the user who has posted the thread
 	$user="select * from users where user_id='$user_id' AND posts='yes'";
 	$run_user=mysqli_query($con,$user);
 	$row_user=mysqli_fetch_array($run_user);
 	$user_name=$row_user['user_name'];
    $user_image=$row_user['user_image'];  
    echo "<div id='posts'>
		       <p><img src='users/$user_image' width='50' height='50'></P>
		       <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
		       <p>$post_title</p>
		       <p>$post_date</p>
		       <p>$content</p>
		       <a href='single.php?post_id=$post_id' style='float:right;'><button>View</button> </a>
		       <a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button> </a>
		       <a href='functions/delete_post.php?post_id=$post_id'style='float:right;'><button>Delete</button> </a>
		     </div><br/>";
		     include("delete_post.php");
		 }


 	}
 function results(){
 	global $con;
 	if(isset($_GET['search'])){
 		$search_query=$_GET['user_query'];
 	$get_posts="select * from posts where post_title like '%$search_query' OR post_content like '%$search_query%'";
 	$run_posts=mysqli_query($con,$get_posts);
 	while ($row_posts=mysqli_fetch_array($run_posts)) {
 		$post_id=$row_posts['post_id'];
 		$user_id=$row_posts['user_id'];
 		$post_title=$row_posts['post_title'];
 		$content=$row_posts['post_content'];
 		$post_date=$row_posts['post_date'];
 	//getting the user who has posted the thread
 	$user="select * from users where user_id='$user_id' AND posts='yes'";
 	$run_user=mysqli_query($con,$user);
 	$row_user=mysqli_fetch_array($run_user);
 	$user_name=$row_user['user_name'];
    $user_image=$row_user['user_image'];  
    echo "<div id='posts'>
		       <p><img src='users/$user_image' width='50' height='50'></P>
		       <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
		       <p>$post_title</p>
		       <p>$post_date</p>
		       <p>$content</p>
		       <a href='single.php?post_id=$post_id' style='float:right;'><button>View</button> </a>
		       <a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button> </a>
		       <a href='functions/delete_post.php?post_id=$post_id'style='float:right;'><button>Delete</button> </a>
		     </div><br/>";
		     include("delete_post.php");
		 }
		}


 	}
?>