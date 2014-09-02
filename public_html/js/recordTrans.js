//Originally, I was recording transactions using a form submission.
//However, I did not like the refreshing that occurs, and so 
//I changed it to an AJAX submission. 

function recordTransaction()
{
  if(validateTransForm()){
    var xmlHttp = getXMLHttp();
    var postString = '';
    xmlHttp.onreadystatechange = function()
    {
      if(xmlHttp.readyState == 4)
      {
        recordResponse(xmlHttp.responseText);
      }
    }

    postString += "transAmt=" + document.getElementById("transAmt").value;
    postString += "&transCat=" + document.getElementById("transCat").value;
    postString += "&transDate=" + document.getElementById("transDate").value;
    postString += "&transDesc=" + document.getElementById("transDesc").value;

    xmlHttp.open("POST", "php/transactions.php", true); 
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send(postString);
    }
}

function recordResponse(responseText){
    var date = new Date(document.getElementById("transDate").value);
    var month = date.getMonth();
    
    listTransactions(month);
    chartTransactions(month);
    
    //Clear the values now that they've been submitted.
    document.getElementById("transAmt").value = '';
    document.getElementById("transCat").value = '';
    document.getElementById("transDate").value = '';
    document.getElementById("transDesc").value = '';
   
}
