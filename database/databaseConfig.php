<?php
session_start();
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'MiiSiNdb');
define('SALT', '-45dfeHK/__yu349@-/klF21-1_\/4JkUP/4');

$result;
$sSQL;
$obj;

function getDB()
{
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    $connected = true;
    // Check connection
    if (mysqli_connect_error($connection)){//->connect_error) {
        $connected = false;
        
        die("Connection failed: " . mysqli_connect_error($connection));
    }
    else{
        $connection->query("SET NAMES 'utf8'");
    }
    
    return $connection;
}


function addUsertoChat($db, $User, $ChatID){
    //This function will add a user to a chat by adding their username and the chatID to tbMemberChatIDs
    
    $User = ($User);
    
    $ChatID = ($ChatID);
    
    //Make sure the database, user name and Chat Id are all set
    if (isset($db) and isset($User) and isset($ChatID)){
        
        
        $sSQL = "Insert INTO tbmemberchatids (ChatID, Username) VALUES ($ChatID, '$User')";
        //Insert the chat into the database.
        runQuery($db,$sSQL);
        
    }
    
    
}


function createChat($db, $ChatName, $User, $Pass = ""){
    //This function will create a chat that will allow for
    //a user to create a chat.
    
    $ChatName = ClearInjection($ChatName);
    
    $User = ClearInjection($User);
    
    $Pass = ClearInjection($Pass);
    
    //Make sure the database is set
    if (isset($db)){
        
        //Get the next chatid
        $ChatID = getNewID($db, "Chat");
        
        //Check to see if there a new ID has been passed
        if (isset($ChatID)){
            
            //check to see if a password has been passed
            if ($Pass === ""){
                                
                $sSQL = "Insert INTO tbChats (ChatID, Admin, Name) VALUES ($ChatID, '$User', '$ChatName');";
                
            }
            else{
                
                $sSQL = "Insert INTO tbChats (ChatID, Admin, Password, Name) VALUES ($ChatID, '$User', '$Pass', '$ChatName')";
            
                
            }
            
            //Insert the chat into the database.
            runQuery($db,$sSQL);
            
            addUsertoChat($db, $User, $ChatID);
            
        }
        
    }
    
    
}


function updateChat($db, $sChat, $sChatID){
    //will update the chat log with the most recent chat.    
    
    $sChatID = ($sChatID);
    
    $sChat = ClearInjection($sChat);
    
    //Make sure the database is set
    if(isset($db)){
        
        //make sure there is a chat
        if(isset($sChat)){
            
            //Update the chat log
            $sSQL = "Update tbChats Set ChatLog = '$sChat' where ChatID = '$sChatID'";
            
            runQuery($db, $sSQL);
            
            
        }
        
        
    }
    
    
}

function getChat($db, $ChatID){
    //Returns the chat log based on the chat id
    
    $sChatID = ($sChatID);
    
    
    //Make sure the database is set
    if(isset($db)){
        
        $sSQL = "Select Chatlog from tbChats where chatID = '$ChatID'";
        
        $result = runQuery($db, $sSQL);
        
        $obj = mysqli_fetch_object($result);
        
        return ($obj->Chatlog);
        
    }
    
}

function runQuery($db, $query) {
    //Runs a query $db is the connection to the database and $query is the query to be ran
    
    //Checks the 
    if(isset($db) and isset($query)){
        
        $result =  mysqli_query($db, $query);
        
    }
    
    return $result;
	// takes a reference to the DB and a query and returns the results of running the query on the database
}

function ClearInjection($string){
    //This function will clear any injections
    //and will return the string
    
    
    if (isset($string)){
        
        $string = str_replace("drop","",$string);
        
        $string = str_replace("DROP","",$string);
        
        $string = str_replace(";","",$string);
        
        $string = str_replace("table","",$string);
        
        $string = str_replace("TABLE","",$string);
        
        $string = str_replace("'", "",$string);
        
        $string = str_replace("-","",$string);
        
        $string = str_replace("remove","",$string);
        
        $string = str_replace("REMOVE","",$string);
        
        return $string;
        
    }
    
    
}

function createAccount($db, $sEmail, $sUser, $sPass, $salt, $First, $Last){
    //This function will add a new member to the database.
    $iMiiID;
    $iEmailID;
	
    $sEmail = ClearInjection($sEmail);
    
    $sUser = ClearInjection($sUser);
    
    $sPass = ClearInjection($sPass);
    
    $First = ClearInjection($First);
    
    $Last = ClearInjection($Last);
    
    //Check to see if the database is set 
    if (isset($db)){
        
	    
        //Make sure the username, password and email are not empty
        if (!empty($sUser) and !empty($sPass) and !empty($salt) and !empty($sEmail) and !empty($First) and !empty($Last)){
		
            //Check to make sure that the user's new email and new username is not already taken
            if (checkEmail($db, $sEmail) == true and checkUser($db, $sUser) == true){
		
	    	//Get the user a new MiiID
                $iMiiID = getNewID($db, "Mii");
		
	    	//Get the user a new Email
                $iEmailID = getNewID($db, "Email");
		
	    	//Insert the user's new Mii
                $sSQL = "Insert into tbMii (MiiID, HeadID, ShirtID, PantsID, SkinID) values ('$iMiiID', '0', '0', '0', '0');";

                runQuery($db, $sSQL);
		
	    	//Insert the user's email information
                $sSQL = "Insert into tbEmailInfo (EmailId, Email) values ('$iEmailID', '$sEmail')";

                runQuery($db, $sSQL);
		
	    	//Insert the user's information to make a new account
                $sSQL = "Insert into tbUserInfo (MiiID, EmailID, Password, Salt, Username, Firstname, Lastname) values ('$iMiiID','$iEmailID','$sPass', '$salt' ,'$sUser', '$First','$Last')";

                runQuery($db, $sSQL);

       		}
	   }
        
    }
    
    
    
}

function checkLogin($db, $User, $Pass){
    //This function will return true if the user was found and will return 
    //false if the user was not found
    //$User is the username being passed
    //$Pass is the password being passed
    //$db is the database connection
    
    $sChatID = ($User);
    
    
    $bChecked = false;
    
    //Check to see if there is a database connection
    if (isset($db)){
        
        //make sure the username and password is not empty
        if(!empty($User) and !empty($Pass)){
            
            $sSQL = "Select * from tbUserInfo where Username = '$User'";
            
            $result = runQuery($db, $sSQL);
            
            $obj = mysqli_fetch_object($result);
            
         //   $sPassword = hash( hash($Pass,SALT) + $salt,SALT);
                
            //Check to see if the object is empty
            //If it is empty then the user was not found in the database 
            if (empty($obj)){
                
                
                $bChecked = false;
            }
            else{
                
                if (password_verify($Pass, $obj->Password)){
                    
                    $bChecked = true;    
                    
                }
                
            }
            
        }
        
    }
    
    //return whether or not the user and password was found
    return $bChecked;
}

function getNewID($db, $sID){
    //User can find a new ID for either a MiiId or email ID
    // Parameters: $db is the database connection
    //           : $sID can either be "Email" or "Mii" 
    // Returns: A new MiiID or EmailID or blank if the database was not set
    // or $sID was entered incorrectly
    
    $sNewID = "";
    
    //Check to see if the database is set 
    if (isset($db)){
        
        //Check to make sure that Id is not empty
        if(!empty($sID)){
            
            //Check to see which ID the user wants
            //Find a new EmailID
            if ($sID == "Email"){
                
                //Find the largest EmailID
                $sSQL = "Select * from tbEmailInfo Order by  EmailID DESC LIMIT 1";
                
                $result = runQuery($db, $sSQL); 
                
                $obj = mysqli_fetch_object($result);
                
                //Add 1 to the largest EmailID, creating a new EmailID
                $sNewID =  $obj->EmailID + 1;
                
            }
            //Find a new MiiID
            elseif ($sID == "Mii"){
                
                //Find the largest MiiID
                $sSQL = "Select * from tbMii Order by  MiiID DESC LIMIT 1";
                
                $result = runQuery($db, $sSQL); 
                
                $obj = mysqli_fetch_object($result);
                
                //Add 1 to the largest MiiID, creating a new MiiID
                $sNewID =  $obj->MiiID + 1;
                                
            }
            elseif ($sID == "Chat"){
                
                $sSQL = "Select ChatID from tbChats order by ChatID DESC LIMIT 1";
                
                $result = runQuery($db, $sSQL); 
                
                $obj = mysqli_fetch_object($result);
                
                //Add 1 to the largest ChatID, creating a new MiiID
                $sNewID =  $obj->ChatID + 1;
                
                
            }
            //On error return nothing
            else{
                
                $sNewID = "";

                
            }
            
        }
        
    }
    
    //Return the new ID or an empty string.
    return $sNewID;
    
}


function checkUser($db, $sUser){
    //Returns whether or not username exists in the database already
    //Returns true if the user does not exists
    //Returns false if the users does exists
    $bFound = true;
    
    $sChatID = ($User);
    
    if (isset($sUser)){
        
        $sSQL = "Select * from tbUserInfo where Username = '$sUser'";
        
        $result = runQuery($db, $sSQL);
             
        if (mysqli_num_rows($result) === 0){
            
            $bFound = true;
        }
        else{
            
            $bFound = false;
        }
        
    }
    
    return $bFound;
    
    
}


function checkEmail($db, $sEmail){
    //Returns whether or not sEmail exists in the database already
    //Returns true if the email does not exists
    //Returns false if the email does exists
    $bFound = true;
    
    
    $sEmail = ($sEmail);
    
    if (isset($sEmail)){
        
        $sSQL = "Select * from tbEmailInfo where Email = '$sEmail'";
        
        $result = runQuery($db, $sSQL);
             
        if (mysqli_num_rows($result) === 0){
            
            $bFound = true;
        }
        else{
            
            $bFound = false;
        }
        
    }
    
    return $bFound;
    
    
}

function updateMiiInfo($db){
//This will update all of the Mii's from $_SESSION
//into the database
    
    if (isset($db)){
        
        $sMiiID = getMiiID($db);
        
        $sSQL = "UPDATE tbMii SET HeadID = '" . $_SESSION['user']['Head'] . "', ShirtID = '" . $_SESSION['user']['Shirt'] . "', PantsID = '" . $_SESSION['user']['Pants'] . "', SkinID = '" . $_SESSION['user']['Skin'] . "' where MiiID = '$sMiiID'";
        
        runQuery($db, $sSQL);
        
    }
    
    
}

function getChatName($db, $ChatID){
    //Will return the chat name give the chat id and a database connection
    
    $ChatID = ($ChatID);
        
    //Make sure the database is set
    if (isset($db)){
        
        //Make sure there is a Chat ID
        if (isset($ChatID)){
            
            //Select all of the chatname
            $sSQL = "Select Name from tbChats where ChatID = $ChatID";
        
            //Run query
            $result = runQuery($db, $sSQL);
            
            //Return an array of all of the rows
            $obj = mysqli_fetch_all($result);
            
            return $obj[0][0];
            
            
        }
        
    }
    
    
}

function getChatIDs($db){
    //Will return an array with all the Chats a user is in
    //Paramters: $db - a database connection
    
    //Make sure the database is set
    if (isset($db)){
        
        //Make sure the member is logged in
        if (!empty($_SESSION['user']['username'])){
            
            //Select all of the chats a user is in
            $sSQL = "Select ChatID from tbMemberChatIds where Username = '" . $_SESSION['user']['username'] . "'";
        
            //Run query
            $result = runQuery($db, $sSQL);
            
            //Return an array of all of the rows
            $obj = mysqli_fetch_all($result);
            
            return $obj;
            
            / //   $obj =(getChatIDs($dbCon));
            
            //Will return array $obj[][]
           // foreach ($obj as $x){
            
             //    getChatName($dbCon, $x[0]);
                
            //}
            
        }
        
        
    }
    
}

function getMiiID($db){
    //Returns the MiiID from the username saved
    //into $_SESSION
    
    //Make sure the database is set
    if (isset($db)){
        
        if (!empty($_SESSION['user']['username'])){
            
            $sSQL = "Select MiiID from tbUserInfo where Username = '" . $_SESSION['user']['username'] . "'";
                
            $result = runQuery($db, $sSQL);
            
            $obj = mysqli_fetch_object($result);
            
            return $obj->MiiID;
            
        }
        
    }
    
}

function getMiiInfo($db){
  //will get set all of the MiiInfo into $_SESSION
    $sArray;
    $sMiiID;
    if (isset($db)){
        
        if (!empty($_SESSION['user']['username'])){

            $sMiiID = getMiiID($db);
            
            $sSQL = "Select * from tbMii where MiiID  =' $sMiiID'";
            
            $result = runQuery($db, $sSQL);
            
            $obj = mysqli_fetch_object($result);
            
            $_SESSION['user']['Head'] = $obj->HeadID;
            
            $_SESSION['user']['Shirt'] = $obj->ShirtID;
            
            $_SESSION['user']['Pants'] = $obj->PantsID;
            
            $_SESSION['user']['Skin'] = $obj->SkinID;
                        
            //$sArray = getPants($db,$obj->PantsID);
            
            getPantsSession($db,$obj->PantsID);
                
            getShirtSession($db,$obj->ShirtID);
                
            getSkinSession($db,$obj->SkinID);
                
            getHeadSession($db,$obj->HeadID);
        }
    }
    
}

function getHeadSession($db, $HeadID){
    //will set $_SESSION['user']['HeadSVG']
    $sPantsArray = false;
    
    $sSQL = "Select * from tbHead where HeadID = '" . $HeadID . "'";
    
    if (isset($db) and isset($HeadID)){
        
        $result = runQuery($db, $sSQL);

        $obj = mysqli_fetch_object($result);

        $sPantsArray= true;
        
        $_SESSION['user']['HeadSVG'] = $obj->HeadSVG;
        
    }
    
}

function getSkinSession($db, $SkinID){
    //will set $_SESSION['user']['SkinColor'] and $_SESSION['user']['SkinSVG']
    $sPantsArray = false;
    
    $sSQL = "Select * from tbSkin where SkinID = '" . $SkinID . "'";
    
    if (isset($db) and isset($SkinID)){
        
        $result = runQuery($db, $sSQL);

        $obj = mysqli_fetch_object($result);

        $sPantsArray= true;
        
        $_SESSION['user']['SkinColor'] = $obj->SkinColor;

        $_SESSION['user']['SkinSVG'] = $obj->SkinSVG;
        
    }
    
}

function getShirtSession($db, $ShirtID){
    //will set $_SESSION['user']['ShirtColor'] and $_SESSION['user']['ShirtSVG'].
    $sPantsArray = false;
    
    $sSQL = "Select * from tbShirt where ShirtID = '" . $ShirtID . "'";
    
    if (isset($db) and isset($ShirtID)){
        
        $result = runQuery($db, $sSQL);

        $obj = mysqli_fetch_object($result);

        $sPantsArray= true;
        
        $_SESSION['user']['ShirtColor'] = $obj->ShirtColor;

        $_SESSION['user']['ShirtSVG'] = $obj->ShirtSVG;
        
    }
    
}

function getPantsSession($db, $PantsID){
    //will set $_SESSION['user']['PantsColor'] and $_SESSION['user']['PantsSVG'].
    $sPantsArray = false;
    
    $sSQL = "Select * from tbPants where PantsID = '" . $PantsID . "'";
    
    if (isset($db) and isset($PantsID)){
        
        $result = runQuery($db, $sSQL);

        $obj = mysqli_fetch_object($result);

        $sPantsArray= true;
        
        $_SESSION['user']['PantsColor'] = $obj->PantsColor;

        $_SESSION['user']['PantsSVG'] = $obj->PantsSVG;
        
    }
    
}

function userLogout($db){
//when the user logs out make sure to close the database connection and end the session
    
    closeDB($db);
    
    if (isset($_SESSION['user']['username'])){
        
        session_destroy();
            
    }   
    
    
        
}

function closeDB($db){
  //will close the connection of the database.
    
    if (isset($db)){
        
        mysqli_close($db);
        
    }
}


?>
