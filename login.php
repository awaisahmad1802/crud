<?php
session_start();
?>


<html>
    <head>
        <link rel="stylesheet" href="login_style.css">
        <title>Login</title>
        <img src="nature.jpg">
    </head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action=""  method="POST" autocomplete = "off">
        <div class="form">
            <input type="text" name="email" class="textfield" placeholder="Email">
            <input type="password" name="password" class="textfield" placeholder="Password">

            <div class="forgetpass">
                <a href="#" class="link" onclick="message()">Forget Password</a><br>
                <input type="submit" value="Login" class="btn" name="login">
                <a href="form.php" class="signup-btn">Create new account</a>
            </div>

        </div>
    </div>
</form>

<script>
    function message()
    {
        alert('Toh password yad kro');
    }
</script>

</body>
</html>

<?php
include("connect.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * from form WHERE Email = '$email' && Password = '$password'  ";
    $data = mysqli_query($conn,$query); 
    $total = mysqli_num_rows($data);
    if($total == 1 )
    {
        $_SESSION['user_name'] = $email;
        header('location:display.php');

    }
    else{
        echo "Login failed";
    }
}



?>