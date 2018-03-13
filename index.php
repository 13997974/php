<?php
session_start();


if(!isset($_SESSION['user_name'])){
	
	
	header("location:login.php");
   }
  else
  {	   
?>
<html>

<head><title>Admin Panel</title>
   
</head>
<style>.button {
    background-color: #4CAF50; 
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	inline-block:none;
}

.button1 {padding: 10px 24px;}
.button2 {padding: 10px 24px;}
.button3 {padding: 10px 24px;}
.button4 {padding: 10px 24px;}

body {
background-color:#6699FF;
background-repeat: repeat-x;
}</style>
<body>
<header>

<h1 align="center"><a href="index.php" > Welcome To Admin Panel</a></h1>

</header>

<DIV id="topnav" style="float:left;
width: 1250px; height: 40px; wordspacing:
5px; font-size: 90%; paddingleft:
60px; padding-top: 6px; whitespace:
nowrap; text-align:left;
background-color: BLACK;">
<NAV>
<button class="button button1"><a href="logout.php">LogOut</a></button>
<button class="button button1"><a href="index.php?view=view">View Post</a></button>
<button class="button button1"><a href="index.php?insert=insert">Insert Post</a></button>
<button class="button button1"><a href="index.php?contact=contact">Contact</a></button>
</NAV>

</DIV>
<br>
<br>
<br>



<font color="green"><h1 align="center">
 <?php echo @$_GET['deleted']; ?></h1></font>
 
<?php if(isset($_GET['insert'])){
include("prod.php");

}?>

<?php if(isset($_GET['view'])){?>

<table width="1000" align="center" border="3">
<tr>
  <td align="center" colspan="9" bgcolor="orange"><h1>View All Product</h1></td>
  </tr>
  <tr>
  <th>Product no:</th>
  <th>Product Name:</th>
  <th>Product image:</th>
  <th>Product content:</th>
  <th>Edit</th>
  <th>Delete</th>
  </tr>
  <?php
 include('dbcon.php');
$i=1;
if(isset($_GET['view'])){
	$query = "select * from products order by 1 DESC";
	$run = mysql_query($query);
	while($row=mysql_fetch_array($run)){
		$id = $row['id'];
		$title = $row['Name'];
		$image = $row['Photo'];
		$content =substr($row['Description'],0,60);
	
?>
  <tr align="center">
  <td><?php echo $i++;?></td>
  <td><?php echo $title;?></td>
  <td><img src="../images/<?php echo $image;?>"width="50" height="50"></td>
  <td><?php echo $content;?></td>
  <td><a href="edit.php?edit=<?php echo $id; ?>">Edit</a></td>
  <td><a href="delete.php?delete=<?php echo $id; ?>">Delete</a></td>
  </tr>
<?php }} }?>
  </table>
  
  <?php  
	  if(isset($_GET['contact'])){?>
  
<table width="1000" align="center" border="3">
<tr>
  <td align="center" colspan="9" bgcolor="orange"><h1>View All Contact</h1></td>
  </tr>
  <tr>
  <th>Contact no:</th>
  <th>Contact Name:</th>
  <th>Contact email:</th>
  <th>Contact mobile:</th>
  <th>Contact ourplace:</th>
  <th>Contact Comment:</th>
  <th>Delete</th>
  </tr>
  <?php
 include('dbcon.php');
    $i=1;
    if(isset($_GET['contact'])){
	$query = "select * from contact order by 1 DESC";
	$run = mysql_query($query);
	while($row=mysql_fetch_array($run)){
		$id = $row['id'];
		$title = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$our_place= $row['our_place'];
		$content =$row['comment'];
	
?>
  <tr align="center">
  <td><?php echo $i++;?></td>
  <td><?php echo $title;?></td>
  <td><?php echo $email;?></td>
  <td><?php echo $mobile;?></td>
  <td><?php echo $our_place;?></td>
  <td><?php echo $content;?></td>
  
  <td><a href="delete.php?delete=<?php echo $id; ?>">Delete</a></td>
  </tr>
  <?php } }}?>
  </table>
  
</body>
</html>

  <br>
<hr>
<footer align="center" ><p>&copy;2017 All Right Reserved</p>
</footer>

   <?php
  }
  ?>
