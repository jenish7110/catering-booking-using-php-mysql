
<?php require '_dbconnect.php' ?>;
<html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  </head>
  <style>
    img {
  width:300px;
  height:300px;
}
    </style>
  <body>
    
    <div class="container my-6">
      <br>
        <h2>ADMIN</h2>
        <!---
        <form action="fileupload.php" method="post" enctype="multipart/form-data">
            <br>
            <div class="form-group">
            <label for="name">Name</label>
             <input type="text" class="form-control" name="name"><br>
            </div>
            <div class="form-group">
            <label for="price">price:</label>
            <input type="number" class="form-control" name="price"><br>
            </div>
            <div class="form-group">
            <label for="img"> Select image to upload</label>
            <input type="file"  class="form-control"name="img" id="fileToUpload"><br>
            </div>
            <br><br>
            <button type="submit"  value="submit" name="submit" class="btn btn-primary">Add to MENU</button>
          </form>
-->

<form action="fileupload.php" method="post" enctype="multipart/form-data">
  <b>
<div class="form-group">
<b>Name:</b>
<input type="text"  class="form-control"  name="name"><br><br>
<b>price: <input class="form-control" type="number" name="price"><br><br>
  Select image to upload:<br>
  <input type="file"  class="form-control" name="img" id="fileToUpload"><br><br>
  <input type="submit"  class="btn btn-primary" value="submit" name="submit">
</div>
</form>


    </div>
    <div class="container">
        
            <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">DishImage</th>
      <th scope="col">Dish-Name</th>
      <th scope="col">Dish-Price</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      <th>
        <th>

    </tr>
  </thead>
  <tbody>
  <?php
              $sql="SELECT * FROM `thali_menu`";
              $query=mysqli_query($conn,$sql);
              $result= mysqli_fetch_array($query);
              while($result= mysqli_fetch_array($query))
              {
                ?>
                <tr>
                  <td>
                  <?php echo $result['sno']?>

              </td>
                  <td>
                        <img  style="height:auto;
        max-width:100%;
        border:none;
        display:block;" src="<?php echo $result['image']?>" alt="Food">
              </td><td>
                          <h5 class="card-title"><?php echo $result['name']?></h5></td>
                          <td>
                          <p class="card-text"> <?php echo $result['Price']?></p></td>
                          <td>
                            <?php
                            echo"
                            <a  href ='update.php?sno=$result[sno]  &rt=$result[name] &pc=$result[Price]' class='btn btn-warning'>Update";
                            ?>
              </td>
              </form>
              <td>
                <form action="dlt.php" method="post">
            <button name="dlt" value="<?php echo $result['sno'] ?>" type="submit" class="btn btn-danger" data-dismiss="modal">Delete</button>
              </form>
              </td>
          </div>
              </td>
              </tr>
              </div>
             
              <?php } ?>
    
  </tbody>
</table>
    </div>
     <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>  
</body>

</html>