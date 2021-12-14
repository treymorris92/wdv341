<?php
    //access the GET parameter from the name/value pair eventId=?
    
    //echo $_GET['eventId'];

    $deleteId = $_GET['eventId'];

try  {

    require 'dbConnect.php';

    $sql = "DELETE FROM wdv341_events WHERE events_id=:eventId";
    $stmt = $conn->prepare($sql);               //prepare statement
    $stmt->bindParam(':eventId',$deleteId);
    $stmt->execute();


    $numDeletes = $stmt->rowCount();
}
catch(PDOException $e){
    echo "Errors: " . $e->getMessage();
    //display error message, Ask user to try again!
    $numDeletes = -1;   //Switch/Flag that tells us what happened. We have an error, so display the ERROR message
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV Final Project - Admin</title>
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

        body  {
            background-color:#2596FF;
        }

        h1  {
            text-align:center;
        }

        #container  {
            width:960px;
            padding:2.5%;
            background-color:#F9F9F9;
            margin:auto;
            border-radius:8px;
        }

         /*
        footer styling
        */
        footer  {
            text-align:center;
            font-weight:bold;
        }
    </style>
</head>
<body>

    <div class="topnav" id="myTopnav">
            
            <a href="insert.php">Add Event</a>
            <a href="contact/contact.php">Contact</a>
            <a href="logout.php">Logout</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            
    </div>

    <div id="container">

        <header>

            <h1 class="text-center">Event Successfully Deleted</h1>

        </header>

        <?php echo "<h1>Number of rows deleted: " . $stmt->rowCount() . "</h1>";     //how many rows affected by delete ?>

        <h3 class="text-center"><a href="admin.php">Return to Admin Area</a></h3>
        
        <?php
            //if good delete, display confirmation and provide link to return back to login?
            if($numDeletes){
                //display it worked
            }
            else  {
                //display it did not work
            }
    
            //else display error message, provide link back to selectEvents to try again

        ?>

    </div>
    
    <footer>

        <p>Trey Morris &copy;<?php echo date("Y");?></p>

    </footer>

    
</body>
</html>