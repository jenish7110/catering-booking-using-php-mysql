<html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php session_start();
  ?>
  <section class="h-100 gradient-custom">
    <div class="container py-5">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0 text center ">MY CART</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <table class="table">
                  <thead class="text-center">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Item name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Total</th>
                      <th scope="col">Action</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php
                    $total = 0;
                    $gt = 0;
                    if (isset($_SESSION['cart'])) {
                      $sno = 0;
                      foreach ($_SESSION['cart'] as $key => $value) {
                        if (isset($value)) {
                          $sno = $sno + 1;
                          $total = $total + ((int)$value['price'] * (int)$value['quantity']);
                          $gt = $gt + $total;
                          echo " 
                <tr>
                <td>$sno</td>
                <td>$value[item_name]</td>
                <td>&#8377; $value[price]<input type='hidden' id='iprice' class='iprice' value='$value[price]'></td>
                <td>$value[quantity]</td>
                <td>&#8377; $total</td>
                <form action='manage_cart.php' method='post'>
                <td>
                <button  name='remove_item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                </td>
               <input type='hidden' name ='item_name' value='$value[item_name]'>
               </form>
               </td>
               ";
                        }
                      }
                    }
                    ?>

                  </tbody>

                </table>


              </div>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Summary</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Total
                  <span>
                    <h5>&#8377; <?php echo $gt; ?></h5>
                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  GST
                  <span>
                    <h5>&#8377; <?php echo $gt * 0.05; ?></h5>
                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">


                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>Total amount</strong>
                    <strong>
                      <p class="mb-0">(including GST)</p>
                    </strong>
                  </div>
                  <span><strong>
                      <span>&#8377
                        <?php echo (float)$gt + (float)$gt * 0.05; ?>
                    </strong></span>
                </li>
              </ul>
              <?php $ggt = (float)$gt + (float)$gt * 0.05; ?>
              <from action="details.php" method='post'>
                <input type="hidden" name=' gt' value="<?php echo $ggt ?>">
                <?php echo "
                  <a href ='details.php?gt=$gt   type='button' class='btn btn-primary btn-lg btn-block'>My-cart</a>"; ?>


                </form>



            </div>
          </div>
        </div>
      </div>




</body>


</html>