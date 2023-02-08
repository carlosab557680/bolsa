<?php

include_once './class/config.class.php';

if(!isset($_SESSION['config'])){
    $config = new config();
    $config->select();
    $_SESSION['config'] = serialize($config);
}else{
    $config = unserialize($_SESSION['config']);
}

