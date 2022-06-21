<?php

namespace App\service;

use App\Helper\ConfigDatabase;
use PHPMailer\PHPMailer\PHPMailer;

class emailService
{
    public $email;
    public function __construct()
    {
        $config = new ConfigDatabase();
        $host = $config->getconf("email.smtp.Host");
        $SMTPAuth = $config->getconf("email.smtp.SMTPAuth");
        $Port = $config->getconf("email.smtp.Port");
        $Username = $config->getconf("email.smtp.Username");
        $Password = $config->getconf("email.smtp.Password");
        $setFrom = $config->getconf("email.smtp.setFrom");


        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = $host;
        $phpmailer->SMTPAuth = $SMTPAuth;
        $phpmailer->Port = $Port;
        $phpmailer->Username = $Username;
        $phpmailer->Password = $Password;
        $phpmailer->setFrom = $setFrom;
        return   $this->email=$phpmailer;

    }
    /**
     * @param $listemail
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function emailSending($listemail)
    {
        $this->email->addAddress($listemail->email);
        $this->email->isHTML(true);
        $this->email->Subject = $listemail->subject;
        $this->email->Body = $listemail->body;
        $this->email->send();
    }
}