<?php 
	
	function swal($title, $text, $type = '', $location = ''){
		echo "<button hidden id='clickButton' onClick='sa(\"".$title."\", \"".$text."\", \"".$type."\", \"".$location."\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
    			</script>";
	}

	function php_form($title, $text, $alterar = false){
		if($alterar){
			echo "<button hidden id='clickButton' onClick='js_form_alt(\"".$title."\", \"".$text."\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
    			</script>";
		}
		else{
			echo "<button hidden id='clickButton' onClick='js_form(\"".$title."\", \"".$text."\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
    			</script>";
		}
		
	}


	function send_mail($to, $subject, $body){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587;                                    // TCP port to connect to
		
		$mail->Username = 'organizationxesports@gmail.com';                 // SMTP username
		$mail->Password = 'oxente84';                        // SMTP password
		
		$mail->From = 'organizationxesports@gmail.com';
		$mail->FromName = 'Organization & Esports';
		$mail->addReplyTo('organizationxesports@gmail.com', 'Organization & Esports');

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