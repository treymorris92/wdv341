<?php

if($_POST){

	$to = 'some@email.com';
	$subject = 'Testing HoneyPot';
	$header = "From: $name <$name>";

	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];

	//honey pot field
	$honeypot = $_POST['name'];

	if( ! empty( $honeypot ) ){
		return; 
	}else{
		mail( $to, $subject, $comment, $header );
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <title>Contact Form with Email Project</title>
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

    <style>

        body  {
            font-family: 'Nunito', sans-serif;
            background-color: #2596FF;
        }
        
        h1,h3  {
            text-align: center;
        }

        form  {
            width:960px;
            background-color:#F9F9F9;
            margin:auto;    
            padding: 20px; 
            font-family: 'Nunito', sans-serif;
            font-size:larger;
            border-style:solid;
            border-width: thin;
            border-color: black;
        }

        form legend	 {
            font-size:larger;
            text-align:center;
        }

        input[type="text"], input[type="email"], textarea, select  {
            background-color: #fff;
            color: #000;
            width: 50%;
            width:100%;
            font-family: 'Nunito', sans-serif;
        }

        input[type=submit],input[type=reset] {
            background-color: #091534;
            border: none;
            border-radius: 32px;
            color: white;
            padding: 10px 37px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 2px 1px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {opacity: 0.7}

        a:link  {
            color:white;
        }

        a:visited  {
            color:white;
        }

        .hide-robot{
			display:none;
		}

         /*
        footer styling
        */
        footer  {
            text-align:center;
            font-weight:bold;
        }

        @media screen and (max-width: 960px)  {
            form {
                width:100%;
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

    <form id="form1" name="form1" method="post" action="projectFormHandler.php">

        <h1>Let's Talk</h1>

        <h3>Please leave your contact information and I'll get back to you as soon as possible! </h3>

        <p>
          <input name="name" type="text" id="name" class="hide-robot">
        </p>

        <p>
          <label for="firstName">First Name:</label> 
          <input type="text" name="firstName" id="firstName" required/>
        </p>
        
        <p>
          <label for="lastName">Last Name:</label> 
          <input type="text" name="lastName" id="lastName" required/>
        </p>

        <p>
          <label for="email">Email:</label> 
          <input type="email" name="email" id="email" required/>
        </p>

        <p>
            <label for="comment">Comments:</label>
              <textarea  rows="6" cols="125" name="comment"  id="comment" required></textarea>
        </p>
        
        <p>
            <input type="submit" name="button" id="button" value="Submit" />
            <input type="reset" name="button2" id="button2" value="Reset" />
        </p>

    </form>

    <footer>

        <p>Trey Morris &copy;<?php echo date("Y");?></p>

    </footer>
    
</body>
</html>