<?php 
	
	function send_mail($to, $subject, $body){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587;                                    // TCP port to connect to
		
		$mail->Username = 'rodrigondec@gmail.com';                 // SMTP username
		$mail->Password = '3c1a0l1a0n6g0o';                        // SMTP password
		
		$mail->From = 'rodrigondec@gmail.com';
		$mail->FromName = 'Rodrigo Castro';
		$mail->addReplyTo('rodrigondec@gmail.com', 'Rodrigo Castro');

		$mail->addAddress($to);               // Name is optional

		$mail->Subject = $subject;
		$mail->Body = $body;

		if(!$mail->send()){
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	}
?>