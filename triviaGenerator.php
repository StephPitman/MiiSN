<?php
    function getTrivia($site){
        $url=file_get_contents($site);
        $j =  json_decode($url,true);
        $question = $j['results'][0]['question']; 
        $answer = $j['results'][0]['correct_answer']; 
        $mess = $question." ".$answer;
        return $mess;
    }
?>