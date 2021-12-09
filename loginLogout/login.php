<?php
/*
    if(form is submitted){
        process form data
        do database stuff
    }
    else{
        display form
    }

    isset(_POST)
    
    //connect to database
    //create the SQL statement
    //prepare the SQL statement
    //bind parameters into the prepared statement
    //execute the prepared statement
        //How do we tell that we have a valid user?
        //      if the SELECT returns at least one recors assume a valid user
        //      if the SELECT returns 0 records then assume an invalid user
        
        //if you have valid username/password then display admin info
        //else display "Invalid username/password" and display form again
    

*/
        //tests:
    //echo "post variable" . $_POST['submit'];
    //echo "post variable" . $_POST['loginName'];
    //echo "post variable" . $_POST['loginPassword'];

    session_start();
    
    $validUser = false;     // invalid user until signed on
    $errMsg = "";

    if(isset($_POST['submit'])){
        //echo "Form has been submitted";
        //PROCESS THE LOGIN INFORMATION AGAINST THE DATABASE

        $loginName = $_POST['loginName'];
        $loginPW = $_POST['loginPassword'];
    
    
    //else  {
        //echo "Form needs to be displayed to the user";

        try {

            require "dbConnect.php";

            $sql = "SELECT event_user_name, ";
            $sql .= "event_user_password ";
            $sql .= "FROM event_user ";
            $sql .= "WHERE event_user_name=:userName ";
            $sql .= "AND event_user_password=:userPW";
            
            $stmt = $conn->prepare($sql);
        
            $stmt->bindParam(':userName', $loginName);
            $stmt->bindParam(':userPW', $loginPW);

            $stmt->execute();
            //How do we know that we have a valid user?
            
            /*
            
            $count = $stmt->fetchColumn();
            echo "Found $count rows in event_user table.";

            if($count == ""){
                echo "invalid username/password. Display error and form.";
            }
            else{
                echo "Welcome Back $count";
            }
            
            */

            //How do we know that we have a valid user? - fetchAll() technique
            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $numRows = count($resultArray);
            //echo "Number of rows found: $numRows ";

            if($numRows == 1){
                // set a session variable
                $_SESSION['validUser'] = true;
                // valid user
                $validUser = true;   
            }else{
                $errMsg = "Invalid username/password. Please try again.";
            }
        }
            
        catch(PDOException $e)  {
		
            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
        
            error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
           
            //Clean up any variables or connections that have been left hanging by this error.		
                
            //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
	    }   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>

        body  {
            background-color:lightsteelblue;
        }

        h1,h3  {
            text-align:center;
        }

        form  {
            background-color:lightgrey;
            width:500px;
            border-radius:5px;
            padding:.5%;
            margin:auto;
        }

        div  {
            padding:1%;
        }

        #vaildUsers  {
            background-color:lightgrey;
            width:500px;
            border-radius:5px;
            padding:.5%;
            margin:auto;
        }

    </style>

</head>
<body>

        <h1>Login Page</h1>

        <?php

            if($validUser){

            ?>

            <div style="background-color:lightgrey; width:500px; border-radius:5px; padding:.5%; margin:auto;">

                <h3>Welcome to the admin area for valid users</h3>

                <p>You have the following options available as an administrator</p>

                <ol>
                    <li><a href="../eventsForm.php">Input new products</a></li>
                    <li>delete products from database</li>
                    <li>Select products from database</li>
                    <li><a href="logout.php">Log off of admin system</a></li>
                </ol>

            </div>

            <?php
            }
            else  {
                echo "<h3>$errMsg</h3>";
            ?>

        <form method="post" action="login.php">

            <div class="form-group">

                <label for="loginName">Username:</label>
                <input type="text" class="form-control form-control-sm" name="loginName" id="loginName">

            </div>

            <div class="form-group">

                <label for="loginPassword">Password:</label>
                <input type="password" class="form-control form-control-sm" name="loginPassword" id="loginPassword">

            </div>

            <div>

                <input type="submit"  name="submit" value="Sign On">
                <input type="reset" value="Reset">

            </div>

        </form>
    
        <?php
            }//close else branch $errMsg
        ?>

            
</body>
</html>