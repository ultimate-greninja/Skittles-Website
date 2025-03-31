<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>REGISTER</title>
</head>
<body>
    <?php
    require "config/database.php";

    if (isset($_POST["btnRegister"])) {
        $teamName = $_POST["txtUsername"];
        $phoneNumber = $_POST["txtPhoneNumber"];
        $postcode = $_POST["txtPostcode"];

        $sql = "SELECT * FROM teams WHERE 'Team name' = '$teamName'";
        $teamName_check = mysqli_query($conn, $sql);

        $existingTeam = mysqli_fetch_assoc($teamName_check);
        if ($existingTeam) {
            setcookie("teamAlreadyExists", $teamName, time() + (86400 * 30), "/"); // 86400 = 1 day
            mysqli_close($conn);
            header("location:titleScreen.php");
        }
        else{
            $password = $_POST["txtPassword"];
            $password = password_hash($_POST['txtPassword'],CRYPT_BLOWFISH);
        }
        if (isset($_POST["btnReturn"])) {
            mysqli_close($conn);
            header("location:index.php");
        }
    }
    ?>
    <div id = "all">
        <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "POST">
            <img id = "town_img" src="img/town.jpg" alt="pixel town">
            <div id = "title">
                <p></p>
                <h1>Register Team</h1>
            </div>
            <div id = "boxes">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Team Name</span>
                    <input type="text" class="form-control" placeholder="Team Name" aria-label="Team Name" aria-describedby="basic-addon1" name = "txtTeamName" required >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Postcode</span>
                    <input type="text" class="form-control" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1" name = "txtPostCode" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Phone Number</span>
                    <input type="number" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1" name = "txtPhoneNumber" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name = "txtPassword" required>
                </div>
                <div id = "button" class = "d-grid gap-2">
                    <input type = "submit" class = "btn btn-primary" value = "Register" name = "btnRegister"/>
                </div>
            </div>
        </form>
        <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "POST">
            <input id = "backButton"  type = "submit" class = "btn btn-danger" value = "return to menu" name = "btnReturn"/>
        </form>
    </div>
</body>
</html>