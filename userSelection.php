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
            window.location = "chatCreation.php?";
        }
        function settingClick(){
            window.location = "settings.php";
        }
        function shopClick(){
            window.location = "store.html";
        }
        function goToChat(id){
            
        }
        
        </script>
    </head>
    <body id="menuBody"> 
        <div id="panelSection">
            <table id="menuTable">
                <tr>
                    <td class="menuOption">
                        <button onclick="editMiiClick()" class="channels">
                                <p>Edit Mii</p>
                        </button>
                    </td>
                    <?php
                    $overallCount = 0;
                    $rowCount = 0;
                    //prints 3 or less chat butttons in a row
                    while($rowCount < 3 && $overallCount < count($chats)){
                        //_______________________________________________________________CHANGE SO THAT GETS CHAT NAME FROM ID
                        echo "<td onclick='goToChat(".$chats[$overallCount].")  class='menuOption'>
                            <form action='chatWindow.php' method='post'>
                            <input type='hidden' name='id' value='3'/>
                            <button type='submit' class='channels menuLinks'>
                                <p>".$chats[$overallCount]."</p>
                            </button>
                            </form>
                            </td>";
                        $overallCount++;
                        $rowCount++;
                    }
                    //if printed all chats print create chat buttons
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
                </tr>
                <tr>
                    <td class="menuOption">
                        <button onclick="settingClick()" class="channels">
                                <p>Settings</p>
                        </button>
                    </td>
                    <?php
                    //print 3 or less chat buttons in a row
                    while($rowCount < 3 && $overallCount < count($chats)){
                        //_______________________________________________________________CHANGE SO THAT GETS CHAT NAME FROM ID
                        echo "<td onclick='goToChat(".$chats[$overallCount].") class='menuOption'>
                            <form action='chatWindow.php' method='post'>
                            <input type='hidden' name='id' value=".$chats[$overallCount]."/>
                            <button class='channels menuLinks'>
                                <p>".$chats[$overallCount]."</p>
                            </button>
                            </form>
                            </td>";
                        $overallCount++;
                        $rowCount++;
                    }
                    //if printed all chats print create chat buttons
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
                </tr>
                <tr>
                    <td class="menuOption">
                        <button onclick="shopClick()" class="channels">
                                <p>Shop</p>
                        </button>
                    </td>
                    <?php
                    //prints 3 or less chat buttons in a row
                    while($rowCount < 3 && $overallCount < count($chats)){
                        //_______________________________________________________________CHANGE SO THAT GETS CHAT NAME FROM ID
                        echo "<td onclick='goToChat(".$chats[$overallCount].") class='menuOption'>
                            <form action='chatWindow.php' method='post'>
                            <input type='hidden' name='id' value=".$chats[$overallCount]."/>
                            <button class='channels menuLinks'>
                                <p>".$chats[$overallCount]."</p>
                            </button>
                            </form>
                            </td>";
                        $overallCount++;
                        $rowCount++;
                    }
                    //if printed all chats print create chat buttons
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
                </tr>
            </table>
        </div>
    </body>
</html>
