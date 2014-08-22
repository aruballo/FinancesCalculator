<?php
    //List year spending per month based on category 
    //submitted through post parameters. If parameter 
    //is "all", list total spending per month, along 
    //with total averages and other stats.

    $con = mysqli_connect("localhost","aruballos","rubanto20", "transactions");

    if (mysqli_connect_errno()){
      echo 'Could not connect: ' . mysqli_connect_error();
    }
    
    echo '{';
    
    $chartYear = $_POST['yearAvg'];
    $chartCat = $_POST['avgCat'];
    
    if($chartCat == 'all'){
        $Jan = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=1";
        $Feb = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=2";
        $Mar = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=3";
        $Apr = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=4";
        $May = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=5";
        $Jun = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=6";
        $Jul = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=7";
        $Aug = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=8";
        $Sep = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=9";
        $Oct = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=10";
        $Nov = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=11";
        $Dec = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=12";
        $Sum = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear;
    }
    else{
        $Jan = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=1 AND transcat='" . $chartCat . "'";
        $Feb = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=2 AND transcat='" . $chartCat . "'";
        $Mar = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=3 AND transcat='" . $chartCat . "'";
        $Apr = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=4 AND transcat='" . $chartCat . "'";
        $May = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=5 AND transcat='" . $chartCat . "'";
        $Jun = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=6 AND transcat='" . $chartCat . "'";
        $Jul = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=7 AND transcat='" . $chartCat . "'";
        $Aug = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=8 AND transcat='" . $chartCat . "'";
        $Sep = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=9 AND transcat='" . $chartCat . "'";
        $Oct = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=10 AND transcat='" . $chartCat . "'";
        $Nov = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=11 AND transcat='" . $chartCat . "'";
        $Dec = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND month(transdate)=12 AND transcat='" . $chartCat . "'";
        $Sum = "SELECT SUM(transamt) FROM trans WHERE year(transdate)=" . $chartYear . " AND transCat='" . $chartCat . "'";
    }
    
    $JanResult = mysqli_query($con, $Jan);
    $FebResult = mysqli_query($con, $Feb);
    $MarResult = mysqli_query($con, $Mar);
    $AprResult = mysqli_query($con, $Apr);
    $MayResult = mysqli_query($con, $May);
    $JunResult = mysqli_query($con, $Jun);
    $JulResult = mysqli_query($con, $Jul);
    $AugResult = mysqli_query($con, $Aug);
    $SepResult = mysqli_query($con, $Sep);
    $OctResult = mysqli_query($con, $Oct);
    $NovResult = mysqli_query($con, $Nov);
    $DecResult = mysqli_query($con, $Dec);
    $SumResult = mysqli_query($con, $Sum);
    
    if($JanResult){
        $row1 = mysqli_fetch_row($JanResult);
        if($row1[0]){
            echo '"January":' . $row1[0] . ',';
        }
        else {
            echo '"January": 0,';
        }
        mysqli_free_result($JanResult);
    }
    if($FebResult){
        $row2 = mysqli_fetch_row($FebResult);
        if($row2[0]){
            echo '"February":' . $row2[0] . ',';
        }
        else {
            echo '"February": 0,';
        }
        mysqli_free_result($FebResult);
    }
    if($MarResult){
        $row3 = mysqli_fetch_row($MarResult);
        if($row3[0]){
            echo '"March":' . $row3[0] . ',';
        }
        else {
            echo '"March": 0,';
        }
        mysqli_free_result($MarResult);
    }
    if($AprResult){
        $row4 = mysqli_fetch_row($AprResult);
        if($row4[0]){
            echo '"April":' . $row4[0] . ',';
        }
        else {
            echo '"April": 0,';
        }
        mysqli_free_result($AprResult);
    }
    if($MayResult){
        $row5 = mysqli_fetch_row($MayResult);
        if($row5[0]){
            echo '"May":' . $row5[0] . ',';
        }
        else {
            echo '"May": 0,';
        }
        mysqli_free_result($MayResult);
    }
    if($JunResult){
        $row6 = mysqli_fetch_row($JunResult);
        if($row6[0]){
            echo '"June":' . $row6[0] . ',';
        }
        else {
            echo '"June": 0,';
        }
        mysqli_free_result($JunResult);
    }
    if($JulResult){
        $row7 = mysqli_fetch_row($JulResult);
        if($row7[0]){
            echo '"July":' . $row7[0] . ',';
        }
        else {
            echo '"July": 0,';
        }
        mysqli_free_result($JulResult);
    }
    if($AugResult){
        $row8 = mysqli_fetch_row($AugResult);
        if($row8[0]){
            echo '"August":' . $row8[0] . ',';
        }
        else {
            echo '"August": 0,';
        }
        mysqli_free_result($AugResult);
    }
    if($SepResult){
        $row9 = mysqli_fetch_row($SepResult);
        if($row9[0]){
            echo '"September":' . $row9[0] . ',';
        }
        else {
            echo '"September": 0,';
        }
        mysqli_free_result($SepResult);
    }
    if($OctResult){
        $row10 = mysqli_fetch_row($OctResult);
        if($row10[0]){
            echo '"Octorber":' . $row10[0] . ',';
        }
        else {
            echo '"October": 0,';
        }
        mysqli_free_result($OctResult);
    }
    if($NovResult){
        $row11 = mysqli_fetch_row($NovResult);
        if($row11[0]){
            echo '"November":' . $row11[0] . ',';
        }
        else {
            echo '"November": 0,';
        }
        mysqli_free_result($NovResult);
    }
    if($DecResult){
        $row12 = mysqli_fetch_row($DecResult);
        if($row12[0]){
            echo '"December":' . $row12[0] . ',';
        }
        else {
            echo '"December": 0,';
        }
        mysqli_free_result($DecResult);
    }
    if($SumResult){
        $row13 = mysqli_fetch_row($SumResult);
        if($row13[0]){
            echo '"Sum":' . $row13[0];
        }
        else {
            echo '"Sum": 0';
        }
        mysqli_free_result($SumResult);
    }
    
    mysqli_close($con);
    echo "}";
?>