<?php
require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $routef =$_REQUEST['routef'];
    $routet =$_REQUEST['routet'];
    $reg = $_REQUEST['reg'];
    $date = $_REQUEST['date'];
    $ins_query="insert into new_bus
    (`trn_date`,`routef`,`routet`,`reg`,`date`)values
    ('$trn_date','$routef','$routet','$reg','$date')";
    mysqli_query($con,$ins_query)
    or die(mysql_error());
    $status = "New Bus Inserted Successfully.
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

      <h1 class="logo"><a href="first.php">ADMIN CHAMBERS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->



    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Admin</li>
        </ol>

          <h1>Buses Section</h1>
          <div class="form">
              <h2>Add A Bus</h2>
              <div>
                  <form name="form" method="post" action="">
                      <input type="hidden" name="new" value="1" />
                      <p><input type="text" class="form-control" name="routef" placeholder="Enter Boarding point" required /></p>
                      <p><input type="text" class="form-control" name="routet" placeholder="Enter Destination" required /></p>
                      <p><input type="text" class="form-control" name="reg" placeholder="Enter Bus number plate" required /></p>
                      <p><input type="datetime-local" class="form-control" name="date" placeholder="Enter your date of travel" required /></p>
                      <p><input name="submit" type="submit" value="Submit" /></p>
                  </form>
                  <p style="color:#FF0000;"><?php echo $status; ?></p>
              </div>

              <div><br><br>

                  <div class="form">

                      <h2>View Bus Records</h2>
                      <table width="100%" border="1" style="border-collapse:collapse;" class="table table-hover">
                          <thead>
                          <tr>
                              <th scope="col"><strong>S.No</strong></th>
                              <th scope="col"><strong>Boarding point</strong></th>
                              <th scope="col"><strong>Destination</strong></th>
                              <th scope="col"><strong>Vehicle registration</strong></th>
                              <th scope="col"><strong>Travel Date</strong></th>
                              <th scope="col"><strong>Delete</strong></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          $count=1;
                          $sel_query="Select * from new_bus ORDER BY id desc;";
                          $result = mysqli_query($con,$sel_query);
                          while($row = mysqli_fetch_assoc($result)) { ?>
                              <tr><td ><?php echo $count; ?></td>
                                  <td ><?php echo $row["routef"]; ?></td>
                                  <td ><?php echo $row["routet"]; ?></td>
                                  <td ><?php echo $row["reg"]; ?></td>
                                  <td ><?php echo $row["date"]; ?></td>
                                  <td >
                                      <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
                                  </td>
                              </tr>
                              <?php $count++; } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <br><br>


                <h1>Customer Section</h1>
              <h2>View Customer Records</h2>
              <table width="100%" border="1" style="border-collapse:collapse;" class="table table-hover">
                  <thead>
                  <tr>
                      <th scope="col"><strong>S.No</strong></th>
                      <th scope="col"><strong>First name</strong></th>
                      <th scope="col"><strong>Last name</strong></th>
                      <th scope="col"><strong>phone</strong></th>
                      <th scope="col"><strong>seat number</strong></th>
                      <th scope="col"><strong>boarding point</strong></th>
                      <th scope="col"><strong>destination point</strong></th>
                      <th scope="col"><strong>date</strong></th>
                      <th scope="col"><strong>email</strong></th>
                      <th scope="col"><strong>Delete</strong></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $count=1;
                  $sel_query="Select * from new_record ORDER BY id desc;";
                  $result = mysqli_query($con,$sel_query);
                  while($row = mysqli_fetch_assoc($result)) { ?>
                      <tr><td ><?php echo $count; ?></td>
                          <td ><?php echo $row["fname"]; ?></td>
                          <td ><?php echo $row["lname"]; ?></td>
                          <td ><?php echo $row["phone"]; ?></td>
                          <td ><?php echo $row["seat"]; ?></td>
                          <td ><?php echo $row["routef"]; ?></td>
                          <td ><?php echo $row["routet"]; ?></td>
                          <td ><?php echo $row["date"]; ?></td>
                          <td ><?php echo $row["email"]; ?></td>

                          <td >
                              <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
                          </td>
                      </tr>
                      <?php $count++; } ?>
                  </tbody>
              </table>
          </div>



      </div>
    </section><!-- End Breadcrumbs -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Bus Ticket Booking</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Luggage delivery</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Event Bus facilitation</a></li>
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
        &copy; Copyright <strong><span>@Safiri</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">Gregory Mark</a>
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

</body>

</html>