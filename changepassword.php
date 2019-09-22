<?php

session_start();
require('include/db.php');
require('include/nav_admin.php');


$user=$_SESSION['username'];

if ($user)

{

//user is logged in

    if(isset ($_POST['submit']))
    {
    //check fields
    
    $oldpassword = mysqli_real_escape_string($conn,$_POST['currentPassword']);
   
    $newpassword =  mysqli_real_escape_string($conn,$_POST['newPassword']);
    $repeatnewpassword =  mysqli_real_escape_string($conn,$_POST['confirmPassword']);
    
    //check pass against db
    
    /*mysql_select_db($connect,"test");
    */
    $queryget = mysqli_query($conn,"SELECT password FROM users WHERE username='$user'") /*or die("Query didn't work")*/;
    //echo $queryget;
    $row = mysqli_fetch_array($queryget);
 
    
    $oldpassworddb = $row["password"];
    
      
    
    //check pass
    if ($oldpassword==$oldpassworddb)
    {
    
    
    
    //check twonew pass
    if ($newpassword==$repeatnewpassword)
    {
    //success
    //change pass in db
  
 /*    if (strlen($newpassword)>25||strlen($newpassword)<6)   <---------------Here is the code
    {
     echo "Password must be betwwen 6 & 25";
    }

    else*/
    {
    
        $querychange = mysqli_query($conn,"
        UPDATE users SET password='$newpassword' WHERE username='$user'
        ");
        echo "password changed succesfully";
        
      /*  session_destroy();
        die("Your pass has benn changed.");
       header("location:index");
    */
  
    
    }
    }
    else
        die("New Pass don't match");
        
  
    
    
    
    }
    else
      die("Old Pass doesn't match");
    
    
      
    
    
    
    }
    
    else
    {
     echo("

        <html>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'> 

<head>

<link rel='stylesheet' type='text/css' href='css/style.css' />
</head>
<body>

<div class='container'>
<div class='form'>
<h1>Change password</h1>
<form name='Login' method='post' action='changepassword.php'>


<input type='password' name='currentPassword' placeholder='current Password' required />
<input type='password'name='currentPassword' placeholder='New Password' required />

<input type='password' name='confirmPassword' placeholder='Confirm Password' required />
<br>
<input name='submit' type='submit' value='submit' />

</form>
</div>
</div>
</div>
</body></html>

");

}   

}


    else
       die("You must be logged in to change your password");







?>

 