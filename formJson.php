<?php


$myFile = "data.json";
$arr_data = array(); // create empty array

try
  {
	if($_POST)
	{
        //Get form data
        $formdata = array(
            'topic'=> $_POST['topic'],
            'username'=> $_POST['username'],
            'email'=>$_POST['email'],
            'password'=> $_POST['password']
		);
		
		if(empty($topic) || empty($username) || empty($email) || empty($password))
		{
			echo "You did not fill out the required fields.";
		}
		else
		{
			//Get data from existing json file
			$jsondata = file_get_contents($myFile);

			// converts json data into array
			$arr_data = json_decode($jsondata, true);

			// Push user data to array
			array_push($arr_data,$formdata);

			//Convert updated array to JSON
			$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
			
			//write json data into data.json file
			if(file_put_contents($myFile, $jsondata)) 
			{
				echo 'Data successfully saved';
			}
			else
			{
				 echo "error";
			}
		}        
	}
   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form json</title>
</head>
<body>
<form action="formJson.php" method="POST">
	Topic:<br>
	<input type="text" name="topic">
	<br><br/>
	Username:<br>
	<input type="text" name="username">
	<br><br>
	  
	Email:<br>
	<input type="text" name="email">
	<br><br>
	  
	Password:<br>
	<input type="text" name="password">
	<br><br>
	<input type="submit" value="Submit">
</form>
</body>
</html>