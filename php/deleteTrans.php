<?php

    $con = mysqli_connect("localhost","finances","K1lla56", "transactions");

    if (mysqli_connect_errno()){
      echo 'Could not connect: ' . mysqli_connect_error();
    }

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    

    $query = "UPDATE trans SET isdeleted = 1 WHERE transid = " . $id;
    if (!mysqli_query($con,$query)) {
      die('Error: ' . mysqli_error($con));
    }
    
?>