<!DOCTYPE html>
<html lang="en">
<head>
  <title>Geenshelf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="img/favicon.ico"/>
  <style type="text/css">
    body {
      font-family:"sans-serif";
      font-size: 120%;
    }
    .table{
      margin: 10px; width: 96%; text-align: center;
    }
    .table, tr,th, td{
      border: 2px solid gray; text-align: center;       
    }
    .th_subj{
      color: #FFF; background: #333; text-align: center;       
    }
    .tick{
      color: green; font-size: 22px;
    }
    .cross{
      color: #e60000; font-size: 22px;
    }
    #add_head { color: green; font-family: 'Lobster', cursive;
       font-size: 36px;
       font-weight: normal;
       line-height: 48px;
       margin: 0 0 18px;
       text-shadow: 1px 0 0 #fff; 
    }

    #add_head:hover { color: red; text-decoration: blink; 
    }
   .dropdown-menu {
  left: 50%;
  right: auto;
  text-align: center;
  transform: translate(-50%, 0);
}

  </style>
</head>

<body style="padding-bottom: 70px;">


  <div class="navbar navbar-default navbar-static-top" style="background:#ac7ee5">
  
  <div class ="container" style="height:150px">    
    <a href="index.html" class="navbar-brand">
       <div><h1 style="color:white">GreenShelf!</h1></div>
    </a>
    
    <button class="navbar-toggle" data-toggle="collapse" data-target = ".navHeaderCollapse">
      <span class="icon-bar" style="background:white;"></span>
      <span class="icon-bar" style="background:white;"></span>
      <span class="icon-bar" style="background:white;"></span>
    </button>
    <div class="collapse navbar-collapse navHeaderCollapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="index.html" style="color:white">HOME</a></li>
        <li><a href="about.html" style="color:white">ABOUT</a></li>
        <li><a href="faq.html" style="color:white">FAQ</a></li>
      </ul>
    </div>
    </div>
  </div>

<center>
  <h2 id="add_head">Advertisers</h2>

  <div class="dropdown">
    <button  style="width: 250px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Chemistry Cycle 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 250px;">
      <li style="text-align: center;"><a href="advertiser.php">Physics Cycle</a></li>
      <li style="text-align: center;"><a href="advertiserChem.php">Chemistry Cycle</a></li>
    </ul>
  </div>  
</center>
<center> 
<!-- Adds -->  

<div class="table-responsive">          
  <table id="addTable" class="table">
    <thead>
      <tr style="background:#5cd65c;">
        <th class="th_subj" colspan="2">Seller Details</th>
        <th class="th_subj" colspan="3">Maths</th>
        <th class="th_subj" colspan="3">Computer Programming</th>
        <th class="th_subj" colspan="2">ESE</th>
        <th class="th_subj" colspan="2">Chemistry</th>
        <th class="th_subj" colspan="2">B.E</th>
        <th class="th_subj" colspan="1">E.D</th>
      </tr>
      <tr style="background:#ffad33">
        <th>Gender</th>
        <th>RollNo</th>
        <th>Kreyszig</th>
        <th>S.C Mallick</th>
        <th>Math-Sol-1</th>
        <th>Balaguruswamy</th>
        <th>LetUs C</th>
        <th>C in Depth</th>
        <th>Gerad Keley </th>
        <th>B.K publiction</th>
        <th>Sashi Chawla</th>
        <th>Chemistry-1(kar,mishra,Das)</th>
        <th>Boylested</th>
        <th>B.E -B.K publication</th>
        <th>Engineering Drawing</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</center>

<script>
<?php
  $cross = $tick = $name = $gender = $girl = $boy = "";
  $cross = '<i class="glyphicon glyphicon-remove-sign cross"></i>';
  $tick = '<i class="glyphicon glyphicon-ok-sign tick"></i>';
  $boy = '<img src="img/man.png">';
  $girl = '<img src="img/girl.png">';

  require('conn.php');
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT id,name,s11,s12,s13,s14,s15,s16,s17,s18,s19,s20,s21,s22,s23,gender,date_order,bookchem,rank FROM seller where verified=1 and (s11+s12+s13+s14+s15+s16+s17+s18+s19+s20+s21+s22+s23)>0 group by date_order,bookchem,rank order by rank,bookchem DESC LIMIT 0, 30";

  $result = $conn->query($sql);
  $c =0;
  while($row = $result->fetch_assoc()){
    if($row["gender"] == "1"){
      $gender = $boy;
    }
    else{
      $gender = $girl;
    }
  $c++;
   $addRow = "<td>". '<input id="cBox' . $c .'" type="checkbox" onclick="count(this.id)">'.$gender.'</td><td id="rollcBox' . $c . '">'.$row["id"]."</td>";   
    for($i = 11; $i<=23;$i++){
      if($row["s".$i] == "1"){
        $addRow = $addRow."<td>".$tick."</td>";
      }
      else{
        $addRow=$addRow."<td>".$cross."</td>";
      }
    }
   echo "$('#addTable').append('<tr>$addRow</tr>');";
  }
?>
</script>
<center>
<button class="btn btn-success" onclick="prcceed()">Proceed</button>
</center>
<script>
var check_count = 0;  
var map = [0,0,0];
function count(id){
 if($('#'+id).is(":checked")){
    if(check_count < 3 ){
      $('#'+id).prop("checked", true);
      map[check_count] = id.toString();
      $('#'+id).val(check_count);
      check_count++;
    }
    else{
      $('#'+id).prop("checked", false);
      alert("Max 3 is allowed");
    }
  }
  else{
      $('#'+id).prop("checked", false);    
      check_count--;
      var pos = parseInt($('#'+id).val());
      map[pos] = 0;
  }  
}


function prcceed(){
if(check_count == 0){
  alert("Please Select at least One Seller !");
  return;
}

sessionStorage.setItem('userType',"buyer");

if (map[0] != 0) {
  sessionStorage.setItem('choice1',$('#roll'+map[0]).text());
}
else{
  sessionStorage.setItem('choice1','NULL');
}
if (map[1] != 0) {
  sessionStorage.setItem('choice2',$('#roll'+map[1]).text());
}
else{
  sessionStorage.setItem('choice2',"NULL");
}

if (map[2] != 0) {
  sessionStorage.setItem('choice3',$('#roll'+map[2]).text());
}
else{
  sessionStorage.setItem('choice3','NULL');
}
window.location.href="detail.html";  
}

</script>
<br><p style="margin-left: 25px; font-weight:bold;">
  **It is not mandatory for a buyer to buy all the books from a seller.<br>  
  **You can buy one or more number of books from the sellers of your choice.
</p>
</body>
</html>
