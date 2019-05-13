<?php
   session_start();
	$db = mysqli_connect('localhost', 'root', '' ,'notice management');

	$id = 0;
	$topic = "";
	$edit_state = false;

	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$topic = $_POST['topic'];

		$query = "INSERT INTO notice(id, topic) VALUES ('$id', '$topic')"; 
                mysqli_query($db, $query);
                $_SESSION['msg'] = "Saved Successfully!"; 
		header('location:index.php');
        }
        
        if (isset($_POST['update'])) 
        {
           $id = mysqli_real_escape_string($_POST['id']);
           $topic = mysqli_real_escape_string($_POST['topic']);
                     
           mysqli_query($db, "UPDATE notice SET id ='$id',topic ='$topic' WHERE id=$id");
           $_SESSION['msg'] = "Updated Successfully!";
           header('location:index.php');
           
        }
      
        if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM notice WHERE id=$id");
	$_SESSION['msg'] = "Deleted Successfully!"; 
	header('location: index.php');
}
        
        
        $results = mysqli_query($db, "SELECT * FROM notice");
        
?> 