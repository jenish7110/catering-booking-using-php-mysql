<html>
<!--
// Connecting to the Database
// Create a table in the db
/*
$sql = "CREATE TABLE `thali_menu` ( `sno` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(12) NOT NULL , `Price` INT(6) NOT NULL , PRIMARY KEY (`sno`))";
$result = mysqli_query($conn, $sql);

// Check for the table creation success
if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error > ". mysqli_error($conn);
}
?>*/
-->
<body>
  <?php
require '_dbconnect.php' ?>

<form action="fileupload.php" method="post" enctype="multipart/form-data">
<b>Name: <input type="text" name="name"><br>
<b>price: <input type="number" name="price"><br>
  Select image to upload:<br>
  <input type="file" name="img" id="fileToUpload"><br>
  <input type="submit" value="submit" name="submit">
</form>

</body>

</html>

