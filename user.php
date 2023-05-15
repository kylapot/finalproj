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

if(isset($_POST['logout'])){
    header("Location: logout.php");
    exit();
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
   
    <div class="container">
        <div class="navbar">
            <div class="logoko">
                <img src="images/logo.png" alt="">
            
            </div>
            <div class="profile">
                <img src="images/image2.jpg" alt="">
                <a href="logout.php">
                    <img name="logout" src="images/log-out.png" alt="">
                </a>
            </div>
        </div>
        <div class="conversation" id="conversation">
        <?php
        $guest = "SELECT c.message, c.timestamp, c.user_id, u.name, u.photo
        FROM conversation c
        INNER JOIN users u ON c.user_id = u.id";
        $fetch = $conn->query($guest);
        $ied = $_SESSION['id'];

        foreach ($fetch as $user) {
            if ($user['user_id'] == $ied) { ?>
             <div class="entry me">
                <div class="text">
                    <p class="from"><?php echo $user['name'] ?></p>
                    <p class="message"><?php echo $user['message'] ?></p>
                    <p class="time"><?php echo date("F j g:i A", strtotime($user['timestamp'])); ?></p>
                </div>
                <div class="images">
                    <img src="<?php echo 'images/'.$user['photo']; ?>" alt="">
                </div>
            </div>
            <?php
        
            } else { ?>

            <div class="entry others">
                <div class="images">
                    <img src="<?php  echo 'images/'.$user['photo']; ?>" alt="">
                </div>
                <div class="text">
                    <p class="from"><?php echo $user['name'] ?></p>
                    <p class="message"><?php echo $user['message'] ?></p>
                    <p class="time"><?php echo date("F j g:i A", strtotime($user['timestamp'])); ?></p>
                </div>
            </div>
                
           <?php }
        }
        ?>
        </div>
      
        <div class="inputs">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="messageForm">
                    <input type="text" name="message" placeholder="Enter Your Message Here">
                    <button type="submit" name="submit"  style="background: none; border: none; padding: 0;">
                        <img id="submitImage" type="image" src="images/chat.png" alt="">
                    </button>
                </form>
        </div>
    </div>
   
    <script>
        const messageContainer = document.getElementById("conversation");
        function scrollMessageContainerToBottom() {
        messageContainer.scrollTop = messageContainer.scrollHeight;
        }
        scrollMessageContainerToBottom();
    </script>

</body>
</html>
