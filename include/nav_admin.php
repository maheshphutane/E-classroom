
<!DOCTYPE html>
<html>
<head>
  <title>nav</title>


  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" href="css/leftsidemenu.css">
<script>
  function openSlideMenu(){
    document.getElementById('menu').style.width = '250px';
  
    document.getElementById('content').style.marginLeft = '250px';
  }
  function closeSlideMenu(){
    document.getElementById('menu').style.width = '0';
    document.getElementById('content').style.marginLeft = '0';
  }
  


</script>
</head>
<body>
    
  <div  id="content">
    
    <span class="slide" >
     
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars"></i>
      </a>

    </span>

    <div id="menu" class="nav">

      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>

      <img src="images/logo.png" width="100" height="100" class="img2">
      <hr>
      <?php 
       require('include/db.php');
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
/*
              require'include/db.php';
              $query = mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
  
                while($row1 = mysqli_fetch_array($query))
                {
                  $img_path=$row1["profile_image"];
                  if(!empty($img_path)) 
                  {

                      echo  "<img src='images/".$row1["profile_image"]."' width='70' height='70' />".$_SESSION['user']['username'];
                  }    
                  else
                  {
                    echo  "<img src='images/avatar.jpg' width='70' height='70' />".$_SESSION['user']['username'];
               
                /*  echo  "<img src='images/avatar.jpg' width='70' height='70' />"."<div style='Color:blue' align :centre>".$_SESSION['user']['username'].'</div>';
                  
                  }
                }  */   
   
     if($_SESSION['user']['role']=='Teacher')
      {
     echo '
      <a href="teacher.php"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a>
      <a href="form.php"><i class="fa fa-user fa-fw"></i>Profile</a>
      <a href="index1.php"><i class="fas fa-plus-circle"></i>&nbsp;assign Task</a>
      <a href="changepassword.php"><i class="fa fa-key fa-fw"></i>&nbsp;Change Password</a>
       <a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>';
    }

 
      if($_SESSION['user']['role']=='Admin')
      {
      echo '
      
      <a href="admin.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>
      <a href="form.php"> <i class="fa fa-user fa-fw"></i> Profile
     
      </a>
 
      <a href="registration.php"><i class="fas fa-user-plus" aria-hidden="true"></i>&nbsp;add user</a>
      
      <a href="changepassword.php"><i class="fa fa-key fa-fw"></i>&nbsp;Change Password</a>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;
Logout</a>';
    }
    
      if($_SESSION['user']['role']=='Student')
      {
     echo '
      <a href="student.php"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a>
      <a href="form.php"><i class="fa fa-user fa-fw"></i>Profile</a>
      <a href="view.php"><i class="far fa-sticky-note"></i>&nbsp;Notes</a>
      
     
      <a href="changepassword.php"><i class="fa fa-key fa-fw"></i>&nbsp;Change Password</a>
       <a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>';
    }
   ?>
    </div>

    


  </div>




</body>
</html>

<style>
  img {
    padding-left: 10px;
  border-radius: 50%;
}
</style>




