<?php
	function sendmail_sunchis_com($mailTo,$bcTo,$subject,$body,$AddAttachment,$WebSMTP,$WebSMTPPort,$WebMailName,$WebMailWord,$WebMailAddress)
	{
		if(count($mailTo)==0){			
			return false;
		}
		
	    error_reporting(E_STRICT);	    
	    require_once('class.phpmailer.php');
	    require_once("class.smtp.php"); 
	    $mail             = new PHPMailer(); 		//new PHPMailer 
	  
	    $mail->CharSet 	  = "UTF-8";				//Setup the coding of mail ，default is ISO-8859-1
	    $mail->IsSMTP();	 						// to use SMTP
	    $mail->SMTPDebug  = 1;                     	// Start debug 
	                                           		// 1 = errors and messages
	                                           		// 2 = messages only
	    $mail->SMTPAuth   = true;                  	// Start check
	    //$mail->SMTPSecure = "ssl";                // seturity procepl 
	    $mail->Host       = $WebSMTP;		      	// SMTP server 

	    $mail->Port       = intval($WebSMTPPort);   // port of SMTP server
	    $mail->Username   = $WebMailName;  			// user'name of SMTP server
	    $mail->Password   = $WebMailWord;        // the pasword SMTP server
	    $mail->SetFrom($WebMailAddress, 'Group Flight');
	    $mail->AddReplyTo($WebMailAddress,"Group Flight"); 

	    $mail->MsgHTML($body);
		foreach($mailTo as $k => $v){
			$mail->AddAddress($mailTo[$k][0], $mailTo[$k][1]);
		}
		foreach($bcTo as $key => $v){
			$mail->AddCC($bcTo[$key][0], $bcTo[$key][1]);
		}


	    $mail->Subject    = $subject;
	    //$mail->AddEmbeddedImage($FilePath,'tuolajiimg',$FilePath);  

	    $mail->AltBody    = ""; // optional, comment out and test
	    $mail->Body = $body;	
		
		/*if(count($AddAttachment) > 0){
			foreach($AddAttachment as $k => $AttachmentAddress){
				$mail->AddAttachment($AttachmentAddress);
			}
		}*/
		
	    if(!$mail->Send()) {
	        //success
	        return false;
	    } 
		else {
	        //failer
	        return true;
	    }
}


?>
