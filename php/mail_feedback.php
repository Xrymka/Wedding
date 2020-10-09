<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// second form
if (isset($_POST['regrets'])) {
	$regrets = $_POST['regrets'];
}

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'website_kulinich@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '$dk820&123'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('website_kulinich@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('baranov_anton@inbox.ru');     // Кому будет уходить письмо 
$mail->addAddress('kulinich.ekaterina.andreevna@gmail.com');     // Кому будет уходить письмо 

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Комментарии и пожелания на свадьбу';
$mail->Body    = $regrets;
$mail->AltBody = '';

if($mail->send()) {
    echo "<center>Спасибо за отправку вашего сообщения!</center>";
}
else {
    echo "<center><b>Ошибка. Сообщение не отправлено!</b></center>";
}
?>