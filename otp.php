

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

/*     Body Styling only start     */
body {
  text-align: center;
  background-color: lightcyan;
  font-family: 'POPPINS', Open-Sans;
  background: linear-gradient(to right, #4568dc, #b06ab3);
  overflow: hidden;
}

::selection {
  color: #8e44ad;
}

/*     Body Styling only end     */
section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100vw;
  height: 100vh;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.1);
}
section form {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: auto;
  margin: 0 auto;
}
section form input {
  width: 50px;
  height: 50px;
  padding: 0;
  margin-right: 25px;
  text-align: center;
  border: 1px solid gray;
  border-radius: 5px;
}
section form input:last-child {
  margin-right: 0;
}
section form input::-webkit-inner-spin-button, section form input::-webkit-outer-spin-button {
  -webkit-appearance: none;
  appearance: none;
  margin: 0;
}
section form input:focus, section form input.focus {
  border-color: green;
  outline: none;
  box-shadow: none;
}
</style>
<body>
<?php
session_start();
if(isset($_POST['submit'])){
$otp = $_POST['digit1'].$_POST['digit2'].$_POST['digit3'];
$quer = "SELECT * FROM otp WHERE sessionid='".$_SESSION['token']."'";
$con = new mysqli("localhost","root","","ecom_store");
    $result = $con->query($quer);
		while($row_card = $result->fetch_assoc()){
            if($row_card['otp'] == $otp){
                echo "<div style='background:#fffd;height:70vh;display:flex;align-items:center;justify-content:center;margin:10% 10%'>";
                include('cyber.php');
                generator(6,"The payment was successfull but you wont get your dress. Have this flag instead:");
                echo "</div>";
                exit;
            }else{
                echo "<h3 style='color:red;font-family:Poppins'>Incorrect otp! try again</h3>";
            }
        }
    }
?>

<!-- <form method="POST">
<input name="otpsub" type="password" /><br>
<button name="submit">submit</button>
</form> -->
<section>
	<form method="POST">
		<input id="codeBox1" name='digit1' type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
		<input id="codeBox2" name='digit2' type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
		<input id="codeBox3" name='digit3' type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
        <button id='subbtn' name="submit" hidden>submit</button>

    </form>
</section>
<script>
document.getElementById('codeBox1').focus();
function getCodeBoxElement(index) {
  return document.getElementById('codeBox' + index);
}
function onKeyUpEvent(index, event) {
  const eventCode = event.which || event.keyCode;
  if (getCodeBoxElement(index).value.length === 1) {
	 if (index !== 3) {
		getCodeBoxElement(index+ 1).focus();
	 } else {
		getCodeBoxElement(index).blur();
		// Submit code
		console.log('submit code ');
        document.getElementById('subbtn').click();

	 }
  }
  if (eventCode === 8 && index !== 1) {
	 getCodeBoxElement(index - 1).focus();
  }
}
function onFocusEvent(index) {
  for (item = 1; item < index; item++) {
	 const currentElement = getCodeBoxElement(item);
	 if (!currentElement.value) {
		  currentElement.focus();
		  break;
	 }
  }
}
</script>
</body>
</html>