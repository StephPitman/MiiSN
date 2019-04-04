<?php
    
    include "database/databaseConfig.php";
    
    
    //On click of logout the user's session will be destroyed and the database connection will be closed
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            userLogout($db);
            
            //Move the user to the home page
            header("LOCATION: index.php");
                   
    }

?>


<!DOCTYPE>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
    </head>
    <body>
        <div id="settingPage">
            <h1>Settings</h1>
            <div id="userSettings">
                <div class="settingWork" id="settingOptionPanel">
                    
                    <form method = "post">
                        
                       <!-- <input href = "#" type = "button"  id = "loginButton" value = "Logout"> -->
                    
                        
                        
                        <button id = "loginButton" type = "submit">Logout</button>
                    
                    </form>
                <!--    <a href="index.php" class="settingTopicOptions">Logout</a> -->
                </div>
                <div class="settingWork" id="selectedSettingOption">
                
                </div>
            </div>
            <a href="userSelection.php"><button id="settingsDone">Done</button></a>
        </div>
        
        
    </body>
</html>
