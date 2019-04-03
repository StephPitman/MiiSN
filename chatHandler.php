<?php
/*
THIS SECTION USED THE TECHNIQUES GIVEN FROM THIS LINK/WEBSITE
https://phppot.com/php/simple-php-chat-using-websocket/
*/
    class ChatHandler{
        private $name;
        function sendMessage($message){
            global $clientSockets;
            $messageLen = strlen($message);
            foreach($clientSockets as $c){
                @socket_write($c,$message,$messageLen);
            }
            return true;
        }
        function openMessage($socketData){
            $len = ord($socketData[1]) & 127;
            if($len == 126){
                $mask = substr($socketData,4,4);
                $data = substr($socketData,8);
            }
            elseif($len == 127){
                $mask = substr($socketData,10,4);
                $data = substr($socketData,14);
            }
            else{
                $mask = substr($socketData,2,4);
                $data = substr($socketData,6);
            }
            $sData="";
            for($x=0;$x <strlen($data);++$x){
                $sData .= $data[$x] ^ $mask[$x%4];
            }
            return $sData;
        }
        function encloseMessage($socketData){
            $b1 = 0x80 | (0x1 & 0x0f);
            $len = strlen($socketData);
            if($len <= 125){
                $header = pack('CC',$b1,$len);
            }
            elseif($len >125 && $ $len < 65536){
                $header = pack('CCn',$b1,126,$len);
            }
            elseif($len >= 65536){
                $header = pack('CCNN',$b1,127,$len);
            }
            return $header.$socketData;
        }
        function handshake($received_header,$client_socket_resource, $host_name, $port){
            $header = array();
            $lines = preg_split("/\r\n/",$received_header);
            foreach($lines as $l){
                $l = chop($l);
                if(preg_match('/\A(\S+): (.*)\z/',$l, $matches)){
                    $headers[$matches[1]] = $matches[2];
                }
            }
            $secureKey = $headers['Sec-WebSocket-Key'];
            $secureAccept = base64_encode(pack('H*', sha1($secureKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
            $buf = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
            "Upgrade: websocket\r\n" .
            "Connection: Upgrade\r\n" .
            "WebSocket-Origin: $host_name\r\n" .
            "WebSocket-Location: ws://$host_name:$port/demo/shout.php\r\n".
            "Sec-WebSocket-Accept:$secureAccept\r\n\r\n";
            socket_write($client_socket_resource,$buf,strlen($buf));
        }
        function newConnectionACK($client_ip) {
            $mess = 'YEP: '.$client_ip.' joined';
            echo "HERE: ".$_SESSION['user']['username'];
            $messArray = array('message'=>$mess,'mess_type'=>'chat-connection-ack');
            $ack = $this->encloseMessage(json_encode($messArray));
            return $ack;
        }

        function connectionDisconnectACK($client_ip) {
            $mess = $_SESSION['user']['username'].' disconnected';
            $messArray = array('message'=>$mess,'mess_type'=>'chat-connection-ack');
            $ack = $this->encloseMessage(json_encode($messArray));
            return $ack;
        }

        function createChatBoxMessage($chat_user,$chat_box_message) {
            //FIX MESSAGE FORMAT
            if($chat_user == ""){
                $mess = "<div>".$chat_box_message . "</div>";
            }
            else{
                $mess = "<div>".$chat_user . ":" . $chat_box_message . "</div>";
            }
            
            $messArray = array('message'=>$mess,'message_type'=>'chat-box-html');
            $chatMessage = $this->encloseMessage(json_encode($messArray));
            return $chatMessage;
        }
    }
?>
