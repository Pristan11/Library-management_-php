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
    <h1>Upload Books</h1>

    <?php
    
    if(isset($_POST['submit'])){
       $target_dir="uploadbook/";
       $target_file=$target_dir.basename($_FILES["efile"]["name"]);


       /*
          $image=$_FILES["efile"]["tmp_data"];
          $image=file_get_cont
       */
       if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file)){

        $sql="INSERT INTO book (BTITLE,KEYWORDS,FILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
        $db->query($sql);
       echo "<p>Book uploaded</p>";
    }else {
        echo "There is some error";
    }

     
    }

    ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
        <label for="">Book Title</label>
        <input type="text" name='bname' required>
        <label for="">keywords</label>
        <input type="text" name='keys' required>
        <label for="">Upload File</label>
        <input type="file" name='efile' required>
         <button type="submit" name="submit">Upload Book</button>
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