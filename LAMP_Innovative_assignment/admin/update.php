<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  </head>
  <body>
<form action="update_menu.php"  method='post'>
<div class="form-group">
  <?php

  if(isset($_GET['sno'])){
    $sno=(int)$_GET['sno'];
 $name=$_GET['rt'];
 $price=(int)$_GET['pc'];
  }?>




<label for="sno">sno</label>
 <input type="number" class="form-control"  value="<?php echo  $sno; ?>" name="sno"><br>
</div>
            <div class="form-group">

            <label for="name">Name</label>
             <input type="text" class="form-control"  value="<?php echo  $name; ?>"name="name"><br>
            </div>
            <div class="form-group">
            <label for="price">price:</label>
            <input type="number" class="form-control" value="<?php echo  $price; ?>" name="price"><br>
            </div>
            <br><br>
            <input type="submit" value="update" class="btn btn-primary">
          </form>
    </div>


</body>
        </html>