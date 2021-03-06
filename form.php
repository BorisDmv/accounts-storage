<?php
    session_start();
    // echo '<pre>' .print_r($_POST, true). '<pre>';    
    $url = 'BorisData.json'; //Path of the json file
    $message = "";
        $arr_data = array();
    // echo '<pre>' .print_r($_POST, true). '<pre>';    
    if($_SESSION["logged"] === "yes")
    {
        

    if($_POST)
    {
        
        $formdata = array(
            'topic'=> $_POST['topic'],
            'username'=> $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        );

        $jsondata = file_get_contents($url);

        // converts json data into array
        $arr_data = json_decode($jsondata, true);

        // Push user data to array
        //array_push($arr_data,$formdata);
        $arr_data[] = $formdata;

        //Convert updated array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        
        //write json data into data.json file
        if(file_put_contents($url, $jsondata)) 
        {
            $message = 'Data successfully saved';
        }
        else{
            $message = "Error";
        }

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create account</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="balloon.css">
</head>
<body>
    <div class="container">
        <div class="card">

        <form id="formPanel" method="POST">

            <!-- TOPIC INPUT -->
            <div class="row topic">
            <div class="info">
                <label>Topic</label>
                <input id="inputs" type="text" name="topic" placeholder="Topic" />
            </div>
            </div>

            <!-- USERNAME INPUT -->
            <div class="row username">
            <div class="info">
                <span data-balloon-length="medium" data-balloon="Username must be between 2-20 characters!" data-balloon-pos="up">i</span>
                <label>Username</label>
                <input id="inputs" type="text" name="username" placeholder="Username"/>
            </div>
            </div>

            <!-- EMAIL INPUT -->
            <div class="row email">
            <div class="info">
                <label>Email</label>
                <input id="inputs" type="text" name="email" placeholder="Email"/>
            </div>
            </div>


            <!-- PASSWORD INPUT -->
            <div class="row password">
            <div class="info">
                <img id="viewhideImg" src="view.png"/>
                <label>Password</label>
                <input id="inputPass" type="password" name="password" autocomplete="off" placeholder="Password"/>
            </div>
            </div>

            </div>


            <div class="button">
            <input id="btn" type="submit" value="SUBMIT">
            </div>

            <div class="button">
            <a href="accounts.php">ACCOUNTS</a>
            </div>

            <div class="button">
            <a href="logout.php">LOGOUT</a>
            </div>

        </form>

        <p class="message"><?php echo $message ?></p>
    </div>

    <script src="main.js"></script>
</body>
</html>