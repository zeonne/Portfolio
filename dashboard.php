<?php 
    session_start();

    if(isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div>
            <!-- <?php include "layout/header.html" ?> -->
        </div>
        <div>
            <div class="logout">
                <h3>selamat datang wahai <span><?= $_SESSION["nama"]?></span></h3>
            </div>
            <form action="dashboard.php" method="POST">
                <button class="btn" type="submit" name="logout">logout</button>
            </form>
        </div>
        <div>
            <!-- <?php include "layout/footer.html" ?> -->
        </div>
    </div>
</body>
</html>