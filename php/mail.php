<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// get and check data from form
// first form
if (isset($_POST['name']))
	$name = $_POST['name'];
if (isset($_POST['answer']))
	$answer = ($_POST['answer'] == 'yes') ? 'ПРИДЕТ!' : 'Не придет=( ';
if (isset($_POST['quest']))
	$quest = ($_POST['quest'] == '') ? 'Один' : $_POST['quest'];

if (isset($_POST['citySpb']))
	$city = ' Санкт-Петербург';
if (isset($_POST['cityPerm']))
	$city = $city . ' Пермь';

if (isset($_POST['wine']))
	$drink = ' Вино';
if (isset($_POST['champagne']))
	$drink = $drink . ' Шампанское';
if (isset($_POST['whiskey']))
	$drink = $drink . ' Виски';
if (isset($_POST['rum']))
	$drink = $drink . ' Ром';
if (isset($_POST['beer']))
	$drink = $drink . ' Пиво';
if (isset($_POST['noAlko']))
	$drink = $drink . ' Безалкогольные напитки';

if (isset($_POST['comment']))
	$comment = $_POST['comment'];

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

$mail->Subject = 'Ответ на приглашение на свадьбу';
$mail->Body    = '' .$name. ' заполнил заявку! И этот гость ' .$answer. '<br/> С кем придет? ' .$quest. '<br/> Будет в городе:' .$city. '<br/> Будет пить: ' .$drink. '<br/> Комментарий: ' .$comment;
$mail->AltBody = '';

if($mail->send()) {
    echo "<center>Спасибо за отправку вашего сообщения!</center>";
}
else {
    echo "<center><b>Ошибка. Сообщение не отправлено!</b></center>";
}
?>