<!DOCTYPE>
<?php  
include "database/databaseConfig.php";
include "chatHandler.php";
include "userPresent.php";
$ch = new ChatHandler();
?>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>  
            var visibleUsers = [];
            var visibleMiiInfo = [];
            function showMessage(messageHTML) {
                //console.log($("#prevChat div").length);
                $('#prevChat').append(messageHTML);
                if($("#prevChat div").length >= 25){
                    $("#prevChat div").first().remove();
                }
                var messagesSent = "[";
                for(var x=0;x<$("#prevChat div").length;x++){
                    //console.log($("#prevChat div").get(x));
                    messagesSent = messagesSent + $("#prevChat div").get(x).textContent;
                    if(x != $("#prevChat div").length-1){
                        messagesSent = messagesSent + ",";
                    }
                }
                messagesSent = messagesSent + "]";
                // ______________________________________________________SEND HISTORY TO DATABASE
                //console.log(messagesSent);
            }
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

                var websocket = new WebSocket("ws://localhost:8090/socketCode.php"); 
                websocket.onopen = function(event){
                    var messageJSON = {
                        //chat_user: $('#chat-user').val(),
                        chat_user: "<?php echo $_SESSION['user']['username'];?>",
                        //chat_user: "USER 1",
                        chat_message: "<?php echo $_SESSION['user']['username'];?> entered",
                        miiInfo:["<?php echo $_SESSION['user']['SkinColor']; ?>","<?php echo $_SESSION['user']['ShirtColor']; ?>","<?php echo $_SESSION['user']['PantsColor']; ?>"],
                        code:1
                    };
                    websocket.send(JSON.stringify(messageJSON));
                    // ______________________________________________________GET HISTORY
                    var chatHistory = '[apple,green,pie,eggs]';
                    chatHistory = chatHistory.substr(1,chatHistory.length-2).split(",");
                    for(var x = 0;x< chatHistory.length;x++){
                        $("#prevChat").append("<div>"+chatHistory[x]+"</div>");
                    }
                }
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
                        //console.log(d.message_type);
                        if(d.message_type != "enter" && d.message_type != "exit"){
                            var sentUser = d.message.split(":")[0].split("<div>")[1];
                            var chatUser = visibleUsers.indexOf(sentUser);
                            //console.log(sentUser);
                            $("#user"+chatUser+" #chatBox"+chatUser).css("visibility","visible");
                            $("#user"+chatUser+" #chatBox"+chatUser+" p").remove();
                            $("#user"+chatUser+" #chatBox"+chatUser).append("<p>"+d.message.split(":")[1].split("</div>")[0]+"</p>");
                            //console.log("HERE");
                        }
                        
                    }
                };

                websocket.onerror = function(event){
                    showMessage("<div>*****Error*****</div>");
                };

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
        
        <a href="userSelection.php"><button id="chatBackButton">Back</button></a>
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