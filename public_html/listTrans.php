<?php

    //This script creates an html table and outputs all the transactions
    //for the month and year passed.

    echo "<table style='width:300px'>" .
    "<tr>" . 
    "<td>Transaction Amount</td>" .
    "<td>Category</td>".
    "<td>Description</td>".
    "<td>Date Entered</td>".        
    "</tr>";
    
    $con = mysqli_connect("localhost","aruballos","rubanto20", "transactions");

    if (mysqli_connect_errno()){
      echo 'Could not connect: ' . mysqli_connect_error();
    }
    
    $listMonth = $_POST['listMonth'];
    $listYear = $_POST['listYear'];
    
    $query = "SELECT * FROM trans WHERE month(transdate) = " . $listMonth . 
            " AND year(transdate) = " . $listYear;
    $result = mysqli_query($con, $query);
    if($result){
        while($row = mysqli_fetch_row($result)){
           echo "<tr> ";
           echo "<td> " . $row[0] . "</td>";
           echo "<td> " . $row[1] . "</td>";
           echo "<td> " . $row[2] . "</td>"; 
           echo "<td> " . $row[3] . "</td>"; 
           echo "<tr> ";
        }
        mysqli_free_result($result);
    }
    
    mysqli_close($con);
    echo "</table>";
?>