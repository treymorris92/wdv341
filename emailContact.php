<?php

    $tableList = "";                        
    
    foreach($_POST as $key => $value)  {
        $tableList .= $key . ": ";		    
        $tableList .= $value . "</br>";	                                       
    }

    $to = "treymorris92@gmail.com";    
    
    $subject = "You have recieved a contact request";     
    
    $message = submitDate() . 
        "Hello Trey,</br> You have a new contact form request. Information collected : </br>"
        . $tableList . "</br> Please respond to the contact with 48 hours.  Thank you. </br></br> 
        From, </br> contact@treymorrisphotgraphy.com";
    
    $headers = "From: contact@treymorrisphotography.com" . "\r\n";   

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";    

    mail($to,$subject,$message,$headers); 
  
?>