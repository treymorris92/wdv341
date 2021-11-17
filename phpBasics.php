<?php
    
    $yourName = "Trey Morris";    
    $number1 = 6;
    $number2 = 4;
    $total = $number1+$number2;

?>

<!doctype html>
<html>
   
    <head>
        
        <meta charset="utf-8">
   
    </head>
    
    <body>
        
        <h1>PHP Basics</h1>
        
        <?php 

            echo "<h2> $yourName </h2>" ;
            echo "<h3> Number 1: $number1 </h3>";
            echo "<h3> Number 2: $number2 </h3>";
            echo "<h2> Total: $total </h2>" ;
        
        ?>

        <script>
        
        <?php
        
            echo "let languages =['PHP', 'HTML', 'Javascript'];";

            echo "for(let i=0; i < languages.length; i++){
                    document.write(languages[i]+ ' ' );
                    }";
        
        ?>
    
    </script>
    
        <h3><a href="https://github.com/treymorris92/wdv341">GitHub</a></h3>

    </body>

 </html>