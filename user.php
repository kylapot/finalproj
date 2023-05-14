<?php
require("connection.php");
session_start();

if(isset($_POST['submit'])){
    if(isset($_POST['message'])){
        $id = $_SESSION['id'];
        $message = $_POST['message'];
        $query = "INSERT INTO conversation (user_id, message) VALUES ('$id', '$message')";
        $result = mysqli_query($conn, $query);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
   
    <div class="conversation">
        <?php
        $guest = "SELECT c.message, c.user_id, u.name
        FROM conversation c
        INNER JOIN users u ON c.user_id = u.id";
        $fetch = $conn->query($guest);
        $ied = $_SESSION['id'];

        foreach ($fetch as $user) {
            if ($user['user_id'] == $ied) {
                echo "<p class='me'>" .$user['message'].": You". "</p>";
            } else {
                echo "<p class='others'>" . $user['name'] ." : ".$user['message']. "</p>";
            }
        }
        ?>
    </div>

    <div class="inputs">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="message">
            <button name="submit" type="submit">Message</button>
        </form>

        <a href="logout.php">logout</a>
    </div>
  

</body>
</html>
