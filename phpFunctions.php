<?php
  //1. Create a function that will accept a date input and format it into mm/dd/yyyy format.
  function mmddyyyy($inDate) {
    echo date("m/d/Y", strtotime($inDate) );
  }

  //2. Create a function that will accept a date input and format it into dd/mm/yyyy format to use when working with international dates.
  function ddmmyyyy($inDate) {
    echo date("d/m/y", strtotime($inDate) );
  }

  //3. Create a function that will accept a string input.  It will do the following things to the string:
    //a. Display the number of characters in the string
    //b. Trim any leading or trailing whitespace
    //c. Display the string as all lowercase characters
    //d. Will display whether or not the string contains "DMACC" either upper or lowercase
  function stringStuff($inString) {
    $stringLength = strlen($inString);

    $trim = trim($inString);

    $stringToLowerCase = strtolower($inString);

    $containsDMACC = substr_count($stringToLowerCase,"dmacc");

    if ($containsDMACC > 0) {
      $containsDMACC = "This string contains DMACC";
    }

    else {
      $containsDMACC = "This string does not contain DMACC";
    }

    echo "<p>Number of characters in string: $stringLength</p>";
    echo "<p>String with no whitespace: $trim</p>";
    echo "<p>String to lowercase: $stringToLowerCase</p>";
    echo "<p>$containsDMACC</p>";
  }

//4. Create a function that will accept a number and display it as a formatted number.   Use 1234567890 for your testing.
function formatNumber($number) {
	
	$number = preg_replace("/[^\d]/","",$number);
   	
	$length = strlen($number);
      
    if($length == 10) {
	    $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
   }
	
	return $number;
   
}
//5. Create a function that will accept a number and display it as US currency.  Use 123456 for your testing.
function formatMoney($inNum)  {
		$amount = number_format($inNum, 2, ".", ",");
		echo("$".$amount);
}
  
?>

<!DOCTYPE html>
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 Intro PHP Functions</title>

</head>
<body>
  
    <h1>WDV341 Intro PHP</h1>
    <h2>PHP Functions</h2>

    <h3><a href="https://github.com/treymorris92/wdv341">GitHub</a></h3>
    
    <p>1. Create a function that will accept a date input and format it into mm/dd/yyyy format.</p>
    
    <h3><?php mmddyyyy("today");  ?></h3>

    <p>2. Create a function that will accept a date input and format it into dd/mm/yyyy format to use when working with international dates.</p>
    
    <h3><?php ddmmyyyy("today"); ?></h3>

    <p>3. Create a function that will accept a string input.  It will do the following things to the string:
    <ul>
        <li>a. Display the number of characters in the string</li>
        <li>b. Trim any leading or trailing whitespace</li>
        <li>c. Display the string as all lowercase characters</li>
        <li>d. Will display whether or not the string contains "DMACC" either upper or lowercase</li>
    </ul>
    </p>
        
    <h3><?php stringStuff("I'm enrolled in WDV classes at dmacc"); ?></h3>

    <p>4. Create a function that will accept a number and display it as a formatted number.   Use 1234567890 for your testing.</p>
        
    <h3><?php echo formatNumber(1234567890); ?></h3>

    <p>5. Create a function that will accept a number and display it as US currency.  Use 123456 for your testing.</p>
        
    <h3><?php formatMoney(123456); ?></h3>

    

</body>
</html>