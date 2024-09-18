<?php 
    include "service/database.php";
    session_start();

    $register_message = "";

    if(isset($_SESSION["is_login"]))  {
        header("location: dashboard.php");
    }

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash('sha256', $password);

        try {
            $sql = "INSERT INTO username (nama, password) VALUES ('$username', '$hash_password')";

            if($db->query($sql)) {
                $register_message ="daftar akun telah berhasil, silahkan login";
            }else {
                $register_message ="daftar akun gagal, silahkan coba lagi";
            }
        }catch (mysqli_sql_exception) {
            $register_message = "username sudah ada, silahkan ganti yang lain";
        }
        $db->close();        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h2>DAFTAR AKUN</h2>
        <div>
            <!-- <?php include "layout/header.html"?> -->
        </div>
        <div>
            <i><?= $register_message?></i>
            <form action="register.php" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="Username" name="username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password">
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button class="btn" type="submit" name="register">Daftar</button>

                <div class="register-link">
                    <p>already have an account!!=><a href="login.php">Login</a></p>
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