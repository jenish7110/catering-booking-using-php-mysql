<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<html>
<html lang="en">

<head>
    <style>
        #mycart {
            align-items: left;
        }

        .card-img-top {
            width: 100%;
            height: 12vw;
            object-fit: cover;
        }

        #card {
            width: 250px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            border-radius: 10px;
        }

        header {
            width: 100%;
        }

        .center {
            display: block;
            width: 110%;
        }

        .image-container {
            display: flex;
            justify-content: center;
        }


        .btn1 {
            position: absolute;
            right: 2rem;
            margin-top: 20px;

        }

        .aboutus {
            background-color: #fefae0;
        }

        footer {
            text-align: center;
            padding: 3px;
            width: 100%;
            background-color: #26272b;
            ;
            color: white;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
</head>

<body>
    <?php require '_nav.php' ?>

    <div>
        <a href="mycart.php" id="mycart" type="button" class="btn btn-warning  btn1">My-cart</a> <br><br>
    </div>

    <header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
        <h1 class="text-center fw-bold display-1 mb-5">Mohini <span class="text-danger">catering service</span></h1>
        <img class="center" src="bg.jpg" width="1600" height="500">
    </header>
    <div class="container-fluid my-5">

        <div class="thali">
            <h1>thali</h1>

            <div class="row">
                <div class="col-12 m-auto">
                    <div class="owl-carousel owl-theme">

                        <?php include '_dbconnect.php' ;
                $sql="SELECT * FROM `thali_menu`";
                $query=mysqli_query($conn,$sql);
                $result= mysqli_fetch_array($query);
                while($result= mysqli_fetch_array($query))
                {
                    $destfile='admin/'.$result['image'];
                  ?>
                        <form action="manage_cart.php" method="post">
                            <div class="card" style="width: 25rem;">
                                <img class="card-img-top" src="<?php echo $destfile;?>" alt="Food">
                                <div class="card-body">
                                    
                                        <h5 class="card-title">
                                            <?php echo $result['name']?>
                                        </h5>
                                        <p class="card-text">&#8377
                                            <?php echo $result['Price']?>
                                        </p>
                                        <input class="quantity" name="quantity" type="number" min="100" max="1000"
                                            list="price" />
                                        <datalist id="price">
                                            <option value=100>100</option>
                                            <option value=200>200</option>
                                            <option value=300>300</option>
                                            <option value=400>400</option>
                                        </datalist>

                                        <button type="submit" class="btn btn-info " name="add_to_cart">Add to
                                            cart</button>
                                        <input type="hidden" name="item_name" value="<?php echo $result['name']?>">
                                        <input type="hidden" name="price" value="<?php echo $result['Price']?>">
                                </div>
                            </div>
                        </form>
                        <?php
                }
                ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    <div class="aboutus" id="aboutus">
        
            <h3><u>About us:</u></h3>
        
        <p>
        <h5>Mohini Catering service is well known for its taste and hygienity. The catering service takes large scale
            bookings and orders from clients all over Uttar Pradesh. Mohini Catering Service, since past 35 years has
            been one of the top 5 catering services in UP with a track record of more than 1500 large scale orders.</p>
            <p>We assure you to provide you with the best quality of food you will remember. All our staff and working
                members do their job very carefully and assure you a great service for your respective function.</p>
            <p>Our menu contains various food items such as Pav-bhaji, North-Indian cuisine, Jeera rice-Dal fry, cold
                drinks to accompany with, etc.</h4>
            </p>
    </div>
    <div>
        <footer>
            <p>Contact us: +91 84500 84500</p>
            <p>Instagram: @mohinicaters_</p>
            <p>Facebook: Mohini Catering</p>
            <p>Office Address: FF-12-15, Govardhan Complex, Nr. Ram Nagari, Ayodhya, UP</p>
        </footer>
    </div>
    </h5>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
</body>

</html>