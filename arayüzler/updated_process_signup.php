
<?php
session_start(); // Starting the session for CSRF protection
include('baglanti.php');

// Generating CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF token validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    }

    // Collecting and sanitizing form data
    $ad = htmlspecialchars($_POST['Ad']);
    $soyad = htmlspecialchars($_POST['Soyad']);
    $email = htmlspecialchars($_POST['E_mail']);
    $sifre = htmlspecialchars($_POST['Telefon']); // Assuming this is the password field

    // Hashing the password
    $hashed_sifre = password_hash($sifre, PASSWORD_DEFAULT);

    // SQL to insert new user
    $ekle = "INSERT INTO kullanici_tablosu (ad, soyad, email, sifre) 
    VALUES ('$ad', '$soyad', '$email', '$sifre')";


    // Preparing SQL statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        // Binding parameters
        $stmt->bind_param("ssss", $ad, $soyad, $email, $hashed_sifre);

        // Executing the statement
        if ($stmt->execute()) {
            echo "Kayıt oluşturuldu!";
        } else {
            echo "Hata: " . $stmt->error;
        }

        // Closing the statement
        $stmt->close();
    } else {
        echo "Hata: ";
    }

    // Closing the connection
    $conn->close();
}
?>
