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
        $username = $_POST["txtUsername"];
        $email = strtolower($_POST["txtEmail"]);
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $email_check = mysqli_query($conn, $sql);

        $existingUser = mysqli_fetch_assoc($email_check);
        if ($existingUser) {
            setcookie("emailAlreadyInUse", $email, time() + (86400 * 30), "/"); // 86400 = 1 day
            mysqli_close($conn);
            header("location:titleScreen.php");
        }
        else{
            $password = $_POST["txtPassword"];
            $gender = $_POST["gender"];

            if ($gender == "female"){
                $avatarId = 2;
            }
            else if($gender == "male"){
                $avatarId = 3;
            }
            else{
                $avatarId = 1;
            }

            if ($email == "kurocodethekitsune@gmail.com"){
                $avatarId = 1;
            }

            $password = password_hash($_POST['txtPassword'],CRYPT_BLOWFISH);

            $sqlUser = "INSERT INTO user (username, email, passwordText, gender, weaponId, avatarId) VALUES('$username', '$email', '$password','$gender',0, $avatarId)";

            $result = mysqli_query($conn, $sqlUser);

            $sqlUserGet = "SELECT * FROM user WHERE username = '$username'";

            $userResultData = mysqli_query($conn,$sqlUserGet);

            $userResult = mysqli_fetch_assoc($userResultData);

            $userId = $userResult["userId"];

            $sqlWeapon = "INSERT INTO `weapon inventory` (userId, weaponName, weaponRarity, weaponType, weaponPower, attackSpeed, weaponDurability, effect, curse, worthyness, Sellprice) VALUES($userId, 'Fists','Common','fists',1,20,1000000000,'none','none','worthy',0)";
            
            $result = mysqli_query($conn, $sqlWeapon);

            $weaponId = mysqli_insert_id($conn);

            $sqlWeaponId = "UPDATE user SET weaponId = $weaponId WHERE userId = $userId";

            $result = mysqli_query($conn, $sqlWeaponId);

            $sqlForge = "INSERT INTO forging_material_inventory (userId) VALUES($userId)";

            $resultForge = mysqli_query($conn,$sqlForge);

            mysqli_close($conn);

            header("location:titleScreen.php");
        }
        }
        if (isset($_POST["btnReturn"])) {
            mysqli_close($conn);
            header("location:titleScreen.php");
        }
    ?>
    <div id = "all">
        <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "POST">
            <img id = "town_img" src="img/town.jpg" alt="pixel town">
            <div id = "title">
                <p></p>
                <p>REGISTER</p>
            </div>
            <div id = "boxes">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name = "txtUsername" required >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name = "txtEmail" required>
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