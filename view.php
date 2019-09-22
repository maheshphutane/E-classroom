
<?php
include_once 'include/db.php';
include_once'include/header.php';
include_once'include/nav_admin.php';

/*include_once'include/nav_student.php';*/

   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
      

    


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading </title>
<link rel="stylesheet" href="css/style1.css" type="text/css" />
</head>
<body>

<div id="body">
 <table width="80%" border="0.5">
   
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM tbl_uploads";
 $result_set=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    
</div>
</body>
</html>

