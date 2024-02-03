

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="yenisifre.css">
</head>
<body>

<?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($baglan, $_POST['email']);
    $new_password = mysqli_real_escape_string($baglan, $_POST['sifre']);

    $email_check_query = "SELECT * FROM kullanici_tablosu WHERE email = '$email'";
    $email_check_result = mysqli_query($baglan, $email_check_query);

    if (mysqli_num_rows($email_check_result) > 0) {
        $update_password_query = "UPDATE kullanici_tablosu SET sifre = '$new_password' WHERE email = '$email'";




        if (mysqli_query($baglan, $update_password_query)) {
            echo '<script>alert("Password updated successfully"); window.location.href = "yenilogin.php";</script>';
            exit();
        } 
        

        else 
        {
            echo "Hata: " . $update_password_query . "<br>" . mysqli_error($baglan);
        }
    } 
    
    else
     {
        echo '<script>alert("No account associated with this email address was found.");</script>';
    }
}

?>


    <form id="sifreYenilemeForm" action="" method="post">
        <div id="cikis-container" onclick="geridon()">
            <div id="cikis">🠔</div>
        </div>
        <h4>*Enter your registered e-mail address.*</h4>
        <input type="text" name="email" placeholder="E-mail" autocomplete="off">
        <input type="text" name="sifre" placeholder="New Password" autocomplete="off">
        <input type="submit" name="sifre_degistir" value="Confirm.">
    </form>


    
<?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($baglan, $_POST['email']);
    $new_password = mysqli_real_escape_string($baglan, $_POST['sifre']);

    $email_check_query = "SELECT * FROM kullanici_tablosu WHERE email = '$email'";
    $email_check_result = mysqli_query($baglan, $email_check_query);

    if (mysqli_num_rows($email_check_result) > 0) {
        $update_password_query = "UPDATE kullanici_tablosu SET sifre = '$new_password' WHERE email = '$email'";
        
        if (mysqli_query($baglan, $update_password_query)) {
            echo '<script>alert("Password updated successfully");</script>';
            header("Location: yenilogin.php");
            exit();
        } else {
            echo "Hata: " . $update_password_query . "<br>" . mysqli_error($baglan);
        }
    } else {
        echo '<script>alert("No account associated with this email address was found.");</script>';
    }
}
?>

<script>
        function geridon() {
            window.history.back();
        }

       /* function confirmSubmit(event) {
            event.preventDefault(); // Formun otomatik olarak submit olmasını engelle

            var email = document.getElementsByName('email')[0].value;
            var password = document.getElementsByName('sifre')[0].value;

            if (email.trim() === "") {
                alert("Please enter a valid email address.");
            } else if (password.trim() === "") {
                alert(" Please identify your new password!");
            } 
            
        }*/
    </script>

</body>
</html>
