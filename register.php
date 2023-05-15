<?php
require("connection.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $randomNum = rand(1,5);
        $image = "image".$randomNum.".jpg";
        $query = "INSERT into users (name,photo) values('$name','$image')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "okay na po";
            // session_start();
            // $_SESSION['name'] = $name; 
            header("Location: login.php");
            exit();
        }else{
            echo "something wrong ";
        }
        
    } 
}
if(isset($_POST['cancel'])){
    echo "<script>window.location.href='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<div class="container">
        <div class="logo">
            <h2>ChatMoco</h2>
            <img src="images/logo.png" alt="">
        </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="name" placeholder="Create username" id="myInput"> <br>
            <p id="messageChar" style="display:none; color:red; margin:auto; text-align:center;">Not Max of 10 Character</p>

             <div class="btn">
                <button id="blackbg" name="submit" type="submit">Register</button>
                <button id="graybg" name="cancel">Cancel</button>
             </div>
        </form>
            
    </div>

    <script>
        const btnBlack = document.getElementById("graybg")
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
