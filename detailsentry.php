<?php
require_once "recaptchalib.php";
require('conn.php');

  // your secret key
  $secret = "6LeNkCYTAAAAAH1TA9HT8X63Pj2MHhAfZ28CtC-N";
  // empty response
  $response = null; 
  // check secret key
  $reCaptcha = new ReCaptcha($secret);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$room = $address = $name = $rollno = $phoneno = $q = $email = $hall = $phy = $phyArr = $chem = $chemArr = $addit = "";
$ver_code=md5(uniqid(rand()));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $rollno = test_input($_POST["rollno"]);
  $phoneno = test_input($_POST["phoneno"]);
  $gender = test_input($_POST["gender"]);
  $hall = test_input($_POST["hall"]);
  $room = test_input($_POST["room"]);
  $address = test_input($_POST["address"]);
  $email = test_input($_POST["email"]);
  $q = test_input($_POST["q"]);
  $phy=$_POST["phycart"];
  $phyArr = explode(" ", $phy);
  $chem=$_POST["chemcart"];
  $chemArr = explode(" ", $chem);
  $addit = $_POST["addcart"];
  $choice1 = test_input($_POST["choice1"]);
  $choice2 = test_input($_POST["choice2"]);
  $choice3 = test_input($_POST["choice3"]);
      
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  // if submitted check response
  if ($_POST["g-recaptcha-response"]) {
      $response = $reCaptcha->verifyResponse(
          $_SERVER["REMOTE_ADDR"],
          $_POST["g-recaptcha-response"]
      );
  }
  $totalphy=$phyArr[0]+$phyArr[1]+$phyArr[2]+$phyArr[3]+$phyArr[4]+$phyArr[5]+$phyArr[6]+$phyArr[7]+$phyArr[8]+$phyArr[9];
  $totalchem=$chemArr[0]+$chemArr[1]+$chemArr[2]+$chemArr[3]+$chemArr[4]+$chemArr[5]+$chemArr[6]+$chemArr[7]+$chemArr[8]+$chemArr[9]+$chemArr[10]+$chemArr[11]+$chemArr[12];
  if (!($response != null && $response->success)) {
          readfile("detail.html");
          echo "<script> alert('Please Tick the reCAPTCHA') </script>";
          $conn->close();   
        } 
  else {
        if($q == "seller"){
             $sql = "INSERT INTO seller (id,name, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13, s14, s15, s16, s17, s18, s19, s20, s21, s22, s23, s24,date_order, date_comp, verified,rank,gender,bookphy,bookchem) VALUES('$rollno','$name','$phyArr[0]','$phyArr[1]','$phyArr[2]','$phyArr[3]','$phyArr[4]','$phyArr[5]','$phyArr[6]','$phyArr[7]','$phyArr[8]','$phyArr[9]','$chemArr[0]','$chemArr[1]','$chemArr[2]','$chemArr[3]','$chemArr[4]','$chemArr[5]','$chemArr[6]','$chemArr[7]','$chemArr[8]','$chemArr[9]','$chemArr[10]','$chemArr[11]','$chemArr[12]','$addit',CURDATE(),'0','0','0','$gender','$totalphy','$totalchem')";
           if ($conn->query($sql) == TRUE) {
                  //TODO: echo "success";
              } 
        }     

        elseif ($q == "buyer") {
        
              $sql = "INSERT INTO buyer (id, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13, s14, s15, s16, s17, s18, s19, s20, s21, s22, s23, s24,date_order, exp_date, date_comp, verified,choice1,choice2,choice3) VALUES('$rollno','$phyArr[0]','$phyArr[1]','$phyArr[2]','$phyArr[3]','$phyArr[4]','$phyArr[5]','$phyArr[6]','$phyArr[7]','$phyArr[8]','$phyArr[9]','$chemArr[0]','$chemArr[1]','$chemArr[2]','$chemArr[3]','$chemArr[4]','$chemArr[5]','$chemArr[6]','$chemArr[7]','$chemArr[8]','$chemArr[9]','$chemArr[10]','$chemArr[11]','$chemArr[12]','$addit',CURDATE(),CURDATE()+INTERVAL 7 DAY,'0','0','$choice1','$choice2','$choice3')";
              if ($conn->query($sql) == TRUE) {
                 //TODO: echo "Thanks";
              } 
        }

    /** fill sttu details */
       $sql = "insert into student (rollno,name,phone,email,hall,roomno,address,hash,verified) values('$rollno','$name','$phoneno','$email','$hall','$room','$address','$ver_code','0')";
        if ($conn->query($sql) == TRUE) {
             readfile("confirmemail.html");
        } else {
             readfile("detail.html");
             echo "<script> alert('Have You Ordered before?  Or Please Enter valid Inputs !!')</script>";
        }



        // send e-mail to 
        $to=$email;       

        // Your subject
        $subject="GreenShelf!! ";       
        
        

        // Your message
        $message='
        '.$name.'
        Thanks for Placing Order!
        Your Order Has been received,Confirm your Order by pressing the url below
        ------------------------------------------------------------------------------------------------
        Please click this link to activate your account:
        http://greenshelf.phpzilla.net/verify.php?email='.$rollno.'&hash='.$ver_code.'       

        ';
        $headers = 'From:noreply@greenshelf.phpzilla.net' . "\r\n";       

        // send email
        $sentmail = mail($to,$subject,$message,$header);        

  }
$conn->close();
?>
