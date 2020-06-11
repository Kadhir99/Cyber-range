<?php
session_start();
if(isset($_POST['submit'])){
$feedback = $_POST['feedback'];
 $con = new mysqli("localhost","id14017610_root","1v~fAr{Lf3#p$!l^","id14017610_ecom_store");
$stmt = $con->prepare("INSERT INTO user_feedback VALUES('".$_SESSION['token']."','$feedback')");
$result = $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Thank you</title>
</head>
<style>
    body,
html {
  background: #16a085;
}

#wrapper {
  width: 600px;
  margin: 0 auto;
  margin-top: 15%;
}

h1 {
  color: #eee;
  text-shadow: -1px -2px 3px rgba(17, 17, 17, 0.3);
  text-align: center;
  font-family: "Monsterrat", sans-serif;
  font-weight: 900;
  text-transform: uppercase;
  font-size: 80px;
  margin-bottom: -5px;
}

h1 underline {
  border-top: 5px solid rgba(26, 188, 156, 0.3);
  border-bottom: 5px solid rgba(26, 188, 156, 0.3);
}

h3 {
  width: 570px;
  margin-left: 16px;
  font-family: "Lato", sans-serif;
  font-weight: 600;
  color: #eee;
}


</style>
<body>
    <div id="wrapper" class="animated zoomIn">
  <!-- We make a wrap around all of the content so that we can simply animate all of the content at the same time. I wanted a zoomIn effect and instead of placing the same class on all tags, I wrapped them into one div! -->
<h1>
  <!-- The <h1> tag is the reason why the text is big! -->
  <underline>Thank you!</underline>
  <!-- The underline makes a border on the top and on the bottom of the text -->
</h1>
<center><h3>
  For being such an awesome person. You can go to <a href="">dadsa</a> and submit any pending flags anytime today.
  <!-- The <h3> take is the description text which appear under the <h1> tag. It's there so you can display some nice message to your visitors! -->
</h3></center>
</div>
<script>
    $( document ).ready(function() {
  // perform some jQuery when page is loaded
  
$("h1").hover(function() { 
  // when user is hovering the h1
  $( this ).addClass("animated infinite pulse"); 
  // we add pulse animation and to infinite
}, function() {
  // when user no longer hover on the h1
  $( this ).removeClass("animated infinite pulse");
  // we remove the pulse
});
});

</script>
</body>
</html>
<?php
}else{
$flag = $_POST['flag'];
$i = $_POST['index'];
$token = $_POST['token'];
$fstr = explode('}',explode('{',$flag)[1])[0];
if(strcmp($fstr,md5('challenge'.$i.$token))==0){
    $con = new mysqli("localhost","id14017610_root","1v~fAr{Lf3#p$!l^","id14017610_ecom_store");
    $stmt = $con->prepare("UPDATE cyber_result set q$i=1 WHERE token=$token");
    $result = $stmt->execute();
    echo "true";
}else{
    echo "false";
}
}
