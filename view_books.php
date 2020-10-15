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
    <h1>BOOKS</h1>
    <?php  $sql="SELECT * FROM book";
             $res=$db->query($sql);
             if($res->num_rows>0){
                  echo "<table>
                          <tr>
                          <th>SNO</th>
                          <th>BOOKTITLE</th>
                          <th>KEYWORDS</th>
                          <th>FILE</th>
                          </tr>
                             
                           ";
                           $i=0;
                           while($row=$res->fetch_assoc()){
                              $i++;
                            
                              echo "<tr>";
                              echo  " <td>{$i}</td>";
                              echo   "<td>{$row['BTITLE']}</td>";
                              echo  "<td>{$row['KEYWORDS']}</td>";
                              echo " <td><a href='{$row['FILE']}' target='_blank'>view</a></td>";
                                echo  " </tr>";
                                    
                                      }

                      
                           echo "</table>";
             } else{
                 echo "NO Books found";
             }
     ?>
    
        
    </div>
 
 </div>
    <div class="navi">
       <?php include "adiminbar.php"; ?>
</div>
    <div class="footer">copy &copy; 2020 </div>
    </div>
</body>

</html>