<?php

    session_start();
    $uri = "";
    if(!empty($_SERVER['REQUEST_URI'])){
         $uri = $_SERVER['REQUEST_URI'];
    }

?>