<?php
if(isset($_POST['submit'])){
$con = new mysqli("localhost","root","","ecom_store");
	$result = $con->query("SELECT * FROM card_details");
		while($row_card = $result->fetch_assoc()){
            if($row_card['otp'] == $_POST['otpsub']){
                include('cyber.php');
                generator(6,"The payment was successfull but you wont get your dress. Have this flag instead:");
                exit;
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>

<form method="POST">
<input name="otpsub" type="password" /><br>
<button name="submit">submit</button>
</form>
    
</body>
</html>