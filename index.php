<?php include('savefile.php');


if (isset($_GET['edit']))
{
$id = $_GET['edit'];
$edit_state = true;
$rec = mysqli_query($db, "SELECT * FROM notice WHERE id=$id")
$record = mysqli_fetch_array($rec);
$id = $record['id'];
$topic = $record['topic'];
}

?>
    <head>
        <meta charset="UTF-8">
        <title>Notice Management System</title>
        <link rel="stylesheet" type="text/css" href="form.css">
    </head>
                
        <table>
            <thead>
                <tr>
                    <th>Notice ID</th>
                    <th>Notice Topic</th>
                    <th colspan="2">Action</th>
                </tr>    
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($results)){ ?>
                {       
                   <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>                        
                    </td>
                    <td>
                        <a href="savefile.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>                           
                 <?php } ?>       
            </tbody>
        </table>
             
                <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
        <?php endif ?>
          
        <form method="post" action="">
            <div class="input-group">
                <lable>Notice ID</lable>
                <input type="text" name="id" value="<?php echo $id; ?>">
            </div>
             <div class="input-group">
                <lable>Notice Topic</lable>
                <input type="text" name="topic" value="<?php echo $topic; ?>">
            </div>
             <div class="input-group">
                 <?php if ($edit_state == false): ?>
                 <button type="submit" name="save" class="btn">Save</button>
                 <?php else: ?>
                 <button type="submit" name="Update" class="btn">Update</button>
                 <?php endif ?>
                 
            </div>
            
            
        </form>          
                
           </body>
           
      </html>
        
    

