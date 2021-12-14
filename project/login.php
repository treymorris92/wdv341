<?php

    session_start();
    
    $validUser = false;     // invalid user until signed on
    $errMsg = "";

    if(isset($_POST['submit'])){
        //echo "Form has been submitted";
        //PROCESS THE LOGIN INFORMATION AGAINST THE DATABASE

        $loginName = $_POST['loginName'];
        $loginPW = $_POST['loginPassword'];
    
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
<?php

if($validUser){
    header('Location: admin.php');

?>

<?php
        }
        else  {
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV Final Project - Login</title>
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

        header  {
            text-align:center;
            padding:2.5%;
        }

        h3  {
            text-align:center;
            color:red;
        }

        form  {
            background-color:#2596FF;
            width:500px;
            border-radius:8px;
            padding:.5%;
            margin:auto;
        }

        div  {
            padding:1%;
        }

        #vaildUsers  {
            background-color:#2596FF;
            width:500px;
            border-radius:8px;
            padding:.5%;
            margin:auto;
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

        @media screen and (max-width: 600px)  {
            form {
                width:75%;
            }
        }
    </style>
</head>
<body>

    <div class="topnav" id="myTopnav">
            
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            
    </div>

    <header>

        <h1>Admin Login Portal</h1>

    </header>

    <?php
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

    <footer>

        <p>Trey Morris &copy;<?php echo date("Y");?></p>

    </footer>

</body>
</html>