<?php

session_start();

    if($_SESSION["logged"] === "yes")
    {
        $url = 'BorisData.json';
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
    <title>Add-Account</title>
    <link rel="stylesheet" type="text/css" href="accounts.css">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <div class="button">
        <a href="form.php">Add new account</a>
    </div>

    <table role="table">
    <thead role="rowgroup">
        <tr role="row">
            <th role="columnheader">Topic</th>
            <th role="columnheader">Username</th>
            <th role="columnheader">Email</th>
            <th role="columnheader">Password</th>
        </tr>

        <?php foreach($decodedData as $decodedDatas) : ?>

        <tr role="row">
            <td role="cell"> <?php echo $decodedDatas['topic']; ?> </td>
            <td role="cell"> <?php echo $decodedDatas['username']; ?> </td>
            <td role="cell"> <?php echo $decodedDatas['email']; ?> </td>
            <td role="cell"> <?php echo $decodedDatas['password']; ?> </td>
        </tr>

    <?php endforeach; ?>
    </thead>
    </table>
</body>
</html>