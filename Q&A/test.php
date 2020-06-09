<?php
$flag = $_POST['flag'];
$i = $_POST['index'];
$token = $_POST['token'];
$fstr = explode('}',explode('{',$flag)[1])[0];
if(strcmp($fstr,md5('challenge'.$i.$token))==0){
    echo "true";
}else{
    echo "false";
}
