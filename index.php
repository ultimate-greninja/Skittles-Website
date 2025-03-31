<?php include "header.php";?>
<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check which button is clicked
        if (isset($_POST["register"])) {
            register();
        } elseif (isset($_POST["login"])) {
            login();
        }
    }

    // Define the PHP functions
    function register() {
        echo "register";
        header("location:register.php");
    }

    function login() {
        echo "login";
        header("location:login.php");    
    }
?>
    <div id = "fakeBody">
        <div id= "choiceBox">
            <h1>Skittles</h1>
            <form id = "choiceButtons" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="submit" name = "login" value ="login"></input>
                <input type="submit" name = "register" value ="register"></input>
            </form>
        </div>
    </div>
<?php include "footer.php";?>
