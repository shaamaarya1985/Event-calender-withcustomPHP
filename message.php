<?php 
setcookie();
include('header.php');
$sql = "SELECT * FROM superadmin ORDER BY username ASC";
$result = mysqli_query($conn,$sql);
?>
<?php echo $error['msg']; ?>
<form action="" method="POST">
    <div class="form-group">
      <label for="inputState">Select User</label>
	   <select id="inputState" class="form-control" name="selected_user">
	  	  <?php 		    
			foreach($result as $val){
			$user_id = $val['id'];
			$username = $val['username'];
	      ?>
        <option value="<?php echo $user_id; ?>"><?php echo $username; ?></option>
			<?php } ?>
	   </select>
    </div>
	<div class="form-group">
      <label for="inputState">Message</label>
     <textarea class="form-control is-invalid" name="user_msg" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php 
	if(isset($_POST['user_msg']))
	{
   /*  $data = save($selected_user,$user_msg,now());
	  if($data == 1)
	  {
		header("location: message.php");
	  }else{
		  $error['msg'] = "Not Inserted";
	  } */	  
	  $selected_user = mysqli_real_escape_string($conn,$_POST['selected_user']);
      $user_msg = mysqli_real_escape_string($conn,$_POST['user_msg']);     
      $sql = "INSERT INTO user_messages (user_id, message, date)VALUES ('$selected_user', '$user_msg', now() )";	
      if (mysqli_query($conn, $sql))  {
         header("location: message.php");
      }else {
         $rerror = "Not Inserted";
      } 
	}
?>


<div class="container">
  <h2>Messages</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$sqlmsg = "SELECT user_messages.*, superadmin.id FROM user_messages INNER JOIN superadmin ON user_messages.user_id=superadmin.id LIMIT 20";
		$results = mysqli_query($conn, $sqlmsg) or die("database error:". mysqli_error($conn));
		while( $rows = mysqli_fetch_assoc($results) ) {	
		$msg_user = "SELECT username from superadmin where id = '".$rows['user_id']."'";
		$res_msg = mysqli_query($conn, $msg_user);
		$fetch_arr = mysqli_fetch_assoc($res_msg);
	?>
      <tr>
        <td><?php echo $fetch_arr['username']; ?></td>
        <td><?php echo $rows['message']; ?></td>
      </tr>
	<?php } ?>  
    </tbody>
  </table>
</div>