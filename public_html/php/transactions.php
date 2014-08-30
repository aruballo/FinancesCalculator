<?php
  $con = mysqli_connect("localhost","aruballos","rubanto20", "transactions");

  if (mysqli_connect_errno())
  {
    echo 'Could not connect: ' . mysqli_connect_error();
  }

  date_default_timezone_set('America/Los_Angeles');
  
  $transAmt = $_POST['transAmt'];
  $transCat = $_POST['transCat'];
  $transDesc = $_POST['transDesc'];
  $transDate = $_POST['transDate'];

  $transAmt = mysqli_real_escape_string($con, $transAmt);
  $transCat = mysqli_real_escape_string($con, $transCat);
  $transDesc = mysqli_real_escape_string($con, $transDesc);
  $transDate = mysqli_real_escape_string($con, $transDate);

  $query = "
  INSERT INTO trans (`transamt`, `transcat`, `transdesc`, `transdate`)
        VALUES ('$transAmt',
        '$transCat', '$transDesc', '$transDate'
        );";

  
    if (!mysqli_query($con,$query)) {
      die('Error: ' . mysqli_error($con));
    }
  header("Location: ../index.html");   
  echo "Recorded Transaction";

  mysqli_close($con);
  
?>


