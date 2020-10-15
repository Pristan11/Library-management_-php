<?php
session_start();
include "database.php" ?>

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
        <?php if(isset($_POST['submit'])){
            $sql="INSERT INTO request (ID,MES ) values ('{$_SESSION["ID"]}','{$_POST["request"]}' )";
             $res=$db->query($sql);
             
            if($res){
               echo "<p  >Request Has Sent</p>";

            }else{
                echo "invalid ";
            }
        } ?>
        <h3> Sent Request </h3>
        <form action="request.php" method="POST">
            <label>Write Request</label>
                <input type="text" name="request" required>
             
           <button type="submit" name="submit" class="btn btn-warning px-5 py-1">Sent</button>
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