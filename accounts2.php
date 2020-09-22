<?php

session_start();

    if($_SESSION["logged"] === "yes")
    {
        $url = 'kameliqData.json';
        $data = file_get_contents($url);
        $decodedData = json_decode($data, true);
    }
    else
    {
        header("location: index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All accounts</title>
    <link rel="stylesheet" type="text/css" href="accounts.css">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

    <table>
    <caption>Your accounts</caption>
    <thead>
        <tr>
        <th scope="col">Topic</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($decodedData as $decodedDatas) : ?>

        <tr>
            <td data-label="Topic" role="cell"> <?php echo $decodedDatas['topic']; ?> </td>
            <td data-label="Username" role="cell"> <?php echo $decodedDatas['username']; ?> </td>
            <td data-label="Email" role="cell"> <?php echo $decodedDatas['email']; ?> </td>
            <td data-label="Password" role="cell"> <?php echo $decodedDatas['password']; ?> </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
    </table>

    <div class="button2">
        <a href="form.php">GO BACK</a>
    </div>

        
</body>
</html>