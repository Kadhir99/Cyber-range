<?php

function generator($index,$message){
// $flags = array("challenge1");
// $temp = str_split($flags[$index],1);
$token = $_SESSION['token'];
echo "
<center style=\"color:#282;font-weight:700;font-family:'Poppins'\">"
.$message."<br>flag$index{".md5("challenge".$index.$token).'}</center>';
}