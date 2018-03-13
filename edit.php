
 
 <html>
 <body>
<?php

include("index.php");
 include("dbcon.php");

     $edit_id = @$_GET['edit'];

$query = "select * from products where id='$edit_id'";

 $run = mysql_query($query);
 
    while($row=mysql_fetch_array($run)){
	
		$edit_id1 = $row['id'];
		$title = $row['Name'];
		$content =$row['Description'];
		$image =$row['Photo'];
 

 ?>

<form method="post" action="edit.php?edit_form=<?php echo $edit_id1; ?>" enctype="multipart/form-data">
<table align="center" border="1" width="100">

<tr>
<td align="center" colspan="7" bgcolor="#6699ff"><h1>Editing Product<h1></td>
</tr>
<tr>
    <td align="right"> Title:</td>
    <td><input type="text" name="Name" size="60" value="<?php echo $title;?>"></td>
</tr>

<tr>
    <td align="right">Image :</td>
    <td><input type="file" name="image">
	<img src="../images/<?php echo $image;?>" width="60" height="60">
	</td>
</tr>
<tr>
    <td align="right">Post Content:</td>
    <td><textarea name="Description" cols="100" rows="25"><?php echo $content;?></textarea></td>
</tr>
<tr>
    
    <td align="center"colspan="7"><input type="submit" name="update"value="Update Now"></td>
</tr>

 <?php } ?>
</table>
</form>
</body>
</html>
<?php
if (isset($_POST['update'])){
	
	$update_id = $_GET['edit_form'];
	
	$post_title  = $_POST['Name'];
	
	$content  = $_POST['Description'];
	     
	$post_image = $_FILES['image']['name'];
	$post_image_type = $_FILES['image']['type'];
	$image_tmp = $_FILES['image']['tmp_name'];
	
	
	move_uploaded_file($image_tmp,"../images/$post_image");
	
	 $update_query = "update products set Name='$post_title'
	,Description='$content',Photo='$post_image'
	where id='$update_id'";
	
	if(mysql_query($update_query))
	{
		echo"<script>window.open('index.php?view=view?update=post has been update','_self')</script>";
	}
}

?>
 