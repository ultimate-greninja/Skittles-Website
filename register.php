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
        $teamName = $_POST["txtTeamName"];
        $phoneNumber = $_POST["txtPhoneNumber"];
        $postcode = $_POST["txtPostCode"];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM teams WHERE `TeamName` = ?");
        $stmt->bind_param("s", $teamName);
        $stmt->execute();
        $teamName_check = $stmt->get_result();

        $existingTeam = $teamName_check->fetch_assoc();
        if ($existingTeam) {
            setcookie("teamAlreadyExists", htmlspecialchars($teamName), time() + (86400 * 30), "/");
            $stmt->close();
            mysqli_close($conn);
            header("location:index.php");
            exit();
        } else {
            $password = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);

            // Insert new team into the database (example query)
            $insertStmt = $conn->prepare("INSERT INTO teams (`TeamName`, `PhoneNumber`, `Location`, `Password`) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("ssss", $teamName, $phoneNumber, $postcode, $password);
            $insertStmt->execute();
            $insertStmt->close();
        }
    }

    if (isset($_POST["btnReturn"])) {
        mysqli_close($conn);
        header("location:index.php");
        exit();
    }
    ?>
    <div id="all">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div id="title">
                <p></p>
                <h1>Register Team</h1>
            </div>
            <div id="boxes">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Team Name</span>
                    <input type="text" class="form-control" placeholder="Team Name" aria-label="Team Name" aria-describedby="basic-addon1" name="txtTeamName" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Postcode</span>
                    <input type="text" class="form-control" placeholder="Postcode" aria-label="Postcode" aria-describedby="basic-addon1" name="txtPostCode" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Phone Number</span>
                    <input type="number" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1" name="txtPhoneNumber" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="txtPassword" required>
                </div>
                <div id="button" class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" value="Register" name="btnRegister"/>
                </div>
            </div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <input id="backButton" type="submit" class="btn btn-danger" value="return to menu" name="btnReturn"/>
        </form>
    </div>
</body>
</html>