<?php
$insert = false;
$alert1 = false;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])) {
    require('config/db.php');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = "select * from users where username = '$username'";

    require("config/dbget.php");
    if ($posts == null) {
        $sql = "INSERT INTO `users` (`USERNAME`, `NAME`, `PASSWORD`, `date`) VALUES ('$username', '$name', '$password', current_timestamp());";
        $sql1 = "CREATE TABLE $username(`sl_no` INT(8) NOT NULL AUTO_INCREMENT , `heading` VARCHAR(100) NOT NULL , `content` TEXT NOT NULL , `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sl_no`));";

        if ($con->query($sql1) == true) {
            $insert = true;
            $con->query($sql);
            $alert1 = false;
            echo "successfully inserted";
        } else {
            $insert = false;
            $alert1 = true;
            // echo "Error: $sql <br> $con->error";
        }
    } else {
        $alert1 = true;
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes | Sign-up</title>
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
            location = "index.php"
            //     } else {
            //         alert("Invalid Password")
            //     }
            // } else {
            //     alert("Invalid Username")
            // }
        }

        function goToSignIn() {
            location = "index.php"
        }
    </script>
    <?php if ($alert1) { ?>
        <script>
            alert("Username already exist or wrong username.");
        </script>
    <?php } ?>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="signup.php" method="post">
                    <h1>SignUp Page</h1>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Create a User name" name="username" />
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Your Name" name="name" />
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" type="password" name="password" class="login__input" placeholder="Create a Password" />
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="confirm_password" type="password" name="confirm_password" class="login__input" placeholder="Confirm Password" />
                    </div>
                    <br>
                    <a onClick="goToSignIn()" class="authent-switch">Already have an Account!,
                        <br> SignIn
                    </a>
                    <?php if ($insert) {   ?>
                        <script>
                            alert("Thanks for create your account in our website");
                        </script>
                    <?php }  ?>
                    <br>
                    <br>
                    <input class="button__icon fas fa-chevron-right" id="button" type="submit" value="Submit" />
                    <?php if ($insert) {  ?>
                        <script>
                            display();
                        </script>
                    <?php } ?>
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