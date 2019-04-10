<?php
 
    include "database/databaseConfig.php";

    $dbCon = getDB();
    
    //Check to make sure the user has finished editing their Mii
    if (($_SERVER['REQUEST_METHOD'] === 'POST')){
        
        
        
        if (isset($_POST['btnDelete'])){
            
            updateMiiInfo($dbCon);
            
            header ("Location: userSelection.php");
        }
       
    }

    getMiiInfo($dbCon);

?>
<!DOCTYPE >
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--<script src="jquery-3.3.1.js"></script>-->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        
        <script src="database.js"></script>
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
        <script>
            function updateOptionCSS(section,change){
                if(section == "skin"){
                    //LIGHT - FFFF99
                    //MEDIUM - c4b8a2
                    //DARK - 7c7465
                    var charHead = document.getElementsByClassName("characterHead");
                    charHead = charHead[0];
                    if(change == "light"){
                        
                        charHead.style.backgroundColor = "#FFFF99";
                        
                        
                    }
                    else if(change == "medium"){
                        
                        charHead.style.backgroundColor = "#C4B8A2";
                        
                        
                    }
                    //Dark
                    else{
                        
                        charHead.style.backgroundColor = "#7C7465";
                        
                        
                    }
                    
                }
                else if(section == "head"){
                    //SQAURE - RADIUS 0
                    //CIRCLE - RADIUS 1
                    var charHead = document.getElementsByClassName("characterHead");
                    charHead = charHead[0];
                    if(change == "square"){
                        
                        charHead.style.borderRadius = 0;
                        
                    }
                    //square
                    else{
                        
                        charHead.style.borderRadius = "1em";
                    }
                    
                }
                else if(section == "shirt"){
                    //GREEN - 04b804
                    //PRUPLE - 990098
                    //RED - eb1a1a
                    charBody = document.getElementsByClassName("torso");
                    //charBody = charBody[1];
                    console.log(charBody);
                    if(change == "green"){
                        for(x=0;x<charBody.length;x++){
                            
                            charBody[x].style.backgroundColor = "#04b804";
                                                        
                        }
                        
                    }
                    else if(change == "purple"){
                        for(x=0;x<charBody.length;x++){
                            
                            charBody[x].style.backgroundColor = "#990098";
                            
                            
                        }
                        
                        
                    }
                    //red
                    else{
                        for(x=0;x<charBody.length;x++){
                            charBody[x].style.backgroundColor = "#eb1a1a";
                        }
                        
                        
                    }
                    
                }
                else if(section == "pants"){
                    //BLACK - 242424
                    //YELLOW - d5d50b
                    //BLUE - 0404b8
                    charBody = document.getElementsByClassName("leg");
                    if(change == "black"){
                        for(x=0;x<charBody.length;x++){
                            charBody[x].style.backgroundColor = "#242424";
                        }
                    }
                    else if(change == "yellow"){
                        for(x=0;x<charBody.length;x++){
                            charBody[x].style.backgroundColor = "#d5d50b";
                            
                            
                        }
                    }
                    //blue
                    else{
                        for(x=0;x<charBody.length;x++){
                            charBody[x].style.backgroundColor = "#0404b8";
                        }
                    }
                    
                    
                }
            } 
         
            $(document).ready(function() {
                
                updateOptionCSS("skin", "<?php 
                                echo ($_SESSION['user']['SkinSVG']); ?>");
                
                updateOptionCSS("shirt", "<?php 
                                echo ($_SESSION['user']['ShirtSVG']); ?>");
                                
                updateOptionCSS("head", "<?php 
                                echo ($_SESSION['user']['HeadSVG']); ?>");
                
                updateOptionCSS("pants", "<?php 
                                echo ($_SESSION['user']['PantsSVG']); ?>");
            
                
            });
        
        </script>
    </head>
    <body>
        
        <div id="overallDisplay">
            <div class="sections" id="editSection">
                <div id="overallOptions">
                    <div id="selectorInline">
                        <div class="optionSelectors">Face/Body</div>
                        <div class="optionSelectors">Other</div>
                    </div>
                    <div id="options">
                        <p>Skin</p>
                        <table>
                            <td>
                                <button class="optionChoices" name = "skinDark" id="skinDark" onclick="updateOptionCSS('skin','dark')">
                                   <img src="miiImages/skinColours/dark.svg" class="displayImg"/>
                                    
                                    <!--<div class="squareOption" id="redBody">
                                    
                                    </div>-->
                                </button>
                            </td>
                            <td>
                                <button class="optionChoices"  id="skinMedium" onclick="updateOptionCSS('skin','medium')">
                                    <img src="miiImages/skinColours/medium.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="greenBody">
                                    
                                    </div>-->
                                
                                </button>
                            </td>
                            <td>
                                <button class="optionChoices" id="skinLight" onclick="updateOptionCSS('skin','light') ">
                                    <img src="miiImages/skinColours/light.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="purpleBody">
                                    
                                    </div>-->
                                
                                </button>
                            </td>
                        </table>
                        <p>Head</p>
                        <table>
                            <tr>
                                <td>
                                    <button class="optionChoices" id="headCircle"  onclick="updateOptionCSS('head','circle')">
                                        <img src="miiImages/heads/circleHead.svg" class="displayImg"/>
                                        <!--<div class="headOption" id="circleHead">
                                        $_SESSION['user']['Head'] = 
                                        </div>-->
                                    </button>
                                </td>
                                <td>
                                    <button class="optionChoices" id="headSquare" onclick="updateOptionCSS('head','square')">
                                        <img src="miiImages/heads/squareHead.svg" class="displayImg"/>
                                        <!--<div class="headOption" id="squareHead">

                                        </div>-->
                                    </button>
                                </td>
                                <td>
                                    <!--<button class="optionChoices" id="headTriangle" onclick="updateOptionCSS('head','triangle')">
                                        <img src="miiImages/heads/triangleHead.svg" class="displayImg" id="headTriangle"/>-->
                                        <!--<div class="headOption"> 

                                        </div>
                                    </button>-->
                                </td>
                            </tr>
                        </table>
                        <p>Body</p>
                        <table>
                            <td>
                                <button class="optionChoices" id="shirtRed" onclick="updateOptionCSS('shirt','red')">
                                    <img src="miiImages/shirtColours/red.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="redBody">
                                    
                                    </div>-->
                                </button>
                            </td>
                            <td>
                                <button class="optionChoices" id="shirtGreen" onclick="updateOptionCSS('shirt','green')">
                                    <img src="miiImages/shirtColours/green.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="greenBody">
                                    
                                    </div>-->
                                
                                </button>
                            </td>
                            <td>
                                <button class="optionChoices" id="shirtPurple" onclick="updateOptionCSS('shirt','purple')">
                                    <img src="miiImages/shirtColours/purple.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="purpleBody">
                                    
                                    </div>-->
                                
                                </button>
                            </td>
                        </table>
                        <p>Pants</p>
                        <table>
                            <td>
                                <button class="optionChoices" id="pantBlack" onclick="updateOptionCSS('pants','black')">
                                    <img src="miiImages/pantColours/black.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="redBody">
                                    
                                    </div>-->
                                </button>
                            </td>
                            <td>
                                <button class="optionChoices" id="pantYellow" onclick="updateOptionCSS('pants','yellow')">
                                    <img src="miiImages/pantColours/yellow.svg" class="displayImg" />
                                    <!--<div class="squareOption" id="greenBody">
                                    
                                    </div>-->
                                
                                </button>
                            </td>
                            <td>
                                <button class="optionChoices" id="pantBlue" onclick="updateOptionCSS('pants','blue')">
                                    <img src="miiImages/pantColours/blue.svg" class="displayImg"/>
                                    <!--<div class="squareOption" id="purpleBody">
                                    
                                    </div>-->
                                
                                </button>
                            </td>
                        </table>
                    </div>
                </div>
            </div>
        
            <div class="sections" id="displaySection">
                <div id="characterDisplay">
                    <div id="character">
                        <div class="characterHead"></div>
                        <div class="leftArm arm torso"></div>
                        <div class="characterBody torso"></div>
                        <div class="rightArm arm torso"></div>
                        <div class="characterLegs">
                            <div class="leg leftLeg"></div>
                            <div class="leg rightLeg"></div>
                        </div>
                    </div>
                </div>
                <!--<a href="userSelection.php"><button id="doneCustomizing">Done</button></a>
                
                <button id="doneCustomizing">Done</button>-->
                <form method = "post">
                   <!--  <a href="userSelection.php"><button id="doneCustomizing">Done</button></a> -->
                   <input type="submit" id = "doneCustomizing" name="btnDelete" value="Done" />
                </form>
            </div>
            
        </div>
    
    </body>
</html>
