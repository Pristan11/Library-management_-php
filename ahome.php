<?php 
include "database.php";
function countRecord($sql,$db){
    $res=$db->query($sql);
    return $res->num_rows;
}
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
    <h1>welcome Admin</h1>
    <ul>
        <li>Total Students : <?php echo countRecord('SELECT * FROM student',$db); ?></li>
        <li>Total Books : <?php echo countRecord('SELECT * FROM  book',$db); ?></li>
        <li>Total Request : <?php echo countRecord('SELECT * FROM  request',$db); ?></li>
        <li>Total Comment : <?php echo countRecord('SELECT * FROM comment',$db); ?></li>

    </ul>
        
    </div>
 
 </div>
    <div class="navi">
       <?php include "adiminbar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>