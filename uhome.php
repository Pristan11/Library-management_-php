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
    <h1>welcome <?php echo "{$_SESSION["NAME"]}"; ?> </h1>
    
        
    </div>
 
 </div>
    <div class="navi">
       <?php include "userbar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>