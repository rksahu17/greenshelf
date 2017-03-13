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
      border: 2px solid gray;        
    }
    .tick{
      color: green; font-size: 22px;
    }
    .cross{
      color: #e60000; font-size: 22px;
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
  <h3>Advertiser</h3>
</center>  

  <div style="margin-left:45%;" class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Physics Cycle 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">Physics Cycle</a></li>
      <li><a href="#">ChemistryCycle</a></li>
    </ul>
  </div>

<center> 
<!-- Adds -->  

<div class="table-responsive">          
  <table id="addTable" class="table">
    <thead>
      <tr style="background:#ffad33">
        <th>Gender</th>
        <th>RollNo</th>
        <th>Name</th>
        <th>Kreyszig</th>
        <th>S.C Mallick</th>
        <th>Math-Sol-1</th>
        <th>S.Timoshanko</th>
        <th>Timoshanko solution</th>
        <th>Mohammad Rizvi</th>
        <th>B.B Swain</th>
        <th>Theraja vol-1</th>
        <th>Sathapathy</th>
        <th>Theraja vol-2</th>
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

  $gender = $girl;

  require('conn.php');
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT id,name,s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,gender,date_order,bookphy,rank FROM seller where verified=1 and (s1+s2+s3+s4+s5+s6+s7+s8+s9+s10)>0 group by date_order,bookphy,rank order by rank,bookphy DESC LIMIT 0, 30";

  $result = $conn->query($sql);
  
  while($row = $result->fetch_assoc()){
    if($row["gender"] == "1"){
      $gender = $boy;
    }
   
   $addRow = "<td>".$gender."</td><td>".$row["id"]."</td><td>".$row["name"];
    for($i = 1; $i<=10;$i++){
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

</body>
</html>
