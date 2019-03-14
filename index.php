<?php
    include "database/databaseConfig.php";
    $result;
    $dbCon = getDB();
    $user ;
    $pass;
    $bLoginChecked;
    
    
  
    
    if (isset(($_POST["password"])) and isset(($_POST["username"]))){
        
        $user = $_POST["username"];
        
        $pass = $_POST["password"];
        
        $bLoginChecked =checkLogin($dbCon, $user, $pass);
        
        if ($bLoginChecked == true){
            
            $_SESSION['user']['username'] = $_POST["username"];
            
            getMiiInfo($dbCon);
            
            header("LOCATION: userSelection.php");
            
            
            
            
        }
        
    }

?>

<!--Main homepage for MiiSN -OC-->
<!DOCTYPE html class = "mainPage">
<html>  
    <head lang = "en">
        <title>MiiSN</title>
        <!--Might update link to renamed CSS file if we decide to seperate each -OC-->
        <link rel = "stylesheet" href = "styles.css">
        <!--Add JS link here -OC-->
    </head>
<form method="post"   >
    <body id = "mainPage">
        <h2  id = "loginBanner">MiiSN</h2>
        <!--Main box containing elements to keep in line with project proposal -OC-->
        <div id = "loginBox">
            <p id = "pUsername">Username:</p>
            <input id = "username" type = "text" name = "username"><br />
            <p id = "pPassword">Password:</p>
            <input id = "password" type = "password" name = "password"><br />
            <?php 
                if(isset($bLoginChecked))
                    {
                        if ($bLoginChecked == false){
                            //class = "ErrorText" class wont work for some reason?
                            echo '<p style = "color:red; font-size: 60%;"> Either the Username or the Password you have entered are incorrect. </p>';
                        }
                    }
            ?>
            <a href="#"><button id = "loginButton" type = "submit">Login</button></a>
            <br />
            <a id = "registerLink" href = "registration.html">Make an account</a>
        </div>
    </body>
    </form>
</html>
