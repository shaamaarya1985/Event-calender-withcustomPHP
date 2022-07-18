<?php include("db_connect.php"); 

function save($id,$field,$date)
{
	if(isset($_POST['user_msg']) {
	{
      $selected_user = mysqli_real_escape_string($conn,$_POST['selected_user']);
      $user_msg = mysqli_real_escape_string($conn,$_POST['user_msg']);   
      $sql = "INSERT INTO user_messages (user_id, message, date)VALUES ('$selected_user', '$user_msg', now() )";	
      if (mysqli_query($conn, $sql))  {
         return 1;		 
      }else {
         return 0;
      }
	}
}
}