<?php namespace AppSpaceWeb\Newsletter\Helpers;

use AppSpaceWeb\Newsletter\Models\Email;
use AppSpaceWeb\Newsletter\Models\Newsletter;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception as phpmailerException;

class SendMail
{
    public static function send(){
        require './vendor/autoload.php';

        Newsletter::where('status', 'for_send')->each(function($newsletter) {
            try {
                //setuping host
                $mail = new PHPMailer(true);
                $mail->IsSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host       = env('MAIL_HOST');
                $mail->SMTPAuth   = true;

                $mail->SMTPSecure = 'tls';
                $mail->Port       = env('MAIL_PORT');

                dump(env('SES_KEY'));
                dump(env('SES_SECRET'));

                // setting up sender
                $mail->Username   = env('SES_KEY');
                $mail->Password   = env('SES_SECRET');
                $mail->setFrom('info@space-software.com', 'Space Software');

                // Specify the message recipients.
                Email::pluck('email')->each(function($email) use ($mail) {
                    $mail->addBCC($email);
                });


                // Specify the content of the message.
                $mail->isHTML(true);
                $mail->Subject = $newsletter->subject;
                $mail->msgHTML($newsletter->content);

                $mail->send();

                $newsletter->status = 'sent';
                $newsletter->save();
            } catch (phpmailerException $e){
                dd("zecmi1 An error occurred. {$e->errorMessage()}");
            } catch (\Exception $e) {
                dd("zecmi2 Email not sent. {$mail->ErrorInfo}");
            }
        });
    }
}
