<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>
<div class="form-container">
        <div class="heading">
            <h1>Sign-in</h1>
        </div>
        <form action="signin.php" method="post">
            <div class="form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                
                <input type="submit" name="submit" value="Log in" id="submit"><br>
                <div class="enterel" hidden>
                    <p>*enter all fields*</p>
                </div>
            </div>
        

            <div class="extra-info">
                Create an account - <a href="index.php">Register</a>
            </div>
        </form>
    </div>
    <script src="signin.js"></script>

</body>
</html>


<?php
$db_server= "localhost";
$db_user= "root";
$db_pass= "";
$db_name= "registform";
$conn= "";

try{
    $conn= mysqli_connect($db_server,$db_user,$db_pass,$db_name);

}
catch(mysqli_sql_exception){
    echo "not connected";
}




if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $check_username_pass_sql = "SELECT * FROM userregister WHERE username = '$username'";
    $result = mysqli_query($conn, $check_username_pass_sql);

    if(mysqli_num_rows($result) > 0){
        $row= mysqli_fetch_assoc($result);
        //echo $row["password"];
        if(password_verify($password,$row["password"])){
            
            header('Location:welcome.php');
        }else{
            echo "<script>
            const enterel= document.querySelector('.enterel');
            enterel.removeAttribute('hidden');
            </script>";
        }

    }else{
        echo "<script>
        const enterel= document.querySelector('.enterel');
        enterel.removeAttribute('hidden');
        </script>";
    }

}

mysqli_close($conn)
?>