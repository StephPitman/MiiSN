<?php
    include "database/databaseConfig.php";
    $dbCon = getDB();
    $chats = getChatIDs($dbCon);
?>
<!DOCTYPE>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
        function editMiiClick(){
            window.location = "customizeMii.php";
        }
        function newChat(){
            $("#example1").PopupWindow("open");
        }
        function settingClick(){
            window.location = "settings.php";
        }
        function shopClick(){
            window.location = "store.html";
        }
        
        </script>
    </head>
    <body id="menuBody"> 
        <div id="panelSection">
            <table id="menuTable">
                <tr>
                    <td class="menuOption">
                        <!--FIX TO CHECK USERS SAVED MII SETTINGS-->
                        <!--<a href="customizeMii.php" class="menuLinks">
                            <div class="channels">
                                <p>Edit Mii</p>
                            </div>
                        </a>-->
                        <button onclick="editMiiClick()" class="channels">
                                <p>Edit Mii</p>
                        </button>
                    </td>
                    <?php
                    $overallCount = 0;
                    $rowCount = 0;
                    while($rowCount < 3 && $overallCount < count($chats)){
                        echo "<td  class='menuOption'>
                            <button class='channels menuLinks'>
                                <p>.".$chats[$overallCount]."</p>
                            </button>
                            </td>";
                        $overallCount++;
                        $rowCount++;
                    }
                    if($rowCount <3){
                        while($rowCount < 3){
                            echo "<td  class='menuOption'>
                            <button onclick='newChat()' class='channels menuLinks'>
                                <p>Add a Chat +</p>
                            </button>
                            </td>";
                            $rowCount++;
                        }
                    }
                    $rowCount = 0;
                    ?>
                    <!--<td  class="menuOption">
                        <a href="chatWindow.php" class="menuLinks">
                            <div class="channels">
                                <p>We Love MiiSN Group Chat</p>
                            </div>
                        </a>
                    </td>
                    <td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>
                    <td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>-->
                </tr>
                <tr>
                    <td class="menuOption">
                        <!--<a href="settings.php" class="menuLinks">
                            <div class="channels">
                                <p>Settings</p>
                            </div>
                        </a>-->
                        <button onclick="settingClick()" class="channels">
                                <p>Settings</p>
                        </button>
                    </td>
                    <?php
                    while($rowCount < 3 && $overallCount < count($chats)){
                        echo "<td  class='menuOption'>
                            <button class='channels menuLinks'>
                                <p>.".$chats[$overallCount]."</p>
                            </button>
                            </td>";
                        $overallCount++;
                        $rowCount++;
                    }
                    if($rowCount <3){
                        while($rowCount < 3){
                            echo "<td  class='menuOption'>
                            <button onclick='newChat()' class='channels menuLinks'>
                                <p>Add a Chat +</p>
                            </button>
                            </td>";
                            $rowCount++;
                        }
                    }
                    $rowCount = 0;
                    ?>
                    <!--<td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>
                    <td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>
                    <td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>-->
                </tr>
                <tr>
                    <td class="menuOption">
                        <!--<a href="store.html" class="menuLinks">
                            <div class="channels">
                                <p>Shop</p>
                            </div>
                        </a>-->
                        <button onclick="shopClick()" class="channels">
                                <p>Shop</p>
                        </button>
                    </td>
                    <?php
                    while($rowCount < 3 && $overallCount < count($chats)){
                        echo "<td  class='menuOption'>
                            <button class='channels menuLinks'>
                                <p>.".$chats[$overallCount]."</p>
                            </button>
                            </td>";
                        $overallCount++;
                        $rowCount++;
                    }
                    if($rowCount <3){
                        while($rowCount < 3){
                            echo "<td  class='menuOption'>
                            <button onclick='newChat()' class='channels menuLinks'>
                                <p>Add a Chat +</p>
                            </button>
                            </td>";
                            $rowCount++;
                        }
                    }
                    $rowCount = 0;
                    ?>
                    <!--<td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>
                    <td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>
                    <td class="menuOption">
                        <a href="#" class="menuLinks">
                            <div class="channels"></div>
                        </a>
                    </td>->
                </tr>
            </table>
        </div>
    </body>
</html>
