<?php
require '_dbconnect.php';

if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $price=$_POST["price"];


    $file=$_FILES["img"];
    print_r($file);
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileErr=$file['error'];


    if($fileErr==0){
        $destfile='dish_image/'.$filename;
        move_uploaded_file($filepath,$destfile);
        $validation=validate_value($name,$price);
        $name=test_input($name);
        if($validation)
        {
           $sql_insert="INSERT INTO `thali_menu` (`sno`, `name`, `Price`, `image`) VALUES (NULL, '$name', '$price', '$destfile');";
        $result_insert=mysqli_query($conn,$sql_insert);
            if($result_insert){
            echo "<script>The Entry  was created successfully!
            window.location.href='admin.php';
            </script>";
}
else{
        echo "<script>The Entry was not created successfully because of this error --->  window.location.href='admin.php';</script> ";
}
        }
        else{
            echo "<script>error  window.location.href='admin.php'; </script>";
        }

    }
    
    
    
}

function test_input($data) {

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

    }
    function validate_value($name,$price)
        {
            if((empty($name))&&(empty($price)))
            {
                return 0;
            
            }
            else{
                return 1;
            }
        }
    






// Find the number of records returned
?>