<html>

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <?php



    $address1 = $address2 = $city = $date_final = $state = $postcode = "";
    $addresserror1 = "";
    $addresserror2 = "";
    $cityerror = $dateErr = $sErr = $postErr = "";
    $ad1ok = $ad2ok = $cityok = $dateok = $postok = $sok = 0;


    function validation($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['address1']))
            $addresserror1 = "Field is empty!!";
        else {
            $address1 = validation($_POST['address1']);
            $ad1ok = 1;
        }
        if (empty($_POST['address2'])) {
            $addresserror2 = "Field is empty!!";
        } else {
            $address2 = validation($_POST['address2']);
            $ad2ok = 1;
        }

        if (empty($_POST['date'])) {
            $dateErr = "Date is required";
        } else {
            $date = $_POST['date'];
            $date_now = date("Y-m-d");
            if ($date < $date_now) {
                $dateErr = '<script>alert("Cannot select Previous date!!")</script>';
                $dateok = 0;
            } else {
                $date_final = validation($_POST['date']);
                $dateok = 1;
                echo "<script>alert('Order Placed !');
                window.location.href='welcome.php';
                 </script>";
            }
        }
        if (empty($_POST['state'])) {
            $sErr = "Field is empty!";
        } else {
            $state = validation($_POST['state']);
            $sok = 1;
        }

        if (empty($_POST['postcode'])) {
            $postErr = "Field is empty!";
        } else {
            $postcode = $_POST['postcode'];
            if (6 != strlen((string)$postcode)) {
                $postErr = '<script>alert("Provide valid pincode!")</script>';
            } else {
                $postcode = validation($_POST['postcode']);
                $postok = 1;
            }
        }
        if ($sok = $ad1ok = $ad2ok = $postok = $dateok = $cityok = 1) {

            include '_dbconnect.php';
            $sql = "INSERT INTO `order_add` (`addno`, `address_1`, `address_2`, `city`, `date`, `pincode`) VALUES (NULL,  '$address1',  '$address2', '$state', '$date_final', '$postcode');
  ";

            $query = mysqli_query($conn, $sql);
        }
    }






    ?>



    <br><br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form class="form-horizontal" role="form" method="post" action="">
                <fieldset>


                    <legend>Address Details</legend>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="address">Line 1</label><span class="form-text text-danger">*
                            <?php echo $addresserror1 ?>
                        </span>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" placeholder="Address Line 1" name="address1" value="<?php echo $address1 ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="address">Line 2</label><span class="form-text text-danger">*
                            <?php echo $addresserror2 ?>
                        </span>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" placeholder="Address Line 2" name="address2" value="<?php echo $address2 ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="city">City</label><span class="form-text text-danger">*
                            <?php echo $cityerror ?>
                        </span>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="city" placeholder="City" name="city" value="<?php echo $city ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="form-text text-danger">*
                            <?php echo $dateErr ?>
                        </span>
                        <label class="col-sm-2 control-label" for="textinput">Event-date</label>
                        <div class="col-sm-10">
                            <input type="date" placeholder="Date" name="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="form-text text-danger">*
                            <?php echo $sErr ?>
                        </span>
                        <label class="col-sm-2 control-label" for="textinput">State</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="State" name="state" class="form-control">
                        </div>
                        <br><br>
                        <span class="form-text text-danger">*
                            <?php echo $postErr ?>
                        </span>
                        <label class="col-sm-2 control-label" for="number">Postcode</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Post Code" name="postcode" class="form-control">
                        </div>
                    </div>





                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="pull-right">
                                <button type="submit" value="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>



</body>

</html>