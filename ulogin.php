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
            $sql="SELECT * FROM student WHERE NAME='{$_POST["name"]}' and PASS='{$_POST["pass"]}' ";
            $res=$db->query($sql);
            if($res->num_rows>0){
                $row=$res->fetch_assoc();
                $_SESSION["ID"]=$row["ID"];
                $_SESSION["NAME"]=$row["NAME"];
                header("location:uhome.php");

            }else{
                echo "invalid ";
            }
        } ?>
        <h3> User Login Here</h3>
        <form action="ulogin.php" method="POST">
            <label>Name</label>
                <input type="text" name="name" required>
            <label>Password</label>
            <input type="password" name="pass" required>
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