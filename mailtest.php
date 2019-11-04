<?PHP
$sender = 'gwasserf@student.wethinkcode.co.za';
$recipient = 'glen@wasserfalls.co.za';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
?>