<?php
session_start();
// session_unset();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kehadiran | Daftar murid</title>
    <link rel="stylesheet" href="public/style/login.css">
    <script src="public/js/signup.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="center">
        <div class="loginbox">
            <h1>Daftar</h1>
            <div id="teacher-form" class="hide">
                <h2>Nama Guru</h2>
                <input id="username" type="text" maxlength="15" placeholder="Enter username" required>
                <h2>Kata Laluan</h2>
                <input id="password" type="password" maxlength="20" placeholder="Enter password" required>
            </div>
            <div id="student-form">
                <h2>Nama Murid</h2>
                <input id="name" type="text" maxlength="15" placeholder="Enter your id" required>
                <h2>Kelas</h2>
                <div class="dropdown" id="class-dropdown">
                    <?php
                    include 'dbh.inc.php';
                    $query = "SELECT DISTINCT nama_kelas FROM kelas";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($result) {
                        echo "<div class='select'><span class='selected' name='class' id='class'></span><div class='caret'></div></div><ul class='menu'>";
                        foreach ($result as $classname) echo "<li>$classname</li>";
                        echo "</ul>";
                    } else {
                        echo "<div class='select'><span class='selected' name='class' id='class'>None</span><div class='caret'></div></div><ul class='menu'></ul>";
                    }

                    ?>
                </div>
            </div>
            <h2>Anda seorang</h2>
            <div class="dropdown">
                <div class="select">
                    <span class="selected" name="role" id="role">
                        Murid
                    </span>
                    <div class="caret"></div>
                </div>
                <ul class="short menu">
                    <li>Guru</li>
                    <li class="active">Murid</li>
                </ul>
            </div>
            <input type="submit" id="loginbtn" value="Submit">
        </div>
        <a href="index.php">Balik ke Laman utama</a>
    </div>
</body>

</html>