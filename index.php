<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="heading">
            <h1>-- Register New User --</h1>
        </div>
        <form action="index.php" method="post">
            <div class="form">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <div class="username-taken" hidden>
                    <p>*username already taken*</p>
                </div>

                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <label for="cpassword">Confirm Password</label>
                <input type="text" name="cpassword" id="cpassword">
                <input type="submit" name="submit" value="Create Account" id="submit"><br>
                <div class="enterel" hidden>
                    <p>*enter all fields*</p>
                </div>
                <div class="matchpass" hidden>
                    <p>*password not matching*</p>
                </div>
            </div>
        

            <div class="extra-info">
                Already have an account? <a href="signin.php">Sign in</a>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
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






if(isset($_POST["submit"])){
    $name=filter_input(INPUT_POST,"name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email=$_POST["email"];
    $username= filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password= $_POST["password"];
    $hash= password_hash($password, PASSWORD_DEFAULT);

    session_start();
    $_SESSION["name"]=$name;

    // Check if username already exists
    $check_username_sql = "SELECT * FROM userregister WHERE username = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_sql);
    if (mysqli_num_rows($check_username_result) > 0) {
        $username_taken = true;
    } else {
        $username_taken = false;
    }

    if ($username_taken) {
        // Display error message
        echo "<script> 
            const username-taken = document.querySelector('.username-taken');
            username-taken.hidden = false;
            </script>";
    } else {
        echo "<script> 
            const username-taken = document.querySelector('.username-taken');
            username-taken.hidden = true;
            </script>";
        $sql = "INSERT INTO userregister (name,username,email,password) VALUES ('$name','$username','$email','$hash')";
        mysqli_query($conn,$sql);
        header('Location:signin.php');
    }
}

mysqli_close($conn)
?>