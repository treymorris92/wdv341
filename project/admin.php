<?php
    
    include 'dbConnect.php';

    try {
        
        $sql = "SELECT * FROM wdv341_events";
        $stmt = $conn->prepare($sql);           //prepare statement
        $stmt->execute();                       //result object is still in database format

        //$result = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo $results['events_id'];

    }

        catch(PDOExceptions $e){
            echo "Errors: " . $e->getMessage();
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 Final Project - Admin</title>
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
            background-color:#F9F9F9;
        }

        div#dbContent  {
            width:75%;
            background-color:white;
            margin:auto;
            padding:2.5%;
            border-radius:5px;
        }

        p  {
            font-weight:bold;
        }

        table  {
            border: 1px solid black;
        }

        thead  {
            background-color:#2596FF;
        }

         /*
        footer styling
        */
        footer  {
            text-align:center;
            font-weight:bold;
        }

        @media screen and (max-width: 1440px)  {
            div#dbContent {
                width:100%;
            }
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

    <header>

        <h1 class="text-center">Admin Area</h1>

    </header>

    <div style="overflow-x:auto;" id="dbContent">

    <?php
            if(!empty($_GET['eventId'])){
              $id = $_GET['eventId'];
              $name = $_GET['eventName'];
        ?>
            <h2 class="text-primary text-center">Event Name: <?php echo $name ?> Is Updated</h2>
        <?php 
            }
        ?>
        <table class="table"> 
            <thead>
                <tr>
                    <th scope="col">Event Id</th>
                    <th scope="col">Event</th>
                    <th scope="col">Presenter</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <?php
                foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result) {    
            ?>      
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $result['events_id']; ?></th>
                        <td><?php echo $result['events_name']; ?></td>
                        <td><?php echo $result['events_presenter']; ?></td>
                        <td><?php echo $result['events_time']; ?></td>
                        <td><?php echo $result['events_date']; ?></td>
                        <td><?php echo "<a href=updateEvent.php?eventId=" . $result['events_id'] . ">Edit</a>" ?></td>
                        <td><?php echo "<a href=deleteEvent.php?eventId=" . $result['events_id'] . ">Delete</a>" ?></td>

                        <?php 
                            
                        ?>
                    </tr>
                </tbody>
            
            <?php
                }        
            ?>
        </table>  

    </div>

    
    <footer>

        <p>Trey Morris &copy;<?php echo date("Y");?></p>

    </footer>

    
</body>
</html>