<?php
/*
THIS SECTION USED THE TECHNIQUES GIVEN FROM THIS LINK/WEBSITE
https://phppot.com/php/simple-php-chat-using-websocket/
*/
define('HOST_NAME',"localhost"); 
define('PORT',"8090");
$null = NULL;

require_once("chatHandler.php");
$ch = new ChatHandler();

$socketRes = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socketRes,SOL_SOCKET,SO_REUSEADDR,1);
socket_bind($socketRes,0,PORT);
socket_listen($socketRes);

$clientSockets = array($socketRes);
while(true){
    $newSocketArr = $clientSockets;
    socket_select($newSocketArr,$null,$null,0,10);
    if(in_array($socketRes,$newSocketArr)){
        $newSocket = socket_accept($socketRes);
        $clientSockets[] = $newSocket;
        
        $header = socket_read($newSocket,1024);
        $ch->handshake($header,$newSocket, HOST_NAME, PORT);
        
        /*socket_getpeername($newSocket,$client_ip);
        $connACK = $ch->newConnectionACK(getUsername());
        
        $ch->sendMessage($connACK);*/
        
        $newSocketIndex = array_search($socketRes, $newSocketArr);
        unset($newSocketArr[$newSocketIndex]);
    }
       
    foreach($newSocketArr as $resource){
        while(socket_recv($resource,$socketData,1024,0) >= 1){
            $socketMess = $ch->openMessage($socketData);
            $messObj = json_decode($socketMess);

            $chat_display = $ch->createChatBoxMessage($messObj->chat_user, $messObj->chat_message);
            $ch->sendMessage($chat_display);
            break 2;
        }

        $socketData = @socket_read($resource, 1024,PHP_NORMAL_READ);
        if($socketData === false){
            /*socket_getpeername($resource,$client_ip);
            $connACK = $ch->connectionDisconnectACK($client_ip);
            $ch->sendMessage($connACK);*/
            $newSocketIndex = array_search($resource,$clientSockets);
            unset($clientSockets[$newSocketIndex]);
        }
    }

}
socket_close($socketRes);
    

?>