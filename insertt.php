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
<html>
<head>
    <meta charset="utf-8">
    <title>Insert New Record</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
</head>
<body>
<div class="form">
    <p><a href="dashboard.php">Dashboard</a>
        | <a href="view.php">View Records</a>
        | <a href="logout.php">Logout</a></p>
    <div>
        <h1>Insert New Record</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <p><input type="text" name="routef" placeholder="Enter Boarding point" required /></p>
            <p><input type="text" name="routet" placeholder="Enter Destination" required /></p>
            <p><input type="text" name="reg" placeholder="Enter Bus number plate" required /></p>
            <p><input type="date" name="date" placeholder="Enter your date of travel" required /></p>
            <p><input name="submit" type="submit" value="Submit" /></p>
        </form>
        <p style="color:#FF0000;"><?php echo $status; ?></p>
    </div>
</div>
</body>
</html>