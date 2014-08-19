<?php

    //This script grabs the sums of each table column based on the month and year provided
    //and outputs it into valid JSON format text
    $con = mysqli_connect("localhost","aruballos","rubanto20", "transactions");

    if (mysqli_connect_errno()){
      echo 'Could not connect: ' . mysqli_connect_error();
    }
    
    echo '{';
    
    $chartMonth = $_POST['chartMonth'];
    $chartYear = $_POST['chartYear'];
    
    $query1 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'groceries' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    $query2 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'food' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    $query3 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'misc' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    $query4 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'bills' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    $query5 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'gas' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    $query6 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'fees' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    $query7 = "SELECT SUM(transamt) FROM trans WHERE transcat= 'frivolous' AND month(transdate) = " . $chartMonth . " AND year(transdate)=" . $chartYear;
    
    $result1 = mysqli_query($con, $query1);
    if($result1){
       $row = mysqli_fetch_row($result1);
       if($row[0]){
        echo '"groceries":' . $row[0] . ',';
       }
       else {
        echo '"groceries": 0,';
       }
       mysqli_free_result($result1);
    }
    $result2 = mysqli_query($con, $query2);
    if($result2){
       $row = mysqli_fetch_row($result2);
       if($row[0]){
        echo '"food":'. $row[0] . ',';
       }
       else{
        echo '"food": 0,';   
       }
       mysqli_free_result($result2);
    }
    $result3 = mysqli_query($con, $query3);
    if($result3){
       $row = mysqli_fetch_row($result3);
       if($row[0]){
        echo '"misc":'. $row[0] . ',';
       }
       else{
        echo '"misc": 0,';   
       }
       mysqli_free_result($result3);
    }
    $result4 = mysqli_query($con, $query4);
    if($result4){
       $row = mysqli_fetch_row($result4);
       if($row[0]){
        echo '"bills":'. $row[0] . ',';
       }
       else{
        echo '"bills": 0,';   
       }
       mysqli_free_result($result4);
    }
    $result5 = mysqli_query($con, $query5);
    if($result5){
       $row = mysqli_fetch_row($result5);
       if($row[0]){
        echo '"gas":'. $row[0] . ',';
       }
       else{
        echo '"gas": 0,';   
       }
       mysqli_free_result($result5);
    }
    $result6 = mysqli_query($con, $query6);
    if($result6){
       $row = mysqli_fetch_row($result6);
       if($row[0]){
        echo '"fees":'. $row[0] . ',';
       }
       else{
        echo '"fees": 0,';   
       }
       mysqli_free_result($result6);
    } 
    $result7 = mysqli_query($con, $query7);
    if($result7){
       $row = mysqli_fetch_row($result7); 
       if($row[0]){
        echo '"frivolous":'. $row[0];
       }
       else{
        echo '"frivolous": 0';   
       }
       mysqli_free_result($result7);
    }     
    
    mysqli_close($con);
    echo "}";
?>