<?php 
include "database.php";
 
session_start();
if(!isset($_SESSION["AID"])){
    header('location:alogin.php');
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
        $sql="SELECT * FROM admin where APASS='{$_POST['opass']}' and AID='{$_SESSION["AID"]}' ";
        $res=$db->query($sql);
        if($res->num_rows>0 ){
            $s="update admin set APASS='{$_POST["npass"]}' where AID=".$_SESSION["AID"] ;
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
       <?php include "adiminbar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>