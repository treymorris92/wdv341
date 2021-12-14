<?php
    
    $dateInserted = currentDateUSFormat();
    $dateUpdated = currentDateUSFormat();

    function currentDateUSFormat(){
        $date = date_default_timezone_set("America/Chicago");   
        $date = date("m/d/Y");                                   
        return $date;                                           
    }
    
    function currentDateSqlFormat(){
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
            $eventDateInserted = currentDateSqlFormat();
            $eventDateUpdated = currentDateSqlFormat();
            
            try {       
                require 'dbConnect.php';	
            
                $sql = "INSERT INTO wdv341_events (";   
                $sql .= "events_name, ";
                $sql .= "events_description, ";
                $sql .= "events_presenter, ";
                $sql .= "events_date, ";
                $sql .= "events_time, ";
                $sql .= "events_date_inserted, ";
                $sql .= "events_date_updated ";
                $sql .= ") VALUES (";                   
                $sql .= ":eventName, ";
                $sql .= ":eventDescription, ";
                $sql .= ":eventPresenter, ";
                $sql .= ":eventDate, ";
                $sql .= ":eventTime, ";
                $sql .= ":eventDateInserted, ";
                $sql .= ":eventDateUpdated)";
                
                $stmt = $conn->prepare($sql);
                
                $stmt->bindParam(':eventName', $eventName);
                $stmt->bindParam(':eventDescription', $eventDescription);		
                $stmt->bindParam(':eventPresenter', $eventPresenter);		
                $stmt->bindParam(':eventDate', $eventDate);		
                $stmt->bindParam(':eventTime', $eventTime);
                $stmt->bindParam(':eventDateInserted', $eventDateInserted);
                $stmt->bindParam(':eventDateUpdated', $eventDateUpdated);		
                
                $stmt->execute();	   
            }
            
            catch(PDOException $e){
                $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
                error_log($e->getMessage());			
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Add Event Page</title>
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
            
            div:nth-child(4){
                display: none;
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
            <a href="contact/contact.php">Contact</a>
            <a href="logout.php">Logout</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        
        </div>
        
        <h1 class="text-center">Add an Event</h1>
        
        <div class= "jumbotron col-md-4 mx-auto border border-dark rounded-lg m-4 p-4" style="background-color:#2596FF;">
            <?php   
                if(isset($_POST['submit'])){

                    echo"<p><h3>Your event has been saved!</h3>
                            Event: $eventName<br>
                            Description: $eventDescription<br>
                            Presenter: $eventPresenter<br>
                            Time: $eventTime<br>
                            Date: $dateInserted<br>
                        </p>";
            
                }
                else{  
            ?>
            <form name="eventsForm" id="eventsForm" method="post" action="insert.php">

                <div class="form-group">
                    <label for="events_name">Event Name: </label>
                    <input type="text" class="form-control form-control-sm" name="events_name" id="events_name">
                </div>

                <div class="form-group">
                    <label for="events_description">Event Description: </label>
                    <input type="text" class="form-control form-control-sm" name="events_description" id="events_description">
                </div>
                    
                <div class="form-group">
                    <label for="events_presenter">Event Presenter: </label>
                    <input type="text" class="form-control form-control-sm" name="events_presenter" id="events_presenter"> 
                </div>

                <div class="form-group">
                    <label for="events_speaker">Event Speaker: </label>
                    <input type="text" class="form-control form-control-sm" name="events_speaker" id="events_speaker">
                </div>
                    
                <div class="form-group">
                    <label for="events_date">Event Date: </label>
                    <input type="date" class="form-control form-control-sm" name="events_date" id="events_date"> 
                </div>
                    
                <div class="form-group">
                    <label for="events_time">Event Time: </label>
                    <input type="time" class="form-control form-control-sm" name="events_time" id="events_time"> 
                </div>
                    
                <div class="form-group">
                    <label for="events_date_inserted">Event Date Inserted: </label>
                    <input type="text" class="form-control form-control-sm" name="events_date_inserted" id="events_date_inserted" value="<?php echo $dateInserted ?>" readonly> 
                </div>

                <div class="form-group">
                    <label for="events_updated_date">Event Date Updated: </label>
                    <input type="text" class="form-control form-control-sm" name="events_updated_date" id="events_updated_date" value="<?php echo $dateUpdated ?>" readonly> 
                </div>
                    
                <div class="text-center" style="padding:2.5%;">
                    <input type="submit" name="submit" id="submit" value="Add Event">
                    <input type="reset" name="Reset" id="button" value="Clear Form">
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