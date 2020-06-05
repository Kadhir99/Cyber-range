<?php
function generator($token, $index){
// $flags = array("challenge1");
// $temp = str_split($flags[$index],1);

return "flag$index{".md5("challenge".$index.$token).'}';
}