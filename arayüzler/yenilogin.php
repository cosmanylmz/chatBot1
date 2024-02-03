<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Chat</title>
    <link rel="stylesheet" href="yenilogin.css">
</head>

<?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    // Veritabanında bu e-posta ve şifre ile eşleşen bir kullanıcı var mı kontrol et
    $sorgu = "SELECT * FROM kullanici_tablosu WHERE email = '$email' AND sifre = '$sifre'";
    $sonuc = $baglan->query($sorgu);

    if ($sonuc && $sonuc->num_rows > 0) {
        // Kullanıcı doğrulandıysa yönlendirme yap
        header("Location: index.php");
        exit();
    } else {
        // Kullanıcı doğrulanamadıysa
        echo '<script>alert("Invalid email or password.");</script>';
    }
}
?>




<body>
    <form id="chatForm" action="" onsubmit="return validateForm()" method="post">
        <h2>CHATBOT</h2>
        <input type="text" name="email" placeholder="E-mail" autocomplete="off">
        <input type="password" name="sifre" placeholder="Password" autocomplete="off">
        <input type="submit" name="login" value="Login">
        <input type="button" name="kayitol" value="Sign Up" onclick="window.location.href ='kayit.php';">
        <a href="yenisifre.php">Forgot password?</a>
    </form>

    <script>
       function validateForm() {
            var email = document.forms["chatForm"]["email"].value;
            var password = document.forms["chatForm"]["sifre"].value;

            if (email.trim() === "" || password.trim() === "") {
                alert("Please fill in all fields.");
               
            } 
            
        } 
    </script>
</body>
</html>







