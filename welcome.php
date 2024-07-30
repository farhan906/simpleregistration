<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
<div class="form-container">
        <div class="heading">
            <h1>WELCOME <?php  session_start();echo $_SESSION["name"];?></h1>
        </div>
        <form action="welcome.php" method="post">
        <div class="form">
            <input type="submit" name="submit" value="Log out" id="submit"><br>    
        </div>
        
        </form>
</div>    
</body>
</html>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_destroy();
    header('Location:signin.php');
}

?>