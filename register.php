<?php
require("connection.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        
        $query = "INSERT into users (name) values('$name')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "okay na po";
            header("Location: login.php");
            exit();
        }else{
            echo "something wrong ";
        }
        
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
</head>
<body>
    
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <input type="text" name="name" placeholder="Input username">
   <button name="submit" type="submit">Submit</button>
  </form>
</body>
</html>
