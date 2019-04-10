<?php
    include "database/databaseConfig.php";
    $dbCon = getDB();
    $chatNameBG = "#FFFFFF";

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
            <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                       if(isset($_POST['cName']) && $_POST['cName'] != "" ){
                           //________________________________________________________FIX THIS WITH CHAT NAME
                           //createChat($dbCon, $_SESSION['user']['username']);
                            header("LOCATION: userSelection.php");   
                       }
                       else{
                           $chatNameBG = "#F5C5C5";
                           
                       }
                
            ?>
            <form method="post" action="chatCreation.php">
            <div class="infoSections" id = "personalInfo">
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
                            <input type="submit"/>
                        </td>
                        <td>
                            <?php
                                echo "<p>Please input a name for the new chat</p>";
                            }
                            ?>
                            
                        </td>
                    </tr>
                </table>
            </div>
            </form>
            
        </div>
    </body>
</html>