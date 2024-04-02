<?php

use PHPMailer\PHPMailer\{PHPMailer, Exception, SMTP};

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
class Mailer
{

    function enviarEmail($email, $asunto, $cuerpo)
    {
        require_once './config/config.php';
        require_once './phpmailer/src/PHPMailer.php';
        require_once './phpmailer/src/SMTP.php';
        require_once './phpmailer/src/Exception.php';
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
class Mailer
{
=======
class Mailer{
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f

    function enviarEmail($email, $asunto, $cuerpo)
    {
        require_once '../config/config.php';
<<<<<<< HEAD
        require_once '../phpmailer/src/PHPMailer.php';
        require_once '../phpmailer/src/SMTP.php';
        require_once '../phpmailer/src/Exception.php';
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

        $mail = new PHPMailer(true);

        try {
            //Server settings
<<<<<<< HEAD
            $mail->SMTPDebug = 0;                      //Enable verbose debug output  SMTP::DEBUG_OFF;
=======
<<<<<<< HEAD
            $mail->SMTPDebug = 0;                      //Enable verbose debug output  SMTP::DEBUG_OFF;
=======
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output  SMTP::DEBUG_OFF;
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'bryanmoranchandi@gmail.com';                     //SMTP username
            $mail->Password   = 'arpd bryy koyz oxro';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('bryanmoranchandi@gmail.com', 'WebTech Solutions');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;

            $mail->Body = utf8_decode($cuerpo);
            $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Error al enviar el correo electronico de la compra: {$mail->ErrorInfo}";
            //exit;
        }
    }
}
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
        require '../phpmailer/src/PHPMailer.php';
        require '../phpmailer/src/SMTP.php';
        require '../phpmailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {
    //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output  SMTP::DEBUG_OFF;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'bryanmoranchandi@gmail.com';                     //SMTP username
        $mail->Password   = 'arpd bryy koyz oxro';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('bryanmoranchandi@gmail.com', 'WebTech Solutions');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;

        $mail->Body= utf8_decode($cuerpo);
        $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

        if($mail->send()){
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo electronico de la compra: {$mail->ErrorInfo}";
        //exit;
    }
    }
}
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
