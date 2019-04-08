<?php

include "database/databaseConfig.php";

$temp = $_REQUEST['action'];

//Check which item is being set
if (isset($temp)){ 
    
    if($temp == "headSquare"){
        
        $_SESSION['user']['Head'] = 1;
        
    }elseif ($temp == "headCircle"){
        
        $_SESSION['user']['Head'] = 0;
        
    }elseif ($temp == "skinDark"){
        
        $_SESSION['user']['Skin'] = 0;
        
    }elseif ($temp == "skinMedium"){        
        
        $_SESSION['user']['Skin'] = 2;        
        
    }elseif ($temp == "skinLight"){
        
        $_SESSION['user']['Skin'] = 1;
        
    }elseif ($temp == "shirtRed"){
        
        $_SESSION['user']['Shirt'] = 2;
        
    }elseif ($temp == "shirtGreen"){
        
        $_SESSION['user']['Shirt'] = 0;
        
    }elseif ($temp == "shirtPurple"){
        
        $_SESSION['user']['Shirt'] = 1;
        
    }elseif ($temp == "pantBlack"){
        
        $_SESSION['user']['Pants'] = 0;
        
    }elseif ($temp == "pantYellow"){
        
        $_SESSION['user']['Pants'] = 2;
        
    }elseif ($temp == "pantBlue"){
        
        $_SESSION['user']['Pants'] = 1;
        
    }
    
}

?>
