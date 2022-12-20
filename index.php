<?php
require('config/db.php');
$auth = false;
$alert1 = false;
$query = "select * from curr_users;";
require("config/dbget.php");
if($posts == true)
{
    $auth = true;
}
if (isset($_POST['username']) && isset($_POST['password'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select password from users where username = '$username'";

    $result = mysqli_query($con, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    if ($posts != null) {
        $alert1 = true;
        if ($posts[0]['password'] == $password) {
            $auth = true;
            $alert1 = false;
            $query = "INSERT INTO `curr_users` (`username`, `date`) VALUES ('$username', current_timestamp());";
            $con -> query($query);
        } else {
            $auth = false;
            $alert1 = true;
        }
    } else {
        $alert1 = true;
    }

    
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes | Sign-in</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        var input = document.getElementById("password");

        // Execute a function when the user presses a key on the keyboard
        input.addEventListener("keypress", function(event) {
            // If the user presses the "Enter" key on the keyboard
            if (event.key === "Enter") {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("button").click();
            }
        });

        function display() {
            // if (form.username.value == "root") {
            //     if (form.password.value == "root") {
            location = "views/main.php"
            //     } else {
            //         alert("Invalid Password")
            //     }
            // } else {
            //     alert("Invalid Username")
            // }
        }

        function goToSignUp() {
            location = "signUp.php"
        }
    </script>
    <?php if ($alert1) { ?>
        <script>
            alert("Put correct username or password")
        </script>
    <?php }
    if ($auth) { ?>
        <script>
            display();
        </script>
    <?php } ?>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="index.php" method="post">
                    <h1>Login Page</h1>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="User name" name="username" />
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" type="password" name="password" class="login__input" placeholder="Password" />
                    </div>
                    <a onClick="goToSignUp()" class="authent-switch">Create a New Account</a>
                    <br>
                    <input class="button__icon fas fa-chevron-right" id="button" type="submit" value="Login" />
                </form>

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>