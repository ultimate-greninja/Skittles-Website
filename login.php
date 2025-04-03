<?php
    require "config/database.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST["btnLogin"])) {
            $fail = true;
            $teamName = $_POST["txtTeamName"];
            $password = $_POST["txtPassword"];

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM teams WHERE `TeamName` = ?");
            $stmt->bind_param("s", $teamName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $passHash = $row["Password"];
                if (password_verify($password, $passHash)) {
                    echo "password correct";
                    setcookie("teamId", $row["TeamId"], time() + (86400 * 30), "/"); // 86400 = 1 day
                    $stmt->close();
                    mysqli_close($conn);
                    header("location:index.php");
                    exit();
                } else {
                    setcookie("passwordIncorrect", "", time() + (86400 * 30), "/"); // 86400 = 1 day
                    echo "password incorrect";
                    $stmt->close();
                    mysqli_close($conn);
                    header("location:titleScreen.php");
                    exit();
                }
            } else {
                setcookie("AccountDontExist", "", time() + (86400 * 30), "/"); // 86400 = 1 day
                echo "no account";
                $stmt->close();
                mysqli_close($conn);
                header("location:titleScreen.php");
                exit();
            }
        }

        if (isset($_POST["btnReturn"])) {
            mysqli_close($conn);
            header("location:titleScreen.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>LOGIN</title>
</head>
<body>
    <div id="all">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div id="title">
                <p></p>
                <p id="login">LOG IN</p>
            </div>
            <div id="boxes">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Team Name</span>
                    <input type="text" class="form-control" placeholder="Team Name" aria-label="Team Name" aria-describedby="basic-addon1" name="txtTeamName" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="txtPassword" required>
                </div>
                <div id="button" class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" value="Log in" name="btnLogin"/>
                </div>
            </div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <input id="backButton" type="submit" class="btn btn-danger" value="return to menu" name="btnReturn"/>
        </form>
    </div>
</body>
</html>