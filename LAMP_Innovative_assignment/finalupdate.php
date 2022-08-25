<?php
    require '_dbconnect.php';
    $sno=$_GET["sno"];
    echo $sno;
    if(isset($_GET["submit"])){
    
    
         $sno=$_GET['sno'];
         $name=$_GET['name'];
         $price=$_GET['price'];
         
         $sql_insert="UPDATE `thali_menu`
         SET `name`= $name,Price` = $price
         WHERE `sno` = $sno;";
         $result_insert=mysqli_query($conn,$sql_insert);
             if($result_insert)
             {
             echo "The Entry  was created successfully!<br>";
    }}
