<!DOCTYPE html class = "registrationPage">
<html>
    <head lang = "en">
        <title>Create Account</title>
        <link rel = "stylesheet" href = "styles.css">
    </head>

    <body>
        <!--The Header box for registering page -OC-->
        <header>
            <h2 id = "headerLogo" class="headerInline">MiiSN</h2>
            <a class = "links headerInline" href = "index.html">Home</a>
        </header>
        <div id="page">
            <form type="get" action="register.php">
            <!--Personal Info block -OC-->
            <div class="infoSections" id = "personalInfo">
                <h3>Personal Info</h3>
                <table>
                    <tr>
                        <td>
                            First Name:
                        </td>
                        <td>
                            <input name="fName"/>
                        </td>
                        <td> 
                            Last Name:
                        </td>
                        <td>
                            <input name="lName"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input name="email"/>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <!--Login Info block -OC-->
            <div class="infoSections" id = "loginInfo">
                <h3>Login Info</p>
                <table>
                    <tr>
                        <td>
                            Username:
                        </td>
                        <td>
                            <input name="username"/>    
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input name="password"/>
                        </td>
                        <td>
                            Repeat Password:
                        </td>
                        <td>
                            <input name="passwordRepeat"/>
                        </td>
                    </tr>
                </table>
                <input value="Done" type="submit" id="regDoneButton"/>
            </div>
            </form>
        </div>


    </body>
</html>