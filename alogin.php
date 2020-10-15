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
            $sql="SELECT * FROM admin WHERE ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}' ";
            $res=$db->query($sql);
            if($res->num_rows>0){
                $row=$res->fetch_assoc();
                $_SESSION["AID"]=$row["AID"];
                $_SESSION["ANAME"]=$row["ANAME"];
                header("location:ahome.php");

            }else{
                echo "invalid ";
            }
        } ?>
        <h3> Adimin Login Here</h3>
        <form action="alogin.php" method="POST">
            <label>Name</label>
                <input type="text" name="aname" required>
            <label>Password</label>
            <input type="password" name="apass" required>
           <button type="submit" name="submit">Login Now</button>
        </form>
    </div>
 
 </div>
    <div class="navi">
       <?php include "bar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>