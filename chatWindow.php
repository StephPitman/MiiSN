<!DOCTYPE>
<?php  
include "database/databaseConfig.php";
include "chatHandler.php";
//include "userPresent.php";
$ch = new ChatHandler();
$dbCon = getDB();
$chatId = 0;
$chatHistory = null;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $chatId = $_POST["id"];
    $chatHistory = getChat($dbCon,$chatId);
}
?>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>  
            
            var visibleUsers = [];
            var visibleMiiInfo = [];
            //displays messgae in message history box, restricts the chat to save only 25 messages, updates the chat logs in the database
            function showMessage(messageHTML) {
                //console.log($("#prevChat div").length);
                $('#prevChat').append(messageHTML);
                if($("#prevChat div").length >= 25){
                    $("#prevChat div").first().remove();
                }
                var messagesSent = "[";
                for(var x=1;x<$("#prevChat div").length;x++){
                    //console.log($("#prevChat div").get(x));
                    messagesSent = messagesSent + $("#prevChat div").get(x).textContent;
                    if(x != $("#prevChat div").length-1){
                        messagesSent = messagesSent + ",";
                    }
                }
                messagesSent = messagesSent + "]";
                // ______________________________________________________SEND HISTORY TO DATABASE
                var xmlhttp = new XMLHttpRequest();
                /*xmlhttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        alert(this.responseText);
                    }
                    
                    
                }*/
                console.log(messagesSent);
                xmlhttp.open("POST","chatUpdateAjax.php?list="+messagesSent+"&id="+<?php echo $chatId; ?>,true);
                //window.location = "chatUpdateAjax.php?list="+messagesSent+"&id="+<?php echo $chatId; ?>;
                xmlhttp.send();
                
            }
            //updates the Miis in the mii display box
            //both who is being displayed and who is saying what
            function updateMiis(){
                $('.miiInChat').remove();
                for(var x=0;x<visibleUsers.length;x++){
                    $('#miis').append("<div class='miiInChat' id='user"+x+"'><div class='chatCharacter'><div id='chatBox"+x+"' class='chatbox'></div><div class='characterHead' id='userHead"+x+"'></div><div class='leftArm arm torso userArm"+x+"'></div><div class='characterBody torso' id='userTorso"+x+"'></div><div class='rightArm arm torso userArm"+x+"'></div><div class='characterLegs'><div class='leg leftLeg userLeg"+x+"'></div><div class='leg rightLeg userLeg"+x+"'></div></div></div><p class='usernameDisplay'>"+visibleUsers[x]+"</p></div>");
                    $("#user"+x+" #userHead"+x).css("background-color", visibleMiiInfo[x][0]);
                    $("#user"+x+" .userArm"+x).css("background-color", visibleMiiInfo[x][1]);
                    $("#user"+x+" #userTorso"+x).css("background-color", visibleMiiInfo[x][1]);
                    $("#user"+x+" .userLeg"+x).css("background-color",visibleMiiInfo[x][2]);
                    if($("#user"+x+" #chatBox"+x+" p").length){
                        $("#user"+x+" #chatBox"+x).css("visibility","visible");
                    }
                    else{
                        $("#user"+x+" #chatBox"+x).css("visibility","hidden");
                    }
                    
                }
                
                
            }
            
            $(document).ready(function(){
                /*
                THIS SECTION USED THE TECHNIQUES GIVEN FROM THIS LINK/WEBSITE
                https://phppot.com/php/simple-php-chat-using-websocket/
                */
                //creates socket
                var websocket = new WebSocket("ws://localhost:8090/socketCode.php"); 
                //when websocket is opened creates JSON that says this user is enetering, sends it to present users, and updates chat logs
                websocket.onopen = function(event){
                    var messageJSON = {
                        chat_user: "<?php echo $_SESSION['user']['username'];?>",
                        chat_message: "<?php echo $_SESSION['user']['username'];?> entered",
                        miiInfo:["<?php echo $_SESSION['user']['SkinColor']; ?>","<?php echo $_SESSION['user']['ShirtColor']; ?>","<?php echo $_SESSION['user']['PantsColor']; ?>"],
                        code:1
                    };
                    websocket.send(JSON.stringify(messageJSON));
                    // ______________________________________________________GET HISTORY
                    //var chatHistory = '[apple,green,pie,eggs]';
                    <?php
                    
                    ?>
                    var chatLog = "<?php echo $chatHistory; ?>";
                    //if("<?php echo $chatHistory;?>" != ""){
                        /*chatLog = chatLog.substr(1,chatLog.length-2).split(",");
                        for(var x = 0;x< chatLog.length;x++){
                            $("#prevChat").append("<div>"+chatLog[x]+"</div>");
                        }*/
                        <?php $y = 0;
                        $chatHistory = substr($chatHistory,1,-1);
                        $s = explode (",", $chatHistory);
                        if(count($s) > 0){
                            while($y< count($s) ){
                                
                                echo "$('#prevChat').append('<div> ".$s[$y]."</div>');";
                                
                                $y++;
                            }
                        }    
                        
                        ?>
                        
                    //}
                    
                }
                
                //when websocket receives message it parses it, updates the miis present, and displays mii chat bubble of message sender
                websocket.onmessage = function(event) {
                    
                    var d = JSON.parse(event.data);
                    //console.log(d.message);
                    var c = false;
                    var x = 0;
                    var y = 0;
                    while(x < visibleUsers.length || y < d.users.length){
                        if(x < visibleUsers.length){
                            if(jQuery.inArray(visibleUsers[x],d.users) == -1){
                                c = true;
                                visibleMiiInfo.splice(x,1);
                                visibleUsers.splice(x,1);
                            }
                            x++;
                        }
                        if(y < d.users.length){
                            if(jQuery.inArray(d.users[y],visibleUsers) == -1){
                                c = true;
                                visibleUsers.push(d.users[y]);
                                visibleMiiInfo.push(d.miiInfo[y]);
                            }
                            y++;
                        }
                    }
                    if(c == true){
                        updateMiis();
                    }
                    if(d.message != "<div>:</div>"){
                        showMessage(d.message);
                        if(d.message_type != "enter" && d.message_type != "exit"){
                            var sentUser = d.message.split(":")[0].split("<div>")[1];
                            var chatUser = visibleUsers.indexOf(sentUser);
                            $("#user"+chatUser+" #chatBox"+chatUser).css("visibility","visible");
                            $("#user"+chatUser+" #chatBox"+chatUser+" p").remove();
                            $("#user"+chatUser+" #chatBox"+chatUser).append("<p>"+d.message.split(":")[1].split("</div>")[0]+"</p>");
                        }
                        
                    }
                };
                //on error alert the user with *****Error***** in chat window
                websocket.onerror = function(event){
                    showMessage("<div>*****Error*****</div>");
                };

                //when they press the chat it creates JSON and sends to users in chat
                $('#chatForm').on("submit",function(event){
                    event.preventDefault();
                    $('#chat-user').attr("type","hidden");
                    var messageJSON = {
                        chat_user: "<?php echo $_SESSION['user']['username'];?>",
                        chat_message: $('#textInput').val(),
                        code: 0
                    };
                    websocket.send(JSON.stringify(messageJSON));
                    $('#textInput').val('');
                });
                
                //when they trivia button presseed it send a piece of trivis to the whole group
                $("#triviaBtn").click(function() {
                    $.get("https://opentdb.com/api.php?amount=1", function(result){
                        var messageJSON = {
                            chat_user: "<?php echo $_SESSION['user']['username'];?>",
                            chat_message: result.results[0].question.replace(/&quot;/g,'"')+"  "+result.results[0].correct_answer.replace(/&quot;/g,'"'),
                            code:0
                        };
                        websocket.send(JSON.stringify(messageJSON));
                    });
                });
                //when the user leaves the chat they will be removed from everyones mii window, and they a message will be set saying they left
                $("#chatBackButton").click(function() {
                    var messageJSON = {
                        chat_user: "<?php echo $_SESSION['user']['username'];?>",
                        chat_message: "<?php echo $_SESSION['user']['username'];?> left",
                        code:2
                    };
                    websocket.send(JSON.stringify(messageJSON));
                   websocket.close() 
                });
            });
	    </script>
        <script>
            
        
        </script>
    </head>
    <body>
        
        <div>
            <a href="userSelection.php"><button id="chatBackButton">Back</button></a>
            <p id="chatIdDisplay">Chat Id: <?php echo $chatId; ?></p>
        </div>
        <div id="miiBox">
            <div id="miis">
            </div>
        </div>
        
        <div id="bottomDiv">
        
            <div id="prevChat">
            </div>

            <div id="chatBox">
                
                    <div>
                        <form name="chatForm" id="chatForm">
                        <input name="createdMessage" id="textInput"/>
                            <div>
                                <input type="submit"  class="subTrivBtn"/>
                                <button type="button" id="triviaBtn" class="subTrivBtn">Trivia</button>
                            </div>
                        </form>
                    </div>
                
            </div>

        </div>
        
    </body>
</html>