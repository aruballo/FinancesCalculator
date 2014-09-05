<?php

    //This script creates an html table and outputs all the transactions
    //for the month and year passed.
    echo "<table id='transTable' style='width:700px' class='tablesorter'>" .
    "<thead>" .        
    "<tr>" . 
    "<th>ID</th>".        
    "<th>Transaction Amount</th>" .
    "<th>Category</th>".
    "<th>Description</th>".
    "<th>Date Entered</th>".
    "<th>Options</th>".
    "</tr>".
    "</thead>".
    "<tfoot>" .        
    "<tr>" .
    "<th>ID</th>".        
    "<th>Transaction Amount</th>" .
    "<th>Category</th>".
    "<th>Description</th>".
    "<th>Date Entered</th>". 
    "<th>Options</th>".
    "</tr>".
    "</tfoot>".            
    "<tbody>";        
            
    
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
           if($row[5] == 0){ 
              echo "<tr> ";
              echo "<td> " . $row[4] . "</td>";
              echo "<td> " . $row[0] . "</td>";
              echo "<td> " . $row[1] . "</td>";
              echo "<td> " . $row[2] . "</td>"; 
              echo "<td> " . $row[3] . "</td>";
              echo "<td> "
                  . "<button type='button' name='deleteTrans' id='deleteTrans' onclick='deleteTransaction(". $row[4] .");'>Delete</button>"
                  . "</td>"; 
              echo "<tr> ";
            }  
        }
        mysqli_free_result($result);
    }
    
    mysqli_close($con);
    echo "</tbody>";
    echo "</table>";
    echo '<div id="pager" class="pager" style="position: static;">' .
	 '<form>'.
            '<img src="addons/pager/icons/first.png" class="first"/>'.
	    '<img src="addons/pager/icons/prev.png" class="prev"/>'.
	    '<input type="text" class="pagedisplay"/>'.
            '<img src="addons/pager/icons/next.png" class="next"/>'.
            '<img src="addons/pager/icons/last.png" class="last"/>'.
	    '<select class="pagesize">'.
		'<option value="10">10</option>'.
			'<option value="20">20</option>'.
			'<option value="30">30</option>'.
			'<option  value="40">40</option>'.
	   '</select>'.
	 '</form>'.
         '</div>';
?>