<!DOCTYPE html>
<html lang="en">
<body>
  
<link rel="stylesheet" href="css/style.css" />

   <div class="header">
  <a class="logo">Welcome</a>
  <div class="header-right">
    <a class="active" href="#home"><?php
     if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require('include/db.php');
     echo $_SESSION['user']['username'];
         
   
   ?> </a>
    <?php
     $query = mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
  
                while($row1 = mysqli_fetch_array($query))
                {
                  $img_path=$row1["profile_image"];
                  if(!empty($img_path)) 
                  {

                      echo  "<img src='images/".$row1["profile_image"]."' width='50' height='50' />";

                  }
                  else
                  {

                  echo  "<img src='images/avatar.jpg' width='50' height='50' />";
                  }
                }
                ?>
  </div>
</div> 
    
   </body>
   <style>
     img{
  padding: 10px;
}
   </style>
</html>
