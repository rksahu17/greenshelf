<?php
require('conn.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $rollno = mysql_escape_string($_GET['email']); // Set email variable
        $hash = mysql_escape_string($_GET['hash']); // Set hash variable

        $search = $conn->query("SELECT rollno, hash, verified FROM student WHERE rollno='$rollno' AND hash='$hash' AND verified='0'");

        $match  = $search->num_rows;
     if($match > 0){
          $conn->query("UPDATE student SET verified='1' WHERE rollno='$rollno' AND hash='$hash' AND verified='0'");

        /** create some local variablers */
            $stock = $sellerStock = $buyerStock = "";
            $stockArr = $sellerStockArr = $buyerStockArr = ""; 
        
        /* get stock details*/ 
                    $sql = "SELECT s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,s13,s14,s15,s16,s17,s18,s19,s20,s21,s22,s23,s24 FROM stock;";
                    $result = $conn->query($sql);               

                    if ($result->num_rows > 0) {
                // output data of each row
                        while($row = $result->fetch_assoc()) {
                            for ($i=1; $i <=24; $i++) { 
                                $stock = $stock . $row["s".$i];
                                $stock = $stock .  " ";
                            }
                        }
                    }
                $stockArr= explode(" ",$stock);

        /* check whether it is buyer email or seller */
                $sellerResult = $conn->query("SELECT id FROM seller WHERE id='$rollno'");
                $buyerResult = $conn->query("SELECT id FROM buyer WHERE id='$rollno'");

        /* if buyer email */        
                    if($sellerResult->num_rows >0){  
                        $sql = "SELECT s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,s13,s14,s15,s16,s17,s18,s19,s20,s21,s22,s23,s24 FROM seller where verified= '0' AND id ='$rollno'";
                        $result = $conn->query($sql);               
                

                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                for ($i=1; $i <=24; $i++) { 
                                    $sellerStock = $sellerStock . $row["s".$i];
                                    $sellerStock = $sellerStock .  " ";
                                }
                            }
                        }
                        $sellerStockArr= explode(" ",$sellerStock);
                        for($i=0;$i<=23;$i++){
                            $sellerStockArr[$i] = $stockArr[$i] + $sellerStockArr[$i];
                        }
         /* query to update stock table*/                     
                        
                        $conn->query("UPDATE stock SET s1='$sellerStockArr[0]',s2='$sellerStockArr[1]',s3='$sellerStockArr[2]',s4='$sellerStockArr[3]',s5='$sellerStockArr[4]',s6='$sellerStockArr[5]',s7='$sellerStockArr[6]',s8='$sellerStockArr[7]',s9='$sellerStockArr[8]',s10='$sellerStockArr[9]',s11='$sellerStockArr[10]',s12='$sellerStockArr[11]',s13='$sellerStockArr[12]',s14='$sellerStockArr[13]',s15='$sellerStockArr[14]',s16='$sellerStockArr[15]',s17='$sellerStockArr[16]',s18='$sellerStockArr[17]',s19='$sellerStockArr[18]',s20='$sellerStockArr[19]',s21='$sellerStockArr[20]',s22='$sellerStockArr[21]',s23='$sellerStockArr[22]',s24='$sellerStockArr[23]' where id='1'");                            
                        $conn->query("UPDATE seller SET verified='1' WHERE id='$rollno' AND verified='0'");
                         readfile("Done.html");
         
                      echo '<div class="statusmsg" style="color:green; margin-left:35%;font: italic bold 12px/30px Georgia, serif;">Your Ad Has Been Placed Successfully.To check <a href="advertiser.php">Click Here</a> </div>';
                    }

                    elseif($buyerResult->num_rows >0){
        /* get buyer stock */
                        $sql = "SELECT s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,s13,s14,s15,s16,s17,s18,s19,s20,s21,s22,s23,s24 FROM buyer where verified= '0' AND id ='$rollno'";
                        $result = $conn->query($sql);               
                        
                          if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    for ($i=1; $i <=24; $i++) { 
                                        $buyerStock = $buyerStock . $row["s".$i];
                                        $buyerStock = $buyerStock .  " ";
                                    }
                                }
                            }

                        $buyerStockArr= explode(" ",$buyerStock);            

                        for($i=0;$i<=23;$i++){
                            $buyerStockArr[$i] = $stockArr[$i] - $buyerStockArr[$i];  
                        }

         /* query to update stock table*/                     
                         $conn->query("UPDATE stock SET s1='$buyerStockArr[0]',s2='$buyerStockArr[1]',s3='$buyerStockArr[2]',s4='$buyerStockArr[3]',s5='$buyerStockArr[4]',s6='$buyerStockArr[5]',s7='$buyerStockArr[6]',s8='$buyerStockArr[7]',s9='$buyerStockArr[8]',s10='$buyerStockArr[9]',s11='$buyerStockArr[10]',s12='$buyerStockArr[11]',s13='$buyerStockArr[12]',s14='$buyerStockArr[13]',s15='$buyerStockArr[14]',s16='$buyerStockArr[15]',s17='$buyerStockArr[16]',s18='$buyerStockArr[17]',s19='$buyerStockArr[18]',s20='$buyerStockArr[19]',s21='$buyerStockArr[20]',s22='$buyerStockArr[21]',s23='$buyerStockArr[22]',s24='$buyerStockArr[23]' where id='1'");

                        $conn->query("UPDATE buyer SET verified='1' WHERE id='$rollno' AND verified='0'");
    
                        $sql = "SELECT choice1,choice2,choice3 FROM buyer where verified= '1' AND id ='$rollno'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { 
                                        $choice1 = $row["choice1"];
                                        $choice2 = $row["choice2"];
                                        $choice3 = $row["choice3"];
                                }
                            }
                         
                         $sql = "SELECT name,phone,email FROM `student` WHERE rollno='$choice1' or rollno='$choice2' or rollno='$choice3' LIMIT 0, 30 ";
                        
                        $result = $conn->query($sql);$i=1;
                        if ($result->num_rows > 0) {
                                    $name=array("","","");
                                    $phone=array("","","");
                                    $email=array("","","");

                                while($row = $result->fetch_assoc()) { 
                                    

                                        $name[$i] =$row["name"];
                                        $phone[$i] =$row["phone"];
                                        $email[$i] =$row["email"];
                                        $i=$i+1;
                                }
                            }  
                                               
                        $sql = "SELECT name,phone,email FROM `student` WHERE rollno='$rollno' ";
                        
                        $result = $conn->query($sql);        
                       if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { 
                                        $buyername = $row["name"];
                                        $buyerphone = $row["phone"];
                                        $buyeremail = $row["email"];
                                }
                            }
                          

                         $sql = "SELECT rank FROM `seller` WHERE id='$choice1' ";
                         $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { 
                                        $rank1 = $row["rank"];
                                }
                            }
                          $rank1=$rank1+1;
                          $conn->query("UPDATE seller SET rank='$rank1' WHERE id='$choice1' AND verified='1'");

                          $sql = "SELECT rank FROM `seller` WHERE id='$choice2' ";
                         $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { 
                                        $rank1 = $row["rank"];
                                }
                            }
                          $rank1=$rank1+1;
                          $conn->query("UPDATE seller SET rank='$rank1' WHERE id='$choice2' AND verified='1'");

                           $sql = "SELECT rank FROM `seller` WHERE id='$choice3' ";
                         $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) { 
                                        $rank1 = $row["rank"];
                                }
                            }
                          $rank1=$rank1+1;
                          $conn->query("UPDATE seller SET rank='$rank1' WHERE id='$choice3' AND verified='1'");




                         $done=1;
                         readfile("Done.html");
         
                      echo '<div class="statusmsg" style="color:green; margin-left:35%;font: italic bold 12px/30px Georgia, serif;">Seller Details Are Sent To Your Email Successfully </div>';
 

                }
           

        
    }
    else{
        // No match -> invalid url or account has already been activated.
        readfile("Done.html");
        echo '<div class="statusmsg" style="color:red; margin-left: 25%;font: italic bold 12px/30px Georgia, serif;"> You already have ordered before from this Roll no. Or If want to order Again Withdraw And Order Again.</div>';
    }

}
else{
// Invalid approach
    readfile("Done.html");
    echo '<div class="statusmsg" style="margin-left:25%;font: italic bold 12px/30px Georgia, serif;">Invalid approach, please use the link that has been send to your email.</div>';
}
if($done==1)
{
     // send e-mail to 
        $to=$buyeremail;       

        // Your subject
        $subject="GreenShelf!! ";       
        
        

        // Your message
        $message='
        '.$buyername.'
        Thanks for Placing Order!
        Your Requested Seller Details below
        Please contact them soon!
         '.$name[1].'     '.$email[1].'    '.$phone[1].'
         '.$name[2].'     '.$email[2].'    '.$phone[2].'
         '.$name[3].'     '.$email[3].'    '.$phone[3].'
        ------------------------------------------------------------------------------------------------
        Please click this link to activate your account:
        http://greenshelf.phpzilla.net/verify.php?email='.$rollno.'&hash='.$ver_code.'       

        ';
        $headers = 'From:noreply@greenshelf.phpzilla.net' . "\r\n";       

        // send email
        $sentmail = mail($to,$subject,$message,$headers);
        
        $done=0;
        
}
if($done==0)
{
         // send e-mail to 
        $to = $email[1];       

        // Your subject
        $subject="GreenShelf!! ";       
        
        

        // Your message
        $message='
        
        Thanks for Placing Ad !!
        Your Details has been sent to the buyer below
        Please contact them soon!
         '.$buyername.'     '.$buyeremail.'    '.$buyerphone.'
         
        ------------------------------------------------------------------------------------------------
        Please click this link to activate your account:
        http://greenshelf.phpzilla.net/verify.php?email='.$rollno.'&hash='.$ver_code.'       

        ';
        $headers = 'From:noreply@greenshelf.phpzilla.net' . "\r\n";       

        // send email
        $sentmail = mail($to,$subject,$message,$headers);
        
       $to = $email[2];
        $sentmail = mail($to,$subject,$message,$headers);
        $to = $email[3];
        $sentmail = mail($to,$subject,$message,$headers);

}

 $conn->close();
?>			