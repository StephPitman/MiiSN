<!DOCTYPE html class = "registrationPage">
<?php
    $fNameBack = "#FFFFFF";
    $fNameText = "";
    $lNameBack = "#FFFFFF";
    $lNameText = "";
    $emailBack = "#FFFFFF";
    $emailText = "";
    $usernameBack = "#FFFFFF";
    $usernameText = "";
    $passBack = "#FFFFFF";
    $passText = "";
    $passRepBack = "#FFFFFF";
    $passRepText = "";
?>
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
    </head>
    

    <body>
        <?php
            $probs = array();
            if($_SERVER["REQUEST_METHOD"]== "POST"){
                $incorrect = 0;
                //checks if first name is inputed
                if(!isset($_POST["fName"]) or $_POST["fName"] == NULL){
                    $fNameBack = "#F5C5C5";
                    array_push($probs,"Please enter a first name");
                }
                else{
                    //checks if first name is only letters and spaces
                    if(!preg_match("/^[a-zA-Z ]*$/",$_POST["fName"])){
                        $fNameBack = "#F5C5C5";
                        array_push($probs,"Please enter a first name with only letters and spaces");
                    }
                    //if first name passes test display it is correct
                    else{
                        $fNameBack = "#FFFFFF";
                        $fNameText = $_POST["fName"];
                    }
                }
                //checks if last name is inputed
                if(!isset($_POST["lName"]) or $_POST["lName"] == NULL){
                    $lNameBack = "#F5C5C5";
                    array_push($probs, "Please enter a last name");
                }
                else{
                    //checks if last name is only letters and spaces
                    if(!preg_match("/^[a-zA-Z ]*$/",$_POST["lName"])){
                        $lNameBack = "#F5C5C5";
                        array_push($probs,"Please last name with only letters and spaces");
                    }
                    //if last name passes tests display it is correct
                    else{
                        $lNameBack = "#FFFFFF";
                        $lNameText = $_POST["lName"];
                    }
                }
                //check if email is inputed
                if(!isset($_POST["email"]) or $_POST["email"] == NULL){
                    $emailBack = "#F5C5C5";
                    array_push($probs,"Please enter an email");
                }
                else{
                    //check if email is valid
                   if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        $emailBack = "#F5C5C5";
                        array_push($probs,"Please enter a vaid email");
                    }
                    //if email passes tests display it is correct
                    else{
                        $emailBack = "#FFFFFF";
                        $emailText = $_POST["email"];
                    }
                }
                //check username is inputted
                if(!isset($_POST["username"]) or $_POST["username"] == NULL){
                    $usernameBack = "#F5C5C5";
                    array_push($probs, "Please enter a username");
                }
                else{
                    // ___________________________________________________________________________________________CHECKING IF USERNAME IS USED HERE
                    //check is username is taken
                    
                    //if username passes tests display it is correct
                    $usernameBack = "#FFFFFF";
                    $usernameText = $_POST["username"];
                }
                //check is password is inputed
                if(!isset($_POST["password"]) or $_POST["password"] == NULL){
                    $passBack = "#F5C5C5";
                    array_push($probs,"Please enter a password");
                }
                else{
                    //check if password is 6 chars long
                    if(strlen($_POST["password"])<6 and strlen($_POST["password"])>16){
                        $passBack = "#F5C5C5";
                        array_push($probs,"Please make sure your password is greater then 6 and less than 16 characters");
                    }
                    //if password passes tests display it is correct
                    $passBack = "#FFFFFF";
                    $passText = $_POST["password"];
                }
                //check is repeated password is inputed
                if(!isset($_POST["passwordRepeat"]) or $_POST["passwordRepeat"] == NULL){
                    $passRepBack = "#F5C5C5";
                    array_push($probs,"Please repeat your password");
                }
                else{
                    //check if password and repeated password is the same
                    if($_POST["passwordRepeat"] != $_POST["password"]){
                        $passRepBack = "#F5C5C5";
                        array_push($probs,"Please make sure your repeated password matches the original password");
                        $passRepText = "";
                    }
                    //if repeated password passes tests display it is correct
                    else{
                        $passRepBack = "#FFFFFF";
                        $passRepText = $_POST["passwordRepeat"];
                    }
                    
                }
                    
            }
            ?>
        <!--The Header box for registering page -OC-->
        <header>
            <h2 id = "headerLogo" class="headerInline">MiiSN</h2>
            <a class = "links headerInline" href = "index.html">Home</a>
        </header>
        
        <div id="page">
            <form method="post" action="registration.php">
            <!--Personal Info block -OC-->
            <div class="infoSections" id = "personalInfo">
                <h3>Personal Info</h3>
                <table>
                    <tr>
                        <td>
                            First Name:
                        </td>
                        <td>
                            <input name="fName" value="<?php echo $fNameText; ?>" style="background-color:<?php echo $fNameBack ?>"/>
                        </td>
                        <td> 
                            Last Name:
                        </td>
                        <td>
                            <input name="lName" value="<?php echo $lNameText; ?>" id="lNameText" style="background-color:<?php echo $lNameBack ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input name="email" value="<?php echo $emailText; ?>" id="emailText" style="background-color:<?php echo $emailBack ?>"/>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <!--Login Info block -OC-->
            <div class="infoSections" id = "loginInfo">
                <h3>Login Info</h3>
                <table>
                    <tr>
                        <td>
                            Username:
                        </td>
                        <td>
                            <input name="username" value="<?php echo $usernameText; ?>" id="usernameText" style="background-color:<?php echo $usernameBack ?>"/>    
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input name="password" value="<?php echo $passText; ?>" id="passText" style="background-color:<?php echo $passBack ?>"/>
                        </td>
                        <td>
                            Repeat Password:
                        </td>
                        <td>
                            <input name="passwordRepeat" value="<?php echo $passRepText; ?>" id="passRepText" style="background-color:<?php echo $passRepBack ?>"/>
                        </td>
                    </tr>
                </table>
            <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        //display all problems with user input
                        if(count($probs)>0){
                            for($x=0;$x<count($probs);$x++){
                                echo "<p>".$probs[$x]."</p>";
                            }
                        }
                        else{
                            //insert new user into DB
                            //start session w/
                                //userID
                                //miiId
                        } 
                    }
                   
                ?>
                <input value="Done" type="submit" id="regDoneButton"/>
            </div>
            </form>
        </div>
    </body>
</html>