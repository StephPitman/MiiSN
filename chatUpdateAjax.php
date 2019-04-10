<?php
include "database/databaseConfig.php";
$dbCon = getDB();

//if($_SERVER["REQUEST_METHOD"]=="POST"){
    //updates the chat logs
    updateChat($dbCon,$_GET['list'],$_GET['id']);
    //echo $_POSTS['list'];
//}

?>