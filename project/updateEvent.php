<?php

$updateId = $_GET['eventId'];

$dateUpdated = currentDateSQLFormat();

function currentDateSqlFormat()
{
    $date = date_default_timezone_set("America/Chicago");   
    $date = date("Y-m-d");                                    
    return $date;                                           
}

if(isset($_POST['submit'])){

    // honeypot validation
    $host = $_POST['events_speaker'];
    if(!empty($host)){
        header("refresh:0");    
    }
    else{
  
        $eventName = $_POST['events_name'];
        $eventDescription = $_POST['events_description'];
        $eventPresenter = $_POST['events_presenter'];
        $eventDate = $_POST['events_date'];
        $eventTime = $_POST['events_time'];
        $eventDateInserted = $_POST['events_date_inserted'];
        $eventDateUpdated = $dateUpdated;['events_date_updated'];
        
        try {       
            require 'dbConnect.php';	
            $sql = "UPDATE wdv341_events SET ";   
            $sql .= "events_name =:eventName, ";
            $sql .= "events_description =:eventDescription, ";
            $sql .= "events_presenter =:eventPresenter, ";
            $sql .= "events_date =:eventPresenter, ";
            $sql .= "events_time =:eventTime, ";
            $sql .= "events_date_inserted =:eventDateInserted, ";
            $sql .= "events_updated_date =:eventDateUpdated ";
            $sql .= "WHERE events_id =:eventId";
                        
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':eventId', $updateId);
            $stmt->bindParam(':eventName', $eventName);
            $stmt->bindParam(':eventDescription', $eventDescription);		
            $stmt->bindParam(':eventPresenter', $eventPresenter);		
            $stmt->bindParam(':eventPresenter', $eventDate);		
            $stmt->bindParam(':eventTime', $eventTime);
            $stmt->bindParam(':eventDateInserted', $eventDateInserted);
            $stmt->bindParam(':eventDateUpdated', $eventDateUpdated);		
            
            $stmt->execute();
            
            header('Location: admin.php?eventId=' . $updateId . '&eventName=' . $eventName);     
        }
        
        catch(PDOException $e)
        {
            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
            error_log($e->getMessage());			
        }
    }
}
else{
  try{
      include "dbConnect.php";
      
      $sql = "SELECT * FROM wdv341_events WHERE events_id =:eventId";   
      $stmt = $conn->prepare($sql);           
      $stmt->bindParam(':eventId', $updateId);
      $stmt->execute();                       
  
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

  }
  catch(PDOException $e){
    $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
    error_log($e->getMessage());	
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

        div:nth-child(4){
                display: none;
        }

        h1  {
            text-align:center;
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
            
            <a href="admin.php">All Events</a>
            <a href="insert.php">Add Event</a>
            <a href="contact/contact.php">Contact</a>
            <a href="logout.php">Logout</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            
    </div>
        
    <h1 class="text-center">Update Event</h1>
            
    <h2 class="text-center">WDV341 Intro PHP</h2>
        
    <div class= "jumbotron col-md-4 mx-auto border border-dark rounded-lg m-4 p-4" style="background-color:lightblue">
            
        <form name="eventsForm" id="eventsForm" method="post" action="updateEvent.php?eventId=<?php echo $updateId; ?>">

            <div class="form-group">
                <label for="events_name">Event Name: </label>
                <input type="text" class="form-control form-control-sm" name="events_name" id="events_name" value="<?php echo $result['events_name']; ?> ">
            </div>

            <div class="form-group">
                <label for="events_description">Event Description: </label>
                <input type="text" class="form-control form-control-sm" name="events_description" id="events_description" value="<?php echo $result['events_description']; ?> ">
            </div>
                    
            <div class="form-group">
                <label for="events_presenter">Event Presenter: </label>
                <input type="text" class="form-control form-control-sm" name="events_presenter" id="events_presenter" value="<?php echo $result['events_presenter']; ?> "> 
            </div>

            <!--honeypot field-->
            <div class="form-group">
                    <label for="events_speaker">Event Speaker: </label>
                    <input type="text" class="form-control form-control-sm" name="events_speaker" id="events_speaker">
            </div>
                    
            <div class="form-group">
                <label for="events_date">Event Date: </label>
                <input type="date" class="form-control form-control-sm" name="events_date" id="events_date" value="<?php echo $result['events_date']; ?> "> 
            </div>
                    
            <div class="form-group">
                <label for="events_time">Event Time: </label>
                <input type="time" class="form-control form-control-sm" name="events_time" id="events_time" value="<?php echo $result['events_time']; ?> "> 
            </div>
                    
            <div class="form-group">
                <label for="events_date_inserted">Date Inserted: </label>
                <input type="text" class="form-control form-control-sm" name="events_date_inserted" id="events_date_inserted" value="<?php echo $result['events_date_inserted']; ?> " readonly> 
            </div>

            <div class="form-group">
                <label for="events_date_updated">Date Updated: </label>
                <input type="text" class="form-control form-control-sm" name="events_date_updated" id="events_date_updated" value="<?php echo $result['events_date_updated']; ?> " readonly> 
            </div>
                    
            <div class="text-center">
                <input type="submit" class="bg-primary text-light rounded-sm" name="submit" id="submit" value="Save">
                <input type="reset" name="Reset" id="button" value="Reset Form">
            </div>
            
        </form>

    </div>
    
    <footer>

        <p>Trey Morris &copy;<?php echo date("Y");?></p>

    </footer>

</body>

</html>
<?php
    }
?>