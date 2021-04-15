<?php
require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $fname =$_REQUEST['fname'];
    $lname =$_REQUEST['lname'];
    $phone =$_REQUEST['phone'];
    $seat =$_REQUEST['seat'];
    $routef =$_REQUEST['routef'];
    $routet =$_REQUEST['routet'];
    $date =$_REQUEST['date'];
    $email =$_REQUEST['email'];
    $submittedby = $_SESSION["username"];
    $ins_query="insert into new_record
    (`trn_date`,`fname`,`lname`,`phone`,`seat`,`routef`,`routet`,`email`,`date`,`submittedby`)values
    ('$trn_date','$fname','$lname','$phone','$seat','$routef','$routet','$email','$date','$submittedby')";
    mysqli_query($con,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SAFIRI ONLINE TICKETING</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">safiri@info.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +254 723456789
        </div>
        <div class="social-links d-none d-md-block">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="first.php">Safiri</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="index.php">Home</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">




        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div>
                <strong><h1>NOTE</h1></strong>
                <ol>
                    <strong><li>MAKE PAYMENTS USING THIS PAYBILL:224###</li></strong>
                    <li>A seat can only be reserved for 24 hours.</li>
                    <li>After reservation hours.The booked seat is re-issued to another person</li>
                    <li>The names and the phone number  that you use to register for a seat  shall also be used to verify your identification</li>
                    <li>Arrive at the pickup-station an hour earlier.</li>
                    <li>Safiri will not facilitate transportation of late passangers</li>

                </ol>

            </div>
            <br><br>

            <div class="row">
                <div class="col-sm">
                    <h2>ENTER YOUR INFORMATION</h2>
                    <form name="form" method="post" action="insert.php">
                        <input type="hidden" name="new" value="1" />
                        <p><input type="text" class="form-control" name="fname" placeholder="Enter first Name" required /></p>
                        <p><input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required /></p>
                        <p><input type="tel" class="form-control" name="phone" placeholder="Enter Number" required /></p>
                        <p><input type="number" class="form-control"  MIN="1" MAX="36" name="seat" placeholder="Enter seat Number" required /></p>
                        <p><input type="text" class="form-control" name="routef" placeholder="Enter your boarding point" required /></p>
                        <p><input type="text" class="form-control" name="routet" placeholder="Enter your destination" required /></p>
                        <p><input type="date" class="form-control" name="date" placeholder="Enter your date of travel" required /></p>
                        <p><input type="email" class="form-control" name="email" placeholder="Enter email" required /></p>
                        <p><input name="submit" class="btn btn-primary" type="submit" value="Submit" /></p>
                    </form>
                    <p style="color:#FF0000;"><?php echo $status; ?></p>
                </div>
                <div class="col-sm">
                  <span><h2>Booked seats</h2></span>
                    <table  border="1" style="border-collapse:collapse;" class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col"><strong>S.No</strong></th>
                            <th scope="col"><strong>Occupied seats</strong></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;
                        $sel_query="Select * from new_record ORDER BY id desc;";
                        $result = mysqli_query($con,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr><td ><?php echo $count; ?></td>
                                <td ><?php echo $row["seat"]; ?></td>
                            </tr>
                            <?php $count++; } ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm">
                    <h2>SEAT ARRANGEMENTS</h2>

                    <img src="assets/img/seats.jpeg" class="img-fluid" alt="" height="3000px" width="170px" ><br><br>
                </div>
            </div>

            </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>Safiri</h3>
                        <p>
                            Globe Roundabout <br>
                            , NAIROBI<br><br>
                            <strong>Phone:</strong> +254 723456789<br>
                            <strong>Email:</strong> safiri@info.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>


                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Enter your email to subscribe to our news letter</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Day</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
            Designed by <a href="">Osugo</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>



</script>
<script>
    function myFunction() {
        alert("Thanks for booking with us!!");
    }
</script>
</body>

</html>