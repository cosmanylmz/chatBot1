
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="kayit.css">
</head>
<body>

  
<?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

  

    // Burda gpt'den yardım aldım. Select sorgusu ile email kontrolü yapıyoruz. (Email uniqe olduğu için)
    $query_check_email = "SELECT * FROM kullanici_tablosu WHERE email = '$email'";
    $result_check_email = mysqli_query($baglan, $query_check_email);

    if (!$result_check_email) {
        die("Error: " . mysqli_error($baglan));
    }

    if (mysqli_num_rows($result_check_email) > 0) {
        // Aynı e-posta adresi ile kayıt var, JavaScript ile alert gönderir. Javascript alerti php ile bu şekilde gönderilebiliyor.
        echo '<script>alert("This e-mail address is already in use. Please try again with another e-mail address.");</script>';
    } else {
        // kullanici_tablosuna kayıt için yaptığımız SQL SORGUSU:
        $ekle = "INSERT INTO kullanici_tablosu (ad, soyad, email, sifre) 
                 VALUES ('$ad', '$soyad', '$email', '$sifre')";

        if ($baglan->query($ekle) === TRUE) {
            // Başarılıysa Logine yönlendiriyoruz.
            header("Location: yenilogin.php");
            exit();
        } else {
            echo "Error: " . $ekle . "<br>" . $baglan->error;
        }
    }
}
?>



    <form id="signupForm" action="kayit.php" method="post" onsubmit="return validateForm()">
        <div id="cikis-container" onclick="goBack()">
            <div id="cikis">🠔</div>
        </div>
        <h2>Kayıt Ol</h2>
        <input type="text" name="ad" placeholder="Ad" autocomplete="off">
        <input type="text" name="soyad" placeholder="Soyad" autocomplete="off">
        <input type="text" name="email" placeholder="E-posta" autocomplete="off">
        <input type="text" name="sifre" placeholder="Şifre" autocomplete="off">
        <input type="submit" name="register" value="Onayla">
    </form>

    <script>
    function validateForm() {
        var ad = document.forms["signupForm"]["ad"].value;
        var soyad = document.forms["signupForm"]["soyad"].value;
        var email = document.forms["signupForm"]["email"].value;
        var sifre = document.forms["signupForm"]["sifre"].value;

        if (ad === '' || soyad === '' || email === '' || sifre === '') {
            alert("PLEASE FILL IN ALL FIELDS!");
            return false;
        }
    }

    function redirectToLoginPage() {
        window.location.href = "yenilogin.php";
    }

    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>








