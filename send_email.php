<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Mohon isi form dengan benar.";
        exit;
    }

    $to = "mikhaelnovalino11@gmail.com";  
    $subject = "Pesan dari $name via Website Portofolio";
    $body = "Nama: $name\nEmail: $email\n\nPesan:\n$message";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan berhasil dikirim, terima kasih!";
    } else {
        echo "Maaf, terjadi kesalahan saat mengirim pesan.";
    }
} else {
    echo "Form tidak valid.";
}
?>
