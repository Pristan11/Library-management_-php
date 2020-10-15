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
            $sql="SELECT * FROM book WHERE BTITLE LIKE '%{$_POST['sbook']}%' or KEYWORDS LIKE '%{$_POST['sbook']}%'";
            $res=$db->query($sql);
            if($res->num_rows>0){
                echo "<table>
                <tr>
                <th>SNO</th>
                <th>BOOKTITLE</th>
                <th>KEYWORDS</th>
                <th>FILE</th>
                <th>COMMENT</th>
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
                    echo  "<td><a href='comment.php?id={$row['BID']}'>Go</a></td>";

                      echo  " </tr>";
                          
                            }

            
                 echo "</table>";
   } else{
       echo "NO Books found";




            }
        
        } ?>
        <h3> Sent Request </h3>
        <form action="search_book.php" method="POST">
         <label for="">Search Book</label>
                <input type="text" name="sbook" required>
             
           <button type="submit" name="submit" class="btn btn-warning px-5 py-1">Seach</button>
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