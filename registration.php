<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('include/db.php');
require('include/nav_admin.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($conn,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	$trn_date = date("Y-m-d H:i:s");
    $role = stripslashes($_REQUEST['role']);
    $role = mysqli_real_escape_string($conn,$role);
    
        $query = "INSERT into `users` (username, password, email, trn_date,role)
VALUES ('$username', '$password', '$email', '$trn_date','$role')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="container">
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<select name="role" type="role" placeholder="Select Role" class="role">
 
<option value="" selected="selected" disabled="disabled">Select role</option>
 
<option value="Student">Student</option>
 
<option value="Teacher">Teacher</option>
 
</select>

<input type="submit" name="submit" value="Register" />
</form>
</div>
</div>
<?php } ?>
</body>
</html>
