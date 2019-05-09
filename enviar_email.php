<?php
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $comentario = $_POST["comentario"];
    define('GPWD', 'deco4405559');

    mail('ari.thomazini@gmail.com', $assunto, $comentario);

    define('GUSER', 'ari.thomazini@gmail.com');

    function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    	global $error;
    	$mail = new PHPMailer();
    	$mail->IsSMTP();		// Ativar SMTP
    	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    	$mail->SMTPAuth = true;		// Autenticação ativada
    	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
    	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
    	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
    	$mail->Username = GUSER;
    	$mail->Password = GPWD;
    	$mail->SetFrom($de, $de_nome);
    	$mail->Subject = $assunto;
    	$mail->Body = $corpo;
    	$mail->AddAddress($para);
    	if(!$mail->Send()) {
    		$error = 'Mail error: '.$mail->ErrorInfo;
    		return false;
    	} else {
    		$error = 'Mensagem enviada!';
    		return true;
    	}
    }

    smtpmailer('ari.thomazini@gmail.com', $email, 'Contato Via Site', $assunto, $comentario);
    if (!empty($error)) echo $error;
?>
