<?php 
include "database.php";
  
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
    <h1>New Registration</h1>

    <?php
    
    if(isset($_POST['submit'])){
       $sql="INSERT INTO student (NAME,PASS,MAIL,DEP) values ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dev"]}')";
       $db->query($sql);
       echo "Registration Success";
    } 

     
   

    ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST"  >
        <label for="">Name</label>
        <input type="text" name='name' required>
        <label for="">Password</label>
        <input type="password" name='pass' required>
        <label for="">E-main</label>
        <input type="email" name='mail' required>
        <select name="dev" id="">
            <option value="university">university</option>
            <option value="college">College</option>
            <option value="school">School</option>

         </select>
         <button type="submit" name="submit">Register Now</button>
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