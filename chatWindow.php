<!DOCTYPE>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>  
            function showMessage(messageHTML) {
                $('#prevChat').append(messageHTML);
            }

            $(document).ready(function(){
                var websocket = new WebSocket("ws://localhost:8090/demo/php-socket.php"); 
                websocket.onmessage = function(event) {
                    var Data = JSON.parse(event.data);
                    showMessage("<div>"+Data.message+"</div>");
                    $('#chat-message').val('');
                };

                websocket.onerror = function(event){
                    showMessage("<div>*****Error*****</div>");
                };

                $('#chatForm').on("submit",function(event){
                    event.preventDefault();
                    $('#chat-user').attr("type","hidden");		
                    var messageJSON = {
                        //chat_user: $('#chat-user').val(),
                        chat_user: "USER 1",
                        chat_message: $('#textInput').val()
                    };
                    websocket.send(JSON.stringify(messageJSON));
                });
            });
	    </script>
    </head>
    <body>
        
        <a href="userSelection.html"><button id="chatBackButton">Back</button></a>
        <div id="miiBox">
            <div id="miis">
                <div class="miiInChat">
                    <!--<div id="chatBox1" class="chatbox">
                        <p>I love being a 90s kid</p>
                    </div>-->
                    <div class="chatCharacter">
                        <div id="characterHead"></div>
                        <div id="leftArm" class="arm torso"></div>
                        <div id="characterBody" class="torso"></div>
                        <div id="rightArm" class="arm torso"></div>
                        <div id="characterLegs">
                            <div class="leg" id="leftLeg"></div>
                            <div class="leg" id="rightLeg"></div>
                        </div>
                    </div>
                </div>
                <div class="miiInChat">
                    <!--<div id="chatBox2" class="chatbox">
                        <p>I love MiiSN</p>
                    </div>-->
                    <div class="chatCharacter">
                        <div id="characterHead"></div>
                        <div id="leftArm" class="arm torso"></div>
                        <div id="characterBody" class="torso"></div>
                        <div id="rightArm" class="arm torso"></div>
                        <div id="characterLegs">
                            <div class="leg" id="leftLeg"></div>
                            <div class="leg" id="rightLeg"></div>
                        </div>
                    </div>
                </div>
                <div class="miiInChat">
                    <div id="chatBox3" class="chatbox"></div>
                    <div class="chatCharacter">
                        <div id="characterHead"></div>
                        <div id="leftArm" class="arm torso"></div>
                        <div id="characterBody" class="torso"></div>
                        <div id="rightArm" class="arm torso"></div>
                        <div id="characterLegs">
                            <div class="leg" id="leftLeg"></div>
                            <div class="leg" id="rightLeg"></div>
                        </div>
                    </div>
                </div>
                <div class="miiInChat">
                    <div id="chatBox4" class="chatbox"></div>
                    <div class="chatCharacter">
                        <div id="characterHead"></div>
                        <div id="leftArm" class="arm torso"></div>
                        <div id="characterBody" class="torso"></div>
                        <div id="rightArm" class="arm torso"></div>
                        <div id="characterLegs">
                            <div class="leg" id="leftLeg"></div>
                            <div class="leg" id="rightLeg"></div>
                        </div>
                    </div>
                </div>
                <div class="miiInChat">
                    <div id="chatBox5" class="chatbox"></div>
                    <div class="chatCharacter">
                        <div id="characterHead"></div>
                        <div id="leftArm" class="arm torso"></div>
                        <div id="characterBody" class="torso"></div>
                        <div id="rightArm" class="arm torso"></div>
                        <div id="characterLegs">
                            <div class="leg" id="leftLeg"></div>
                            <div class="leg" id="rightLeg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="bottomDiv">
        
            <div id="prevChat">
            </div>

            <div id="chatBox">
                <form name="chatForm" id="chatForm">
                    <input type="submit"/>
                    <input name="createdMessage" id="textInput"/>
                </form>
                
            </div>

        </div>
        
    </body>
</html>