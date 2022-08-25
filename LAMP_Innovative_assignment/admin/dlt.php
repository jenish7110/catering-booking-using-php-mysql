<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $num=$_POST['dlt'];
    include '_dbconnect.php';
    $sql_dlt="DELETE FROM `thali_menu` WHERE `thali_menu`.`sno` = $num";
    $result_dlt=mysqli_query($conn,$sql_dlt);
    if($result_dlt){
        ?>
        <div class="alert alert-danger" role="alert">
  A simple danger alert—check it out!
</div>
<?php 
        echo "<script> 
            alert ('Item  Deleted');
            window.location.href='admin.php';
            </script>";
    }
    else{
        echo "<alert>The Entry was not created successfully because of this error ---> ". mysqli_error($conn)."</alert>";
    }
}


?>