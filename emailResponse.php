<?php  

    $to = $_POST["email"];  
   
    $subject = "Your form was successfully submitted"; 
    
    $message = "
   
    <html>
        
        <head>   
        </head>
        
        <body>
        
            <h3 style='color:black;'>Thank you! Your form was recieved.  I'll review your information and get back to you as soon as possible</h3>
            
            <div style='background-color:#DCE2F0; padding:20px; color:black; border-style:solid; border-width:thin; border-color:black;'>
                
                <p>" . submitDate() . "</p>
                    
                <p>
                    Dear " . $_POST['firstName'] . ", 
                </p>
                            
                <p>
                    Thank you for your interest.  This email is confirmation that the information you submitted has been recieved.
                        
                    You selected " . genResponse($_POST['reason']) . " as the reason for contact, with the following comments:</br></br>
                        
                    <q>" . $_POST['comment'] . "</q> 
                        
                </p>
                    
                <p>
                        
                </p>
                
                <p style='color:black;'>
                    
                    Best Regards,</br>
                        
                    Trey Morris</br>
                        
                    treymorrisphotography.com
                    
                </p>
            
            </div>
       
        </body>
    
    </html>";

    $headers = "From: contact@treymorrisphotography.com" . "\r\n";   

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";    

    mail($to,$subject,$message,$headers);                           
  
?>