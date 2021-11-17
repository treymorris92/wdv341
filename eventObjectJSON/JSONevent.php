<?php
    
    require "event.php";         //connect event.php file

    require "dbConnect.php";     //connect to database

    $outputObjArray = [];       //create empty array

    try {
        $sql = "SELECT events_id, events_name, events_description, events_presenter, events_time, events_date FROM wdv341_events WHERE events_id = 1";   
        $stmt = $conn->prepare($sql);           
        $stmt->execute();                     
                
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {    
            
            $outputObj = new Event();
            $outputObj->setEventId($row ['events_id'] );
            $outputObj->setEventName($row ['events_name'] );
            $outputObj->setEventDescription($row ['events_description'] );
            $outputObj->setEventPresenter($row ['events_presenter'] );
            $outputObj->setEventTime($row ['events_time'] );
            $outputObj->setEventDate($row ['events_date'] );
        
            array_push($outputObjArray, $outputObj);
        }

    }//end try  

    catch(PDOException $e)  {
        echo "Errors: " . $e->getMessage();
    }//end catch  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto&display=swap" rel="stylesheet">
    <title>PHP-JSON Event Object</title>

    <style>

        body  {
            font-family: 'Roboto', sans-serif;
        }

        div  {
            margin:auto;
            text-align:center;
        }

    </style>
</head>

<body>

    <div>
    
        <h1>PHP-JSON Event Object</h1>

        <h3><a href="https://github.com/treymorris92/wdv341/tree/main/eventObjectJSON">GitHub link for this assignment</a></h3>

        <p> <?php echo(json_encode($outputObjArray)); ?> </p>

    </div>

</body>
</html>