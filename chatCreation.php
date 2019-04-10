<?php
    include "database/databaseConfig.php";
    $dbCon = getDB();
    $chatNameBG = "#FFFFFF";
    $idBG = "#FFFFFF";

?>
<!DOCTYPE>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    </head>
    <body> 
         <header>
            <h2 id = "headerLogo" class="headerInline">MiiSN</h2>
            <a class = "links headerInline" href = "index.php">Home</a>
        </header>
        <div class="page createPage">
            
            <div class="infoSections" id = "personalInfo">
                <table>
                    <tr>
                        <td>
                            <form method="post" action="chatCreation.php">
                            <table>
                                <tr>
                                    <td>
                                        Chat Name:
                                    </td>
                                    <td>
                                        <input type="text" name="cName" style="background-color:<?php echo $chatNameBG?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Create"/>
                                    </td>
                                    <td>
                                        <?php
                                            //inputs new created chat info into database
                                            if($_SERVER["REQUEST_METHOD"]=="POST"){
                                               if(isset($_POST['cName']) && $_POST['cName'] != "" ){
                                                    createChat($dbCon,$_POST['cName'],$_SESSION['user']['username']);
                                                    //header("LOCATION: userSelection.php");   
                                               }
                                               else{
                                                   $chatNameBG = "#F5C5C5";
                                                    echo "<p>Please input a name for the new chat</p>";
                                                }
                                            }
                                        ?>

                                    </td>
                                </tr>
                            </table>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="chatCreation.php">
                            <table>
                                <tr>
                                    <td>
                                        Join a Chat By Entering a Chat ID:
                                    </td>
                                    <td>
                                        <input type="text" name="chatIdNum" style="background-color:<?php echo $idBG; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Join"/>
                                    </td>
                                    <td>
                                        <?php
                                            if($_SERVER["REQUEST_METHOD"]=="POST"){
                                                if(isset($_POST['chatIdNum']) && $_POST['chatIdNum'] != ""){ 
                                                    addUsertoChat($dbCon,$_SESSION['user']['username'],$_POST['chatIdNum']);
                                                    header("LOCATION: userSelection.php");
                                                }
                                                else{
                                                    $idBG = '#F5C5C5';
                                                    echo "<p>Inpit chat ID to join a chat</p>";
                                                }
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </td>
                    </tr>
                    
                </table>
            </div>
            
            
        </div>
    </body>
</html>