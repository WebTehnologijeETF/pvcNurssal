<?php

require("sendgrid-php/sendgrid-php.php");
$eol = PHP_EOL;
$service_plan_id = "sendgrid_a4d39";
$account_info = json_decode(getenv($service_plan_id), true);
$sendgrid = new SendGrid("amrad", "1DvaTri!");
$email    = new SendGrid\Email();
$message = "Ime i prezime: ".$_POST['imeVrijednost']." " .$_POST['prezimeVrijednost'] . "\r\n"."Email: ".$_POST['mailVrijednost']."\r\n"."Grad: ".$_POST['gradVrijednost']." ".$_POST['postanskiVrijednost']."\r\n"."\r\n"."\r\n".$_POST['porukaVrijednost'];
$from = $_POST['mailVrijednost'];
$subject = 'Nurssal - Komentar';

$send_to = "adautbegov1@etf.unsa.ba";
$email->addTo($send_to)
    ->addCc("irfanpra@gmail.com")
    ->setFrom($from)
    ->setSubject($subject)
    ->setHtml($message);
try {
    $sendgrid->send($email);
    echo "<script>alert('Uspješno ste poslali mail!')</script>";
    echo file_get_contents("NurssalNaslovna.php");
} catch(\SendGrid\Exception $e) {
    echo $e->getCode();
    foreach($e->getErrors() as $er) {
        echo $er;
    }
}
?>
