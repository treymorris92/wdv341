<?php
    
    $dateInserted = currentDateUSFormat();
    $dateUpdated = currentDateUSFormat();

    function currentDateUSFormat()  {
        $date = date_default_timezone_set("America/Chicago");   
        $date = date("m/d/Y");                                  
        return $date;                                           
        
    }
    
    function currentDateSqlFormat()
    {
        $date = date_default_timezone_set("America/Chicago");   
        $date = date("Y-m-d");                                    
        return $date;                                           
    }

    if(isset($_POST['submit']))  {

        //Honeypot validation
        $speaker = $_POST['events_speaker'];
        if(!empty($speaker))  {
            header("refresh:0");            
        }
        else  {
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
                $sql .= "events_updated_date ";
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
            
            catch(PDOException $e)  {
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
        <title>Self Posting Form Insert Event</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <style>

            body  {
                background-color:dodgerblue;
            }

            form {
                width:960px;
                margin:auto;
            }

            #form {
                width:1080px;
                margin:auto;
                padding:2.5%;
            }

            div:nth-child(4){
                display: none;
            }

            footer  {
                font-weight: bold;
            }
            
        </style>

    </head>

    <body>
        
        <h1 class="text-center">Self Posting Form Insert Event</h1>
        <h2 class="text-center">WDV341 Intro to PHP</h2>
        
        <div id="form" style="background-color:cornsilk;">
            
            <?php   
                if(isset($_POST['submit']))  {

                    echo
                        "<p>
                            <h3>Your event has been saved!</h3>
                            Event: $eventName<br>
                            Description: $eventDescription<br>
                            Presenter: $eventPresenter<br>
                            Time: $eventTime<br>
                            Date: $dateInserted<br>
                        </p>";
            
                }
                else  {  
            ?>
            
            <form name="eventsForm" id="eventsForm" method="post" action="selfPostForm.php">

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

                <!--honeypot field-->
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
                    
                <div class="text-center">
                    <input type="submit" name="submit" id="submit" value="Add Event">
                    <input type="reset" name="Reset" id="button" value="Clear Form">
                </div>
           
            </form>
        
        </div>
       

    </body>

</html>
<?php
    }
?>
