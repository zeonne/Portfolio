<?php
    include "service/database.php";
    session_start();

    $login_message = "";

    if(isset($_SESSION["is_login"]))  {
        header("location: dashboard.php");
    }

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash('sha256', $password);

        $sql = "SELECT * FROM username WHERE nama='$username' AND password='$hash_password'";

        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            
            header ("location: port.php");
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["is_login"] = true;

        }else {
        $login_message = "data tidak ditemukan, silahkan coba lagi";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h2>MASUK</h2>
        <div>
            <!-- <?php include "layout/header.html"?> -->
        </div>
        <div>
            <i><?= $login_message ?></i>
            <form action="login.php" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="Username" name="username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password">
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button class="btn" type="submit" name="login">Masuk</button>

                <div class="register-link">
                    <p>Don't have an account?=><a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
        <hr>
        <p>selamat datang wahai kalian</p>
        <div>
            <!-- <?php include "layout/footer.html"?> -->
        </div>
    </div>
</body>

</html>