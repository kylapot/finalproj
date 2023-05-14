<?php
require("connection.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        
        $query = "SELECT * FROM users WHERE name = '$name'";
        $result = mysqli_fetch_array(mysqli_query($conn, $query));
        if($name == $result['name']) {
            header("Location: user.php");
            exit();
        }else{
            echo "wrong credentials '$name' ";
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
