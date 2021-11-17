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
    
</head>

<body>
    
    <h1>All events from the Events Table</h1>

    <h3><a href="https://github.com/treymorris92/wdv341">GitHub</a></h3>

    <?php
        
        echo "<table style='border:1px solid black';>";
        echo "<tr style='border:1px solid black';><th style='border:1px solid black';>Name</th><th style='border:1px solid black';>Description</th><th style='border:1px solid black';>Presenter</th><th style='border:1px solid black';>Date</th><th style='border:1px solid black';>Time</th></tr>";

        try {
            
            foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row)  {
                
                echo "<tr style='border:1px solid black';>";
                echo '<td style="border:1px solid black";>',$row['events_name'],'</td>';
                echo '<td style="border:1px solid black";>',$row['events_description'],'</td>';
                echo '<td style="border:1px solid black";>',$row['events_presenter'],'</td>';
                echo '<td style="border:1px solid black";>',$row['events_date'],'</td>';
                echo '<td style="border:1px solid black";>',$row['events_time'],'</td>';
                echo '</tr>';
          } 
    }
        
        catch(PDOExceptions $e){
            
            echo 'Errors: ' . $e->getMessage();
    }

    echo '</table>'; 
    
    ?>

    

</body>
</html>