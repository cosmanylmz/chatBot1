

<?php 

// Formdan veri gönderildi mi diye kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    // Gerekli güvenlik kontrolleri yapılabilir

    // Veritabanına ekleme işlemi
    $ekle = "INSERT INTO kullanici_tablosu (ad, soyad, email, sifre) 
             VALUES ('$ad', '$soyad', '$email', '$sifre')";


}
?>
