<?php
    require("connection.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <div class="conversation">
        <p id="other"></p>
        <p id="you"></p>
    </div>

    <div class="inputs">
        <form action="<?php $_SERVER['PHP_SELF']  ?>" method="POST">
            <input type="text" name="message">
            <button name="submit" type="submit">Message</button>
        </form>
    </div>
  
   
</body>
</html>