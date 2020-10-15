<?php 
include "database.php";
 
session_start();
if(!isset($_SESSION["ID"])){
    header('location:ulogin.php');
}
?>
 

<html>
<head>
<title>Project</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    <div class="container">
    <div class="header"><h1>E-Library-Management</h1></div>
    <div class="wrapper">
        
    <div class="center">
    <h1>Change Password </h1>

    <?php
    
    if(isset($_POST['submit'])){
        $opass=$_POST['opass'];
        $npass=$_POST['npass'];
        $sql="SELECT * FROM student where PASS='{$_POST['opass']}' and ID='{$_SESSION["ID"]}' ";
        $res=$db->query($sql);
        if($res->num_rows>0 ){
            $s="update user set PASS='{$_POST["npass"]}' where ID=".$_SESSION["ID"] ;
            $db->query($s);
            echo "Password Changed";
        }
        else{
            echo "Invalid Password";
        }
    }

    ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <label for="">old Password</label>
        <input type="password" name='opass'>
        <label for="">New Password</label>
        <input type="password" name='npass'>
        <button type="submit" name="submit">Update Password</button>
    </form>
    
        
    </div>
 
 </div>
    <div class="navi">
       <?php include "userbar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>