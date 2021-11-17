<?php

    include "emailContact.php";    
    include "emailResponse.php";   

    function submitDate()  {               
        $date = date("m/d/y");              
        return $date;                       
    }

    function genResponse($selectedReason){ 
        
        if($selectedReason == "Schedule Interview")  {
            $response = "Schedule Interview";
        }
        
        if($selectedReason == "Freelance Work")  {
            $response = "Freelance Work";
        }
        
        if($selectedReason == "Consultation")  {
            $response = "Consultation";
        }
        
        if($selectedReason == "Other")  {
            $response = "Other";
        }
        
        return $response;
    } 

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
        
        <title>WDV341 Form Handler</title>

        <style>

            body  {
                font-family: 'Nunito', sans-serif;
                background-color: #50586C;
            }
            
            h1, h2, h3  {
                text-align: center;
            }

            div  {
                background-color:#DCE2F0;
                width:960px;
                margin:auto;
                padding:20px;
                border-style:solid;
                border-width: thin;
                border-color: black;
            } 

        </style>
   
    </head>

    <body>

        <div>

            <h2>Form submitted successfully!</h2>

            <p>
                Dear <?php echo $_POST["firstName"] , ","; ?>
            </p>

            <p>
                Thank you for your interest and reaching out to me. Your form is being processed. You will recieve a confirmation email at: <?php echo $_POST["email"]; ?></br>
                
                You have selected <?php echo genResponse($_POST["reason"]); ?> as the reason for contact, with the following comments: </br>
                
                <q><?php echo $_POST["comment"]; ?></q>      
            </p>

            <p>
                You will recieve a confirmation email shortly. I will respond to your inquiry as soon as possible.
            </p>

            <p>
                Best Regards,</br>
                
                Trey Morris</br>
                
                treymorrisphotography.com
            </p>

        </div>

    </body>