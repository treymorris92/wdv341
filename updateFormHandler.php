<?php

    if(isset($_POST['submit']))  {

        
        $message = $_POST['message'];
        if (!empty($message))  {          
            header("Refresh:0");
        }
        else  {      
            $fName = $_POST['first_name'];
            $lName = $_POST['last_name'];
            $subType = $_POST['sub_type'];
            $offers = $_POST['spec_offers'];
                if(isset($offers)){     
                    $offers = "Yes";
                }
                else  {
                    $offers =  "No";
                }
            $reference = $_POST['reference'];
            $email = $_POST['email'];   
        }
    }
?>
<!DOCTYPE html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>WDV 341 Intro PHP - Update Form Handler</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
        <style>
            *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}

            .formField  {
                display: none;
            }

            .text-center  {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>WDV341 Intro <span>PHP</span></h1>
            <p>Form Handler</p>
        </header>

        <section>
            <?php
                
                if(isset($_POST['submit']))  {
                    echo "  <p> Thank you $fName $lName.</p>
                            <p> Subscription Type: $subType.<br>
                                Recieve Special Offers: $offers.<br>
                                How you found us: $reference.<br>
                                A signup confirmation has been sent to $email.<br>
                                Thank you for your support.
                            </p>";
                }else{
                
            ?>
            <h2>Newsletter Signup</h2>
            <p>Please enter your full name and email to recieve our super sweet newsletter!</p>

            <form id="newsletter-form" name="newsletter_form" method="post" action="form-handler-homework.php">
                
                
                <p>First Name: <input type="text" name="first_name" id="first_name" /></p>
                <p>Last Name: <input type="text" name="last_name" id="last_name" /></p>
                <p>Email: <input type="text" name="email" id="email" /></p>
                <p>
                    Please select a subscription type: </br>
                    <input type="radio" id="normal" name="sub_type" value="Normal">
                    <label for="Normal">Normal</label>
                    <input type="radio" id="expert" name="sub_type" value="Expert">
                    <label for="Expert">Expert</label>
                </p>
                <p>
                    Recieve special offers and latest updates? </br>
                    <input type="checkbox" id="spec_offers" name="spec_offers" value="yes">
                    <label for="spec_offers">Yes</label>
                </p>
                <p>
                <label for="reference">How did you find us?</label></br>
                    <select name="reference" id="reference">
                        <option value="">Choose One</option>
                        <option value="Word of mouth">Word of mouth</option>
                        <option value="Internet">Internet</option>
                        <option value="Podcast">Podcast</option>
                    </select>
                </p>
                
                <p class="formField">
                    <label for="message">Message</label>
                    <input type="text" name="message" id="message">
                    <span class="message"></span>
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="Submit" />
                    <input type="reset" name="button2" id="button2" value="Clear Form" />
                </p>
            </form>
        </section>
        <footer>

            <p class="text-center">
                <a href="https://github.com/treymorris92/wdv341">My GitHub Repo</a>    
            </p>

        </footer>
    </body>
</html>
<?php
}
?>