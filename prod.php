  <?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
		header('location:login.php');
    }
  ?>


  <?php
	include('dbcon.php');
	if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];

							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);			
									$location=$_FILES["image"]["name"];
									$tname= $_POST['Name'];
									
									$content= $_POST['Description'];
									

						mysql_query("insert into products (Name,Description,Photo) 
						values('$tname','$content','$location')")or die(mysql_error());
						
											
									
									}
										header('location:index.php?published=post has been published');
									}
							}
?>			
    <h3  align="center" >Add Our Product</h3>
    </div>
    <div >
	
					<form method="post" action="prod.php"  enctype="multipart/form-data">
					<table align="center" border="1" >
						<tr>
							<td><label style="color:yellow; font-size:18px;">Name</label></td>
							
							<td><input type="text" name="Name"   placeholder="FirstName" required /></td>
						</tr>
						
						<tr>
							<td><label style="color:yellow; font-size:18px;">Details</label></td>
							
							<td><TEXTAREA name="Description" cols="100" rows="25" placeholder="Content" required /></TEXTAREA></td>
						</tr>
						
						<tr>
							<td><label style="color:yellow; font-size:18px;">Image</label></td>
						
							<td><input type="file" name="image" required /></td>
						</tr>
						
					</table>
					
	
 
    
<center><button bgcolor="green" type="submit"  name="Submit">Add</button></center>

	</form>
	
