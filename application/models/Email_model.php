<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : 12 July, 2021
*/

class Email_model extends CI_Model
{

    function user_password($receiver = "", $email_to = "", $password = "")
    {
        $email_sub = strtoupper(get_phrase("user_password"));
        $email_message = "Your current password is: $password. This is an auto generated password. You will be able to reset the password. We are highly request you to reset the password and make it your own.";
        return $this->send_mail_using_php_mailer($email_message, $email_sub, $email_to, $receiver);
    }



    public function send_mail_using_php_mailer($message = NULL, $subject = NULL, $to = NULL, $receiver = NULL)
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = get_smtp_settings('host');
        $mail->SMTPAuth   = true;
        $mail->Username   = get_smtp_settings('username');
        $mail->Password   = get_smtp_settings('password');
        $mail->SMTPSecure = get_smtp_settings('security');
        $mail->Port       = get_smtp_settings('port');

        $mail->setFrom(get_smtp_settings('username'), get_smtp_settings('from'));
        $mail->addReplyTo(get_settings('system_email'), get_settings('system_name'));

        // Add a recipient
        $mail->addAddress($to);

        // Email subject
        $mail->Subject = $subject;

        // Set email format to HTML
        $mail->isHTML(true);

        // Enabled debug
        $mail->SMTPDebug = false;
        $htmlContent = $this->load->view('email/template', array('message' => $message, 'receiver' => $receiver), TRUE);

        $mail->Body = $htmlContent;
        // Send email
        if (!$mail->send()) {
            // YOU CAN DEBUG HERE, WHETHER MAIL IS GOING OT NO. YOU CAN PRING THE "ErrorInfo" OF MAIL OBJECT
            return false;
        } else {
            // YOU CAN DEBUG HERE. WHETHER THE MAIL IS GOING OR NOT. YOU CAN ECHO HERE
            return true;
        }
    }
}
