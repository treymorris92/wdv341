<?php
    //access the GET parameter from the name/value pair eventId=?
    echo $_GET['eventId'];

    $deleteId = $_GET['eventId'];

try  {

    require 'dbConnect.php';

    $sql = "DELETE FROM wdv341_events WHERE events_id=:eventId";
    $stmt = $conn->prepare($sql);               //prepare statement
    $stmt->bindParam(':eventId',$deleteId);
    $stmt->execute();

    echo "<h1>Number of rows deleted: " . $stmt->rowCount() . "</h1>";     //how many rows affected by delete

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
    <title>PHP-Delete Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Delete Event Page</h1>
    <h3><a href="selectEvent.php">Return to Events page</a></h3>
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
</body>
</html>