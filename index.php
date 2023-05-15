<?php
require("connection.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        
        $query = "SELECT * FROM users WHERE name = '$name'";
        $result = mysqli_fetch_array(mysqli_query($conn, $query));
        if($name == $result['name']) {
            session_start();
            $_SESSION['id'] = $result['id'];
            header("Location: user.php");
            exit();
        }else{
            echo "wrong credentials '$name' ";
        }
        
    } 
}

if(isset($_POST['register'])){
    echo "<script>window.location.href='register.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
        <div class="logo">
            <h2>ChatMoco</h2>
            <img src="images/logo.png" alt="">
        </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="name" placeholder="Input username" id="myInput"> <br>
            <p id="messageChar" style="display:none; color:red; margin:auto; text-align:center;">Not Max of 10 Character</p>
             <div class="btn">
                <button id="blackbg" name="submit" type="submit">Login</button>
                <button id="graybg" name="register">Register</button>
             </div>
        </form>
            
    </div>

    <script>
        const btnBlack = document.getElementById("blackbg")
        btnBlack.style.backgroundColor = "black";
        btnBlack.style.color = "white";

        const btn = document.querySelector('.btn');
        const input = document.getElementById('myInput');
        const messageChar = document.getElementById('messageChar');
        input.addEventListener('input', function() {
            const charCount = input.value.length;
            if (charCount > 10) {
                input.style.border = '2px solid red';
                btn.style.display = 'none';
                messageChar.style.display = 'block';
                input.style.marginBottom = '2em';
            } else {
                input.style.border = '2px solid #ccc';
                btn.style.display = 'flex';
                input.style.marginBottom = '0';
                messageChar.style.display = 'none';
            }
        });
    </script>
</body>
</html>
