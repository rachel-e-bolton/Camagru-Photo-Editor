<?php 


class Email
{
	public static function send_verification_email($name, $recipient, $link)
	{
		$sender = 'gwasserf@student.wethinkcode.co.za';

		$subject = "Camagru Verification";
		$message = file_get_contents(ROOT . "/Helpers/verify_email_template.html");
		$message = str_replace("[[LINK]]", $link, $message);
		$message = str_replace("[[NAME]]", $name, $message);

		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		$headers .= 'From:' . $sender . "\r\n";

		error_log("Email sent to : $recipient", 0);

		return mail($recipient, $subject, $message, $headers);
		//echo $message;
	}
}