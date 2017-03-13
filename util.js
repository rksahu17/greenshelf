var phyCheck_count = 0;
var chemCheck_count = 0;
//var stockArray;


/**
// AJAX function to retrive data from server
// reqs-> request type
**/

function sendReqst(reqs){

    if(reqs.match("stockdetails") == "stockdetails"){
      var rVal = callAJAX(reqs);
      return rVal;
    }
    else if(reqs.match("seller") == "seller"){
      reqs += "&phycart=" + sessionStorage.getItem('phy_selcart') + "&chemcart=" + sessionStorage.getItem('chem_selcart') + "&addcart=" + sessionStorage.getItem('add_selcart');
      var orderStatus = callAJAX(reqs);
    }
    else if(reqs.match("buyer") == "buyer"){
      reqs += "&phycart=" + sessionStorage.getItem('phy_buycart') + "&chemcart=" + sessionStorage.getItem('chem_buycart') + "&addcart=" + sessionStorage.getItem('add_buycart');
      var orderStatus = callAJAX(reqs);
    }
    else if(reqs.match("countuser") == "countuser"){
      callAJAX(reqs);
    }
    else if(reqs.match("greenshelf") == "greenshelf"){
      callAJAX(reqs);
    }
    else if(reqs.match("seller_no") == "seller_no"){
      callAJAX(reqs);
    }
    else if(reqs.match("admin") == "admin"){
      return callAJAX(reqs);
    }
}

function callAJAX(reqs) {
  var retVal = "NULL";
    $.ajax({
      url: 'My.php?q=' + reqs,
      type: 'POST',
      cache: false,
      dataType: 'text',
      async: false,
      success: function(rval, status){
        retVal = rval;
      },
      error: function (error){
        alert("Error in Ajax !: " + error);
      } 
    });
  return retVal;
}
