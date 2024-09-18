<?php

    include "service/database.php";
    session_start();

    $login_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && isset($_POST["alamat"]) && isset($_POST["pesan"])) {
            $username = $_POST["username"];
            $alamat = $_POST["alamat"];
            $pesan = $_POST["pesan"];

            $stmt = $db->prepare("INSERT INTO pesan (nama, alamat, pesan) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $alamat, $pesan);

            if ($stmt->execute()) {
                $login_message = "Pesan berhasil dikirim!";
            } else {
                $login_message = "Gagal mengirim pesan. Silakan coba lagi.";
            }

            $stmt->close();
        } else {
            $login_message = "Semua kolom wajib diisi.";
        }
        $db->close();
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Portfolio</title>
    <link rel="stylesheet" href="port.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg sticky-top custom-navbar">
        <div class="container-fluid">
            <h1 class="ms-5 text-white fw-100">Myardl.</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon-red"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-5 me-5">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#service">Expertise</li>
                            <li><a class="dropdown-item" href="#portfolio">Sosial Apps</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#contact">Contact</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <a class="btn" href="#contact">Contact Us</a> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Home -->
    <div class="one" id="home">
        <div class="left">
            <h6>HI, MY NAME IS</h6>
            <h1>Brittaniy Myardl.</h1>
            <h2>I build things for the web</h2>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Provident, illum. Minus dolorum ducimus vitae omnis quae aperiam,
                quaerat officiis soluta!
            </p>
            <div class="icon">
                <a href="#"><i class='bx bxl-telegram'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-spotify'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
            </div>
            <button>Get In Touch</button>
        </div>
        <div class="ghost">
            <img src="img/Header.png" alt="gambar" />
        </div>
    </div>
    <!-- Home End -->

    <!-- About Section  -->
    <section class="home sc-2" id="about">
        <div class="container">
            <div class="hero">
                <div class="about">
                    <div class="left">
                        <img src="img/body.png" alt="gambar" />
                    </div>
                    <div class="right">
                        <h1 class="text-#if293a">About Me</h1>
                        <h3>Good Man</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad
                            explicabo porro, corrupti et veniam quae repellat consequatur
                            voluptates aliquid ipsam sapiente voluptatibus officia
                            doloremque, sequi, hic quis nostrum ea? Molestiae!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Skills -->
    <section class="service" id="service">
        <h2>My Skills</h2>
        <h1>My Expertise</h1>
        <div class="skill-items">
            <div class="item">
                <div class="icon"><a href="#"><i class='bx bx-basketball'></i></a></div>
                <h3>active sports</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut ex mollitia sequi nobis obcaecati
                    vel?
                </p>
            </div>
            <div class="item">
                <div class="icon"><a href="#"><i class='bx bxs-joystick'></i></a></div>
                <h3>Play games</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                    atque nobis amet veritatis alias excepturi!
                </p>
            </div>
            <div class="item">
                <div class="icon"><a href="#"><i class='bx bx-code-alt'></i></a></div>
                <h3>Programmer</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae
                    saepe dicta nulla, cum aperiam ex.
                </p>
            </div>
            <div class="item">
                <div class="icon"><a href="#"><i class='bx bx-cool'></i></a></div>
                <h3>The Legends</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi
                    natus quo reiciendis accusamus porro! Architecto.
                </p>
            </div>
        </div>
    </section>
    <!-- Skills End -->

    <!-- Sosial Apps -->
    <section class="portfolio" id="portfolio">
        <div class="header">
            <div class="info">
                <h3>Social Apps</h3>
            </div>
            <button class="btn"><i data-feather="instagram"></i>Visit My Instagram</button>
        </div>
        <div class="portfo-items">
            <div class="item">
                <img src="img/iem.jpg" alt="#" />
                <div class="info">
                    <h4>Portfolio</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                        culpa?
                    </p>
                    <a href="https://www.instagram.com/ryaad8th/">Visit In Instagram</i></a>
                </div>
            </div>
            <div class="item">
                <img src="img/imgs.jpg" alt="#" />
                <div class="info">
                    <h4>Portfolio</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                        culpa?
                    </p>
                    <a href="https://web.telegram.org/a/" target="_blank">Visit In Telegram</i></a>
                </div>
            </div>
            <div class="item">
                <img src="img/sound.jpg" alt="#" />
                <div class="info">
                    <h4>Portfolio</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                        culpa?
                    </p>
                    <a href="https://www.instagram.com/ryaad8th/" target="_blank">Visit In Instagram</i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Sosial Apps End -->

    <!-- Contact start -->
    <section class="contact" id="contact">
        <h3>Contact Us</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, accusamus.</p>
        <form action="port.php" method="POST">
            <!-- <i><?= htmlspecialchars($login_message) ?></i> -->
            <div class="input-group">
                <label for="username">Nama</label>
                <input type="text" name="username" id="username" class="name" required>
            </div>
            <div class="input-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="alamat" required>
            </div>
            <div class="input-group">
                <label for="pesan">Pesan</label>
                <textarea name="pesan" id="pesan" class="pesan" required></textarea>
            </div>
            <button type="submit" class="btn" onclick="sendwhatsapp()">Send To WhatsApp</button>
        </form>
    </section>
    <!-- Contact End -->

    <!-- Feedback Start -->
    <footer>
        <div class="top">
            <div class="logo">
                <h1 href="">Myardl.</h1>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Expertise</a></li>
                <li><a href="#portfolio">Sosial Apps</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="sosial-link">
                <a href="#"><i class='bx bxl-telegram'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-spotify'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
            </div>
        </div>
        <hr>
        <p>Made with ❤️ DZURRIYYAT</p>
    </footer>
    <!-- Feedback End -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="port.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
feather.replace();
</script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script>
let lastScrollTop = 0;
let navbar = document.querySelector('.custom-navbar');
window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Scroll ke bawah, sembunyikan navbar
        navbar.style.top = "-100px";
    } else {
        // Scroll ke atas, tampilkan navbar
        navbar.style.top = "0";
    }

    lastScrollTop = scrollTop;
});
</script>
<script>
function sendwhatsapp() {
    var name = document.getElementById("username").value;
    var address = document.getElementById("alamat").value;
    var message = document.getElementById("pesan").value;

    var url = "https://wa.me/6281234433525?text=" +
        "Nama: " + encodeURIComponent(name) + "%0A" +
        "Alamat: " + encodeURIComponent(address) + "%0A" +
        "Pesan: " + encodeURIComponent(message);

    window.open(url, '_blank');
    return false; // agar form tidak benar-benar dikirim ke 'port.php'
}
</script>

</html>