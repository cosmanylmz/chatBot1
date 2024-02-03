<script>
        function geridon() {
            window.history.back();
        }

        function confirmSubmit(event) {
            event.preventDefault(); // Formun otomatik olarak submit olmasını engelle

            var email = document.getElementsByName('email')[0].value;
            var password = document.getElementsByName('sifre')[0].value;

            if (email.trim() === "") {
                alert("Please enter a valid email address.");
            } else if (password.trim() === "") {
                alert(" Please identify your new password!");
            } 
            
        }
    </script>