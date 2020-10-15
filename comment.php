<?php 
include "database.php";
 
session_start();
if(!isset($_SESSION["ID"])){
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
    <h1>YOur Comment</h1>

    <?php
    
    
        $sql="SELECT * FROM book where BID=".$_GET["id"];
        $res=$db->query($sql);
        if($res->num_rows>0){

             $row=$res->fetch_assoc();

             echo "<table>
                   <tr>
                   <th>Book Name</th>
                   <td>{$row['BTITLE']}</td>
                   </tr>
                   <tr>
                   <th>Key Words</th>
                   <td>{$row['KEYWORDS']}</td>
                   </tr>
                    </table>
             ";
        }
       
   

     
    

    ?>

    <?php  
    
    if(isset($_POST['submit'])){

    $sql= "INSERT INTO comment (BID,SID,COMM,LOGS) values ({$_GET['id']},{$_SESSION['ID']},'{$_POST['comment']}',now())";
   
    $res=$db->query($sql);
    }
    ?>
    
    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST"  >
        <label for="">Write your comment</label>
        <input type="text" name='comment' required>
         
         <button type="submit" name="submit">Post Now</button>
    </form>
    
    <div>
    <?php 
    
     $sql="SELECT student.NAME, comment.COMM, comment.LOGS FROM comment inner join student on comment.SID=student.ID WHERE comment.BID={$_GET['id']}  ORDER BY comment.CID DESC";
         $res=$db->query($sql);
         if($res->num_rows>0){
           while($row=$res->fetch_assoc()){

            echo "<p> {$row['NAME']} :{$row['COMM']} {$row['LOGS']} </p>";

           }


         }
        
    
    ?>
    
    </div>
        
    </div>
 
 </div>
    <div class="navi">
       <?php include "userbar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>