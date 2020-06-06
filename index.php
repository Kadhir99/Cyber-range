<?php
if(isset($_POST['login'])){
    $con = new mysqli("localhost","root","","ecom_store");
    $stmt = $con->prepare("SELECT * FROM cyber_range where token=? and password=? ");
    $stmt->bind_param("ss", $_POST['token'], $_POST['password']);
    $result = $stmt->execute();
    print_r($result);
    if($result==1){
        session_start();
        $_SESSION['token'] = $_POST['token'];
        header("Location:nextindex.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
<input name="token" /><br>
<input name="password"/><br>
<button name="login">login</button>
</form>
    
</body>
</html>