<?php
session_start();
require('include/db.php');
require('include/header.php');
require('include/nav_admin.php');

//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:index.php');
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='Student'){
 header('location:student.php');
}
if($_SESSION['user']['role']=='Teacher'){
 header('location:teacher.php');
}
?>
<h1>Wellcome to <?php echo $_SESSION['user']['role'];?> Page</h1>

<div class="box-content" align="center">
	<h2>Registered users</h2>
						<table class="table" align="center">
						  <thead>
							  <tr>
							  	  <th>Profile</th>
								 <!--  <th>ID</th> -->
								  <th>Username</th>
								  <th>Email Address</th>
								  <th>Role</th>
								  <th>Password</th>
								  <th colspan="2">Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("include/db.php");

								$sql = "SELECT * FROM users ORDER BY ID";
								$result=mysqli_query($conn,$sql); 
								/*if($row = mysqli_fetch_array($query)) {
									# code...
									if(file_exists('images/".$row['profile_image']."'))
   										echo  "<img src='images/".$row['profile_image']."' width='170' height='100'/>";
								
									else
   										echo "<img src='images/avatar.jpg' width='170' height='100'/>";
								
								}
*/
								

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr class="tr">
								<td><?php
								 
                 $img_path=$row["profile_image"];
             
                  if(!empty($img_path)) 
                  {

                      echo  "<img src='images/".$row["profile_image"]."' width='50' height='50' class='img1' />";

                  }
                  else
                  {

                  echo  "<img src='images/avatar.jpg' width='50' height='50' class='img1' />";
                  }
   					?>
								
								</td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td><?php echo $row['password']; ?></td>
								<td><a href="edit.php?id=<?php echo  $row['id']; ?>">Edit</a></td>
																								
								<td><a href="delete_user.php?id=<?php echo $row['id'];?>">Delete</a></td>
				
								
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
			<style>
table {
  border-collapse: collapse;
  width: 90%;
  align :center;
}

th, td {
  padding: 2px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
h2{
	color: dodgerblue;

}
tr.tr:hover {background-color:#f5f5f5;}

</style>


 
 


  