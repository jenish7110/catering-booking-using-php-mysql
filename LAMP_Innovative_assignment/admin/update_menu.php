<?php include '_dbconnect.php'; 

if(isset($_POST['sno'])){
  $name       = $_POST['name'];
  $price     = $_POST['price'];
  $sno = $_POST['sno'];
  $query      = mysqli_query($conn, "UPDATE thali_menu SET name = '$name' ,price = '$price'WHERE sno = '$sno'");
  if ($query) {
    echo "<script>alert('Updated sucessfully')
    window.location.href='admin.php'</script>";
  }else{
    echo "<script>alert('Sorry not updated ')
    window.location.href='admin.php'</script>";
  }
}
 ?>