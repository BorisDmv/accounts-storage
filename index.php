<?php
    session_start();

    if(isset($_POST['pass_submit_btn']))
    {
        $passwordInp = $_POST['passwordInp'];

        if($passwordInp == "79386152")
        {
            $_SESSION["logged"] = "yes";
            header("location: form.php");
        }
        else if($passwordInp == "321")
        {
            $_SESSION["logged"] = "yes";
            header("location: form2.php");
        }
        else
        {
            //echo "Wrong password";
            $_SESSION["logged"] = "no";
            session_destroy();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="pass_box">
        <form method="post" action="index.php">
            <input id="pass_inp" type="password" name="passwordInp" autocomplete="off" placeholder="Password" autocapitalize="off" autocorrect="off" required="" >
            <input id="pass_submit" name="pass_submit_btn" type="submit" value="" >
        </form>
    </div>
</body>
</html>