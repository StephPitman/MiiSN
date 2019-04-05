<?php

include "database/databaseConfig.php";

$temp = $_REQUEST['action'];

//Make sure there has been a temp passed
if (isset($temp)){
    
    //Head sqaure was selected
    if($temp == "headSquare"){
        
        //Update $_SESSION
        $_SESSION['user']['Head'] = 1;
        
        echo json_encode("Square Head");
      
    //Head circle was selected
    }elseif ($temp == "headCircle"){
        
        //Update $_SESSION
        $_SESSION['user']['Head'] = 0;
        
        echo json_encode("Circle Head");
    
    //Update the Skin to skinDark
    }elseif ($temp == "skinDark"){
        
        //Update $_SESSION
        $_SESSION['user']['Skin'] = 0;
        
        echo json_encode("Dark Skin");
        
    }elseif ($temp == "skinMedium"){        
        
        $_SESSION['user']['Skin'] = 2;
        
        echo json_encode("Medium Skin");
        
        
    }elseif ($temp == "skinLight"){
        
        $_SESSION['user']['Skin'] = 1;
        
        echo json_encode("Light Skin");
        
    }elseif ($temp == "shirtRed"){
        
        $_SESSION['user']['Shirt'] = 2;
        
        echo json_encode("Red Shirt");
        
    }elseif ($temp == "shirtGreen"){
        
        $_SESSION['user']['Shirt'] = 0;
        
        echo json_encode("Green Shirt");
        
    }elseif ($temp == "shirtPurple"){
        
        $_SESSION['user']['Shirt'] = 1;
        
        echo json_encode("Purple Shirt");
        
    }elseif ($temp == "pantBlack"){
        
        $_SESSION['user']['Pants'] = 0;
        
        echo json_encode("Black Pants");
        
    }elseif ($temp == "pantYellow"){
        
        $_SESSION['user']['Pants'] = 2;
        
        echo json_encode("Yellow Pants");
        
    }elseif ($temp == "pantBlue"){
        
        $_SESSION['user']['Pants'] = 1;
        
        echo json_encode("Blue Pants");
        
    }
  
}

?>
