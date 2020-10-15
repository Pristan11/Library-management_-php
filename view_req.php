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
    <h1>View Students Request</h1>
    <?php  $sql="SELECT  student.NAME , request.MES, request.LOGS from student INNER JOIN request on student.id=request.id";
             $res=$db->query($sql);
             if($res->num_rows>0){
                  echo "<table>
                          <tr>
                          <th>SNO</th>
                          <th>NAME</th>
                          <th>REQUEST</th>
                          <th>DATE</th>
                          </tr>
                             
                           ";
                           $i=0;
                           while($row=$res->fetch_assoc()){
                              $i++;
                            
                              echo "<tr>";
                              echo  " <td>{$i}</td>";
                              echo   "<td>{$row['NAME']}</td>";
                              echo  "<td>{$row['MES']}</td>";
                              echo " <td> {$row['LOGS']}</td>";
                                echo  " </tr>";
                                    
                                      }

                      
                           echo "</table>";
             } else{
                 echo "NO REQUEST found";
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