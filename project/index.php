<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 Final Project - Index</title>
    <link rel="stylesheet" href="css/stylesheet.css">
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

        #topSection  {
            background-color:#2596FF;
            height:100%;
            padding:2.5%;
            padding-bottom:1000px;
        }

        #card  {
            width:15%;
            height:200px;
            background-color:#F9F9F9;
            margin:auto;
            vertical-align: middle;
            text-align:center;
            font-size:24px;
            padding:2%;
            border-radius:8px;
        }

        a  {
            color:black;
            text-decoration:none;
        }

        .button  {
            background-color: #091534;
            border: none;
            border-radius: 32px;
            color: white;
            padding: 10px 37px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 1px;
            cursor: pointer;
        }

         /*
        footer styling
        */
        footer  {
            text-align:center;
            font-weight:bold;
        }

        @media screen and (max-width: 1150px)  {
            #card  {
                width:75%;
                padding:5%;
            }
        }

        @media screen and (max-width: 600px)  {
            form  {
                width:75%;
            }
        }
    </style>
</head>
<body>

    <div class="topnav" id="myTopnav">
            
            <a href="login.php">Admin Login</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            
    </div>

    <header>

        <h1>WDV341 Intro to PHP - Events Project</h1>

    </header>

    <div id="topSection">

        <div class=".container-fluid" id="card">

            <p>Admin Login</p>

            <a href="login.php" class="button">Login</a>

        </div>

    </div>
    
    <footer>

        <p>Trey Morris &copy;<?php echo date("Y");?></p>

    </footer>

    
</body>
</html>