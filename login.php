<?php
session_start();
include'include/db.php';
//Getting Input value
if(isset($_POST['submit'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  $_SESSION['username']=mysqli_real_escape_string($conn,$_POST['username']);
  if(empty($username)&&empty($password)){
  $error= 'Fileds are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT*FROM users WHERE username='$username' AND password='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['user']=array(
   'username'=>$row['username'],
   'password'=>$row['password'],
   'role'=>$row['role'],
   'id'=>$row['id']
   );
echo "<img src='images/avatar.jpg' width='50' height='50'  />";

   $role=$_SESSION['user']['role'];
  
   //Redirecting User Based on Role
    switch($role){
     case 'Admin':
  header('location:admin.php');
  break;
  case 'Student':
  header('location:student.php');
  break;
  case 'Teacher':
  header('location:teacher.php');
  break;
  
 }
 }else{
  $_SESSION['error'] ='Your PassWord or UserName is not Found';
 }
}
}
?>


<html>
<meta charset="utf-8">
   <meta name='viewport' content='width=device-width, initial-scale=1.0'> 

<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
<div class="form">
  <h1>Log In</h1>

<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
 </form>
  <?php if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
           }

          ?>
</div>
</div>
</body>
</html>
