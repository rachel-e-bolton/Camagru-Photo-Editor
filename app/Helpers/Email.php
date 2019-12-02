<?php 

class Email
{
	public static function send_verification_email($name, $recipient, $link)
	{
		$sender = ADMIN_EMAIL;

		$subject = "Camagru: Account Verification";
		$message = file_get_contents(EMAIL_TEMPLATES . "verify_account.html");
		$message = str_replace("[[LINK]]", $link, $message);
		$message = str_replace("[[NAME]]", $name, $message);

		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		$headers .= 'From:' . $sender . "\r\n";

		return mail($recipient, $subject, $message, $headers);
	}

	public static function send_password_reset($name, $recipient, $link)
	{
		$sender = ADMIN_EMAIL;

		$subject = "Camagru: Password Reset";
		$message = file_get_contents(EMAIL_TEMPLATES . "reset_password.html");
		$message = str_replace("[[LINK]]", $link, $message);
		$message = str_replace("[[NAME]]", $name, $message);

		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		$headers .= 'From:' . $sender . "\r\n";

		return mail($recipient, $subject, $message, $headers);
	}

	public static function send_comment_notify($posterName, $commenterName, $commentDate, $comment, $recipient)
	{
		$sender = ADMIN_EMAIL;

		$subject = "Camagru: Notification";
		$message = file_get_contents(EMAIL_TEMPLATES . "comment_notification.html");
		$message = str_replace("[[POSTER_NAME]]", $posterName, $message);
		$message = str_replace("[[COMMENTER_NAME]]", $commenterName, $message);
		$message = str_replace("[[COMMENT_DATE]]", $commentDate, $message);
		$message = str_replace("[[COMMENT]]", $comment, $message);
		
		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		$headers .= 'From:' . $sender . "\r\n";

		return mail($recipient, $subject, $message, $headers);
	}
}