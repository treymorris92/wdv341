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
    <title>Select Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>

        body  {
            background-color:#708090;
        }

        div  {
            width:25%;
            background-color:white;
            margin:auto;
            padding:2.5%;
            border-radius:5px;
        }

        p  {
            font-weight:bold;
        }

        h1,h2,h4  {
            color:white;
        }

    </style>
</head>

<body>
    
    <h1 class="text-center">All events from the Events Table</h1>
    <h2 class="text-center">WDV341 Intro to PHP</h2>

    <h4 class="text-center"><a href="https://github.com/treymorris92/wdv341">GitHub</a></h3>

    <h4 class="text-center">Please not do not delete Ids 1-3!</h4>

    <div>

        <?php
            
            try {
                
                foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row)  {
                    
                    echo "<h3>";
                    echo $row["events_id"];
                    echo "<br>";
                    echo $row["events_name"];
                    echo "<br>";
                    echo $row["events_date"];
                    echo "</h3>";
                    echo "<p>";
                    echo "<p><a href='updateEvent.php?eventId=". $row["events_id"] . "'>Update Link</a></p>";
                    echo "<p><a href='deleteEvent.php?eventId=". $row["events_id"] . "'>Delete Link</a></p>"; 

                    //pass the selected events id as a GET parameter on the url
                } 
            }
            
            catch(PDOExceptions $e){
                echo "Errors: " . $e->getMessage();
            }
        
        ?>

    </div>

</body>
</html>