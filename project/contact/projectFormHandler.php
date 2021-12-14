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
        <title>Form Handler</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script>
            function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
            }
        </script>
        
        <title>WDV341 Form Handler</title>

        <style>

            body  {
                font-family: 'Nunito', sans-serif;
                background-color: #2596FF;
            }
            
            h1, h2, h3  {
                text-align: center;
            }

            div#message  {
                background-color:#F9F9F9;
                width:960px;
                margin:auto;
                padding:20px;
                border-style:solid;
                border-width: thin;
                border-color: black;
            } 

            /*
            footer styling
            */
            footer  {
                text-align:center;
                font-weight:bold;
            }

            @media screen and (max-width: 960px)  {
                div#message {
                    width:75%;
                }
            }

            @media screen and (max-width: 600px)  {
                div#message {
                    width: 100%;
                }
            }

        </style>
   
    </head>

    <body>

        <div class="topnav" id="myTopnav">
            
            <a href="../admin.php">All Events</a>
            <a href="../insert.php">Add Event</a>
            <a href="contact.php">Contact</a>
            <a href="../logout.php">Logout</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            
        </div>

        <div id="message">

            <h2>Form submitted successfully!</h2>

            <p>
                Dear <?php echo $_POST["firstName"] , ","; ?>
            </p>

            <p>
                Thank you for your interest and reaching out to me. Your form is being processed. You will recieve a confirmation email at: <?php echo $_POST["email"]; ?></br>
                
                You entered the following comments: </br>
                
                <q><?php echo $_POST["comment"]; ?></q>      
            </p>

            <p>
                You will recieve a confirmation email shortly. 
            </p>

            <p>
                Best Regards,</br>
                
                Trey Morris</br>
                
                treymorrisphotography.com
            </p>

        </div>

        <footer>

            <p>Trey Morris &copy;<?php echo date("Y");?></p>

        </footer>

    </body>